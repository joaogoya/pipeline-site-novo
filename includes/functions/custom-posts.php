<?php

/*******************************************************/
/**************** POSTTYPE PORTFOLIO *******************/
/*******************************************************/


add_action('init', 'type_portfolio');

function type_portfolio()
{

    $descritivos = array(
        'name' => 'Portfolio',
        'singular_name' => 'Portfolio',
        'add_new' => 'Adicionar Novo Portfolio',
        'add_new_item' => 'Adicionar Portfolio',
        'edit_item' => 'Editar Portfolio',
        'new_item' => 'Nova Portfolio',
        'view_item' => 'Ver Portfolio',
        'search_items' => 'Procurar Portfolio',
        'not_found' =>  'Nenhum Portfolio encontrado',
        'not_found_in_trash' => 'Nenhum Portfolio na Lixeira',
        'parent_item_colon' => '',
        'menu_name' => 'Portfolio'
    );

    $args = array(
        'labels' => $descritivos,
        'public' => true,
        'hierarchical' => true,
        'menu_icon' => 'dashicons-awards',
        //'show_in_rest' => true,
        'has_archive' => true,
        'menu_position' => 36,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'revisions', 'page-attributes', 'post-formats')
    );

    register_post_type('portfolio', $args);
    flush_rewrite_rules();
}



/*******************************************************/
/**************** POSTTYPE SERVIÇOS ********************/
/*******************************************************/


add_action('init', 'type_servicos');

function type_servicos()
{

    $descritivos = array(
        'name' => 'Serviços',
        'singular_name' => 'Serviço',
        'add_new' => 'Adicionar Novo Serviço',
        'add_new_item' => 'Adicionar serviço',
        'edit_item' => 'Editar serviço',
        'new_item' => 'Nova serviço',
        'view_item' => 'Ver serviço',
        'search_items' => 'Procurar serviço',
        'not_found' =>  'Nenhum serviço encontrado',
        'not_found_in_trash' => 'Nenhum serviço na Lixeira',
        'parent_item_colon' => '',
        'menu_name' => 'Serviços'
    );

    $args = array(
        'labels' => $descritivos,
        'public' => true,
        'hierarchical' => true,
        'menu_icon' => 'dashicons-store',
        'has_archive' => true,
        //'show_in_rest' => true,
        'menu_position' => 36,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'revisions', 'page-attributes', 'post-formats')
    );

    register_post_type('servicos', $args);
    flush_rewrite_rules();
}


/*******************************************************/
/******************** POSTTYPE HOME ********************/
/*******************************************************/


add_action('init', 'type_home_config');

function type_home_config()
{

    $descritivos = array(
        'name' => 'Home Config',
        'singular_name' => 'Configuração',
        'add_new' => 'Adicionar Nova configuração',
        'add_new_item' => 'Adicionar configuração',
        'edit_item' => 'Editar configuração',
        'new_item' => 'Nova configuração',
        'view_item' => 'Ver configurações',
        'search_items' => 'Procurar configuração',
        'not_found' =>  'Nenhuma configuração encontrada',
        'not_found_in_trash' => 'Nenhum configuração na Lixeira',
        'parent_item_colon' => '',
        'menu_name' => 'Home Config'
    );

    $args = array(
        'labels' => $descritivos,
        'public' => true,
        'hierarchical' => true,
        'menu_icon' => 'dashicons-admin-home',
        'menu_position' => 31,
        'supports' => array('title', 'custom-fields', 'revisions', 'page-attributes')
    );

    register_post_type('home_config', $args);
    flush_rewrite_rules();
}


/*******************************************************/
/******************* TAXONOMIA SERIE *******************/
/*******************************************************/

function criar_taxonomia_serie()
{
    $labels = array(
        'name'              => _x('Séries', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Série', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Buscar Séries', 'textdomain'),
        'all_items'         => __('Todas as Séries', 'textdomain'),
        'parent_item'       => __('Série Pai', 'textdomain'),
        'parent_item_colon' => __('Série Pai:', 'textdomain'),
        'edit_item'         => __('Editar Série', 'textdomain'),
        'update_item'       => __('Atualizar Série', 'textdomain'),
        'add_new_item'      => __('Adicionar Nova Série', 'textdomain'),
        'new_item_name'     => __('Nome da Nova Série', 'textdomain'),
        'menu_name'         => __('Séries', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'serie'),
    );

    register_taxonomy('serie', array('post'), $args);
}
add_action('init', 'criar_taxonomia_serie', 0);








// /*******************************************************/
// /*************** CUSTOM TAX permalinks *****************/
// /*******************************************************/

// function pipeline_series_permalink($permalink, $post, $leavename)
// {
//     if (strpos($permalink, '%serie%') !== false) {
//         $terms = get_the_terms($post->ID, 'serie');
//         if (! is_wp_error($terms) && ! empty($terms) && is_object($terms[0])) {
//             $taxonomy_slug = $terms[0]->slug;
//             $permalink = str_replace('%serie%', $taxonomy_slug, $permalink);
//         }
//     }
//     return $permalink;
// }
// add_filter('post_link', 'pipeline_series_permalink', 10, 3);



// /*******************************************************/
// /*************** CUSTOM TAX BREADCRUMBS ****************/
// /*******************************************************/


// function pipeline_custom_yoast_breadcrumb_links( $links ) {
//     global $post;

//     if ( is_singular( 'post' ) && has_term( '', 'serie', $post ) ) {
        
//         // Pega todos os termos da taxonomia 'serie' do post
//         $series_terms = get_the_terms( $post->ID, 'serie' );
        
//         if ( ! is_wp_error( $series_terms ) && ! empty( $series_terms ) ) {
//             $current_term = $series_terms[0];

//             // Verifica se o termo atual tem um pai (ou seja, se é uma sub-série)
//             if ( $current_term->parent != 0 ) {
//                 $parent_term_id = $current_term->parent;
//                 $parent_term = get_term( $parent_term_id, 'serie' );

//                 // Adiciona o link do termo pai (a série principal) na posição 2
//                 $parent_link = array(
//                     'url' => get_term_link( $parent_term, 'serie' ),
//                     'text' => $parent_term->name,
//                     'allow_html' => true
//                 );
//                 array_splice( $links, 2, 0, [$parent_link] );
//             }

//             // Pega o termo a ser exibido (o termo principal, se não houver sub-série, ou a sub-série)
//             $breadcrumb_term = ( $current_term->parent != 0 ) ? $current_term : $current_term;

//             // Adiciona o link do termo principal/sub-série na posição 2 ou 3
//             // A posição é 2 se não tiver pai, ou 3 se tiver um pai (sub-série)
//             $term_position = ( $current_term->parent != 0 ) ? 3 : 2;

//             $term_link = array(
//                 'url' => get_term_link( $breadcrumb_term, 'serie' ),
//                 'text' => $breadcrumb_term->name,
//                 'allow_html' => true
//             );
//             array_splice( $links, $term_position, 0, [$term_link] );
//         }
//     }

//     return $links;
// }
// add_filter( 'wpseo_breadcrumb_links', 'pipeline_custom_yoast_breadcrumb_links' );
