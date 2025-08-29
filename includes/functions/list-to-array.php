<?php

/*
    Este arquivo tem 03 funções para
    pegar uma lista criada em um editor wysiwyg
    e colocar os dados em um array
    para melhor exibí-los no tema
*/

/**
 * Extrai o HTML completo de cada LI de primeiro nível de um conteúdo WYSIWYG.
 *
 * @param string $content_html O conteúdo HTML do campo WYSIWYG.
 * @return array Um array de strings, cada string contendo o HTML de um LI de primeiro nível.
 */
function pipeline_get_top_level_list_items_raw($content_html)
{
    $raw_items = array();

    if (empty($content_html)) {
        return $raw_items;
    }

    $dom = new DOMDocument();
    libxml_use_internal_errors(true);

    // --- CORREÇÃO AQUI: Adicionar a declaração XML com UTF-8 e flags ---
    // Envolve o conteúdo em uma div e adiciona a declaração XML para garantir UTF-8
    $dom->loadHTML('<?xml encoding="UTF-8"><div>' . $content_html . '</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    // --- FIM DA CORREÇÃO ---

    libxml_clear_errors();

    // Pega a div que envolve o conteúdo para começar a busca pelos nós filhos diretos (UL/OL)
    $wrapper_div = $dom->getElementsByTagName('div')->item(0);

    if ($wrapper_div) {
        foreach ($wrapper_div->childNodes as $node) {
            // Verifica se o nó é um elemento (UL ou OL) e é um filho direto da div wrapper
            if ($node->nodeType === XML_ELEMENT_NODE && in_array($node->nodeName, array('ul', 'ol'))) {
                // Percorre os LI's que são filhos diretos desta UL/OL de primeiro nível
                foreach ($node->childNodes as $li_node) {
                    if ($li_node->nodeType === XML_ELEMENT_NODE && $li_node->nodeName === 'li') {
                        // Salva o HTML interno do LI de primeiro nível
                        // Importante: saveHTML mantém a codificação do documento DOM
                        $raw_items[] = $dom->saveHTML($li_node);
                    }
                }
            }
        }
    }

    return $raw_items;
}


/**
 * Analisa o HTML de um item de lista (LI) para extrair o item principal e o subitem.
 *
 * @param string $li_html O HTML completo de um LI (vindo de pipeline_get_top_level_list_items_raw).
 * @return array Um array associativo com 'item' e 'subitem'.
 */
function pipeline_parse_list_item_html($li_html)
{
    $item_data = array(
        'item'      => '',
        'subitem'   => '',
    );

    if (empty($li_html)) {
        return $item_data;
    }

    $dom_li = new DOMDocument();
    libxml_use_internal_errors(true);

    // --- CORREÇÃO AQUI: Adicionar a declaração XML com UTF-8 e flags ---
    // Envolve o HTML do LI em uma div e adiciona a declaração XML para garantir UTF-8
    $dom_li->loadHTML('<?xml encoding="UTF-8"><div>' . $li_html . '</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    // --- FIM DA CORREÇÃO ---

    libxml_clear_errors();

    $wrapper_div = $dom_li->getElementsByTagName('div')->item(0);

    if ($wrapper_div && $wrapper_div->hasChildNodes()) {
        $first_li_element = null;
        // Encontrar o primeiro elemento <li> dentro da wrapper_div
        foreach ($wrapper_div->childNodes as $child) {
            if ($child->nodeType === XML_ELEMENT_NODE && $child->nodeName === 'li') {
                $first_li_element = $child;
                break;
            }
        }

        if ($first_li_element) {
            $item_principal_parts = array();
            $subitem_node = null;

            // Percorrer os filhos do LI para identificar o texto principal e a UL/OL aninhada
            foreach ($first_li_element->childNodes as $child_node) {
                if ($child_node->nodeType === XML_TEXT_NODE) {
                    $item_principal_parts[] = trim($child_node->nodeValue);
                } elseif ($child_node->nodeType === XML_ELEMENT_NODE && in_array($child_node->nodeName, array('ul', 'ol'))) {
                    // Encontrou a lista aninhada, guarda e para de pegar texto para o item principal
                    $subitem_node = $child_node;
                    break;
                }
                // Ignorar outros elementos HTML (como <span>, <strong>) para o item principal
            }

            $item_data['item'] = implode(' ', $item_principal_parts); // Concatena as partes do texto principal

            // Extrair o subitem da lista aninhada (se existir)
            if ($subitem_node) {
                $nested_lis = $subitem_node->getElementsByTagName('li');
                if ($nested_lis->length > 0) {
                    // Pega o texto do primeiro LI da sublista
                    $item_data['subitem'] = trim($nested_lis->item(0)->nodeValue);
                }
            }
        }
    }

    return $item_data;
}


/**
 * Extrai e formata itens de lista (item e subitem) de um conteúdo WYSIWYG
 * gerado com estrutura de lista aninhada (ul > li > ul > li).
 *
 * Esta função orquestra duas funções auxiliares:
 * - pipeline_get_top_level_list_items_raw() para extrair o HTML bruto dos LI de primeiro nível.
 * - pipeline_parse_list_item_html() para parsear cada LI bruto em item principal e subitem.
 *
 * @param string $wysiwyg_content O conteúdo HTML do campo WYSIWYG.
 * @return array Um array de arrays, onde cada sub-array contém 'item' (string) e 'subitem' (string).
 */
function pipeline_get_list_wysing($wysiwyg_content)
{
    $final_parsed_list = array();

    // Verifica se as funções auxiliares existem antes de usá-las
    if (! function_exists('pipeline_get_top_level_list_items_raw') || ! function_exists('pipeline_parse_list_item_html')) {
        error_log('Erro: Funções auxiliares de parsing de lista não encontradas. Verifique se pipeline_get_top_level_list_items_raw e pipeline_parse_list_item_html estão definidas.');
        return $final_parsed_list; // Retorna array vazio em caso de erro
    }

    // 1. Extrai o HTML completo de cada LI de primeiro nível
    $raw_list_items = pipeline_get_top_level_list_items_raw($wysiwyg_content);

    // 2. Percorre os LI's brutos e parseia cada um em item e subitem
    foreach ($raw_list_items as $li_html) {
        $final_parsed_list[] = pipeline_parse_list_item_html($li_html);
    }

    return $final_parsed_list;
}