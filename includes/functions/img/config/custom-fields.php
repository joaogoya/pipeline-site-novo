<?php


/****************************************************************************
 * 
 *  SALVAR OS CAMPOS CUSTOMMIZADOS
 * 
 */
add_action('save_post', 'salvar_metas_pipeline_galery_shortcodeo');

function salvar_metas_pipeline_galery_shortcodeo()
{
    if (isset($_POST['title'])) {
        //se o campo estiver vazio, é o load da página

        global $post;
        //print_var($post);

        if (!$post->ID) { //se ainda nao tem id, é post novo
            //salvar post novo no banco e depois atualizar os meta dados

            //escreve post no banco
            $post_id = wp_insert_post($post);

            if (!is_wp_error($post_id)) { //se escreveu, pega o id e seta os post meta            

                //Salva shortcode
                $pipeline_shortcode = isset($_POST['pipeloine_show_sorrtcode']) ? $_POST['pipeloine_show_sorrtcode'] : '';
                update_post_meta($post_id, 'pipeloine_show_sorrtcode', sanitize_text_field($pipeline_shortcode));

                //Salva número de colunas
                $colunas_galeria = isset($_POST['pipeloine_colunas_galeria']) ? $_POST['pipeloine_colunas_galeria'] : '';
                update_post_meta($post_id, 'pipeloine_colunas_galeria', sanitize_text_field($colunas_galeria));
            } else {
                //se o insert_post deu erro, mostra o erro
                echo $post_id->get_error_message();
            };
        } else {  // o post ja existe no banco
            //entao é só pegar o id e atualizar os metadados

            //Salva shortcode
            $pipeline_shortcode = isset($_POST['pipeloine_show_sorrtcode']) ? $_POST['pipeloine_show_sorrtcode'] : '';
            update_post_meta($post->ID, 'pipeloine_show_sorrtcode', sanitize_text_field($pipeline_shortcode));

            //Salva número de colunas
            $colunas_galeria = isset($_POST['pipeloine_colunas_galeria']) ? $_POST['pipeloine_colunas_galeria'] : '';
            update_post_meta($post->ID, 'pipeloine_colunas_galeria', sanitize_text_field($colunas_galeria));
        }
    } else {
        //Salva shortcode
        $pipeline_shortcode = isset($_POST['pipeloine_show_sorrtcode']) ? $_POST['pipeloine_show_sorrtcode'] : '';
        update_post_meta($post->ID, 'pipeloine_show_sorrtcode', sanitize_text_field($pipeline_shortcode));

        //Salva número de colunas
        $colunas_galeria = isset($_POST['pipeloine_colunas_galeria']) ? $_POST['pipeloine_colunas_galeria'] : '';
        update_post_meta($post->ID, 'pipeloine_colunas_galeria', sanitize_text_field($colunas_galeria));
    }
}
