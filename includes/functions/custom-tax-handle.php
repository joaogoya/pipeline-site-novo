<?php

/**
 * Pega todos os posts de uma série (custom taxonomy) e retorna um array com dados.
 *
 * @param string $series_slug O slug da taxonomia 'serie'.
 * @return array Um array de objetos com dados dos posts, ou um array vazio se nada for encontrado.
 */
function get_posts_by_series_slug($series_slug)
{
    // 1. Defina os argumentos para a WP_Query
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => -1,

        'tax_query'      => array(
            array(
                'taxonomy' => 'serie', // Nome da sua custom taxonomy
                'field'    => 'slug',
                'terms'    => $series_slug,
                'include_children' => false,
            ),
        ),
        'orderby'        => 'date',
        'order'          => 'ASC', // Do mais antigo para o mais recente
    );

    // 2. Execute a query
    $series_posts = new WP_Query($args);

    $posts_data = array();

    if ($series_posts->have_posts()) {
        $post_count = $series_posts->post_count; // Pega o número total de posts
        $counter    = 0;

        // 3. Itere sobre os posts
        while ($series_posts->have_posts()) {
            $series_posts->the_post();
            $counter++; // Incrementa o contador em cada iteração

            // Inicia o array para o post atual
            $post_item = array(
                'title'       => get_the_title(),
                'content'        => get_the_content(),
                'permalink'   => get_permalink(),
                'slug'      => get_post_field('post_name', get_the_ID()), // Adicionado aqui!
                'is_index'    => false,  // Nova flag para identificar o índice
                'is_last'     => ($counter === $post_count), // 'true' apenas no último post
                'position'     => 0,
                'thumb'       => get_the_post_thumbnail_url(get_the_ID(), 'full'),
            );

            // Adicione os dados do post ao array principal
            $posts_data[] = (object) $post_item;
        }

        // Restaura os dados globais do post
        wp_reset_postdata();
    }

    return $posts_data;
}



/**
 * Pega os dados de uma taxonomia 'serie' pelo slug.
 *
 * @param string $series_slug O slug da taxonomia 'serie'.
 * @return object|null Um objeto com os dados da taxonomia ou null se não for encontrada.
 */
function get_series_data_by_slug($series_slug)
{
    // Tenta pegar o objeto da taxonomia
    $term = get_term_by('slug', $series_slug, 'serie');

    if ($term && !is_wp_error($term)) {

        // Pega o ID da imagem do campo ACF na taxonomia
        $acf_image_id = get_field('thumbnail_da_taxnomia', $term);
        //print_var($acf_image_id);

        // Monta o objeto de dados com a estrutura padronizada
        $series_data = (object) array(
            'title'       => $term->name,
            'content'     => $term->description,
            'permalink'   => get_term_link($term),
            'slug'        => $series_slug,
            'is_index'    => true,  // Nova flag para identificar o índice
            'is_last'     => false, // 'true' apenas no último post
            'position'     => 0,
            'thumb'       => wp_get_attachment_image_url($acf_image_id, 'large'),
        );

        return $series_data;
    }

    return null;
}



/**
 * Pega os dados das sub-séries de uma taxonomia 'serie' pai.
 *
 * @param string $parent_slug O slug da taxonomia 'serie' pai.
 * @return array Um array de objetos com dados das sub-séries, ou um array vazio se não houver.
 */
function get_subseries_by_parent_slug($parent_slug)
{
    // Pega o objeto do termo pai
    $parent_term = get_term_by('slug', $parent_slug, 'serie');
    if (!$parent_term || is_wp_error($parent_term)) {
        return array();
    }

    // Pega todos os termos filhos (sub-séries)
    $child_terms = get_terms(array(
        'taxonomy'   => 'serie',
        'parent'     => $parent_term->term_id,
        'hide_empty' => true,
        'orderby'    => 'count', // Ou 'name', se preferir
        'order'      => 'DESC', // Se for por contagem de posts, do maior para o menor
    ));

    $subseries_data = array();

    if (!empty($child_terms)) {
        foreach ($child_terms as $child_term) {
            // Pega o ID da imagem do campo ACF na sub-série
            $acf_image_id = get_field('thumbnail_da_taxnomia', $child_term);

            // Cria um objeto padronizado para a sub-série
            $subseries_data[] = (object) array(
                'title'      => $child_term->name,
                'content'    => $child_term->description,
                'permalink'  => get_term_link($child_term),
                'slug'       => $child_term->slug,
                'is_last'    => false,
                'is_index'   => false,
                'is_subseries' => true, // Nova flag para identificar a sub-série
                'position'     => 0,
                'thumb'       => wp_get_attachment_image_url($acf_image_id, 'large'),
            );
        }
    }

    return $subseries_data;
}


/**
 * Pega todos os dados de uma série (posts e sub-séries),
 * com os dados da taxonomia no início da lista.
 *
 * @param string $series_slug O slug da taxonomia 'serie'.
 * @return array|null Um array completo com os dados da taxonomia e os posts, ou null.
 */
function get_full_series_data($series_slug)
{
    // 1. Pega os posts da série principal
    $posts_data = get_posts_by_series_slug($series_slug);

    if (empty($posts_data)) {
        return null;
    }

    // 2. Pega os dados das sub-séries
    $subseries_data = get_subseries_by_parent_slug($series_slug);

    // 3. Junta os posts e as sub-séries em um único array
    $full_list_data = array_merge($posts_data, $subseries_data);

    // 4. Pega os dados da taxonomia (o índice)
    $series_data = get_series_data_by_slug($series_slug);

    // 5. Se o índice existir, adicione-o ao início da lista completa
    if ($series_data) {
        array_unshift($full_list_data, $series_data);
    }

    foreach ($full_list_data as $key => $item) {
        $item->position = $key;
    }

    // Retorne a lista completa de posts, sub-séries e o índice
    return $full_list_data;
}


/**
 * Pega os posts anterior e seguinte de um array de navegação.
 *
 * @param int   $post_id         O ID do post atual.
 * @param array $array_to_filter O array completo da série (índice, posts e sub-séries).
 * @return array Um array contendo os objetos dos posts 'prev' e 'next', ou null se não existirem.
 */
function get_next_and_prev_posts($post_id, $array_to_filter)
{
    $current_post_slug = get_post_field('post_name', $post_id);
    $current_position = -1;

    // Se o array de navegação estiver vazio, não há o que fazer
    if (empty($array_to_filter)) {
        return ['item_prev' => null, 'item_next' => null];
    }

    // Encontra a posição do post atual no array
    foreach ($array_to_filter as $key => $item) {
        // A checagem de segurança é fundamental para evitar erros.
        // E compara o slug do item com o slug do post atual.
        if (isset($item->slug) && $current_post_slug === $item->slug) {
            $current_position = $key;
            break;
        }
    }

    // Se o post atual não for encontrado, retorne nulo
    if ($current_position === -1) {
        return ['item_prev' => null, 'item_next' => null];
    }

    // Usa o operador de coalescência nula (??) para retornar o item anterior
    // se ele existir, ou null caso contrário.
    $item_prev = $array_to_filter[$current_position - 1] ?? null;

    // A mesma lógica para o item seguinte.
    // O count() retorna o tamanho total, a última posição é o tamanho - 1.
    $item_next = $array_to_filter[$current_position + 1] ?? null;

    return [
        "item_prev" => $item_prev,
        "item_next" => $item_next,
    ];
}


function get_custom_tax_slug($post_id, $custom_tax_type)
{
    $series_terms = get_the_terms($post_id, $custom_tax_type);

    $series_slug = null;

    // Verifica se a função retornou algum termo e se não houve erro
    if ($series_terms && !is_wp_error($series_terms)) {
        // Pega o objeto do primeiro termo encontrado e obtém o slug dele
        $first_series_term = reset($series_terms); // reset() pega o primeiro item do array
        return $first_series_term->slug;
    }
}
