<?php

/*******************************************************/
/*********** POSTTYPE GALERIA DE IMAGENS ***************/
/*******************************************************/


add_action('init', 'post_type_pipeline_image_galery');

function post_type_pipeline_image_galery()
{

    $descritivos = array(
        'name' => 'Galria de imagens',
        'singular_name' => 'Galeria de Imagem',
        'add_new' => 'Adicionar Nova Galeria de Imagem',
        'add_new_item' => 'Adicionar Galeria de Imagem',
        'edit_item' => 'Editar Galeria de Imagem',
        'new_item' => 'Nova Galeria de Imagem',
        'view_item' => 'Ver Galeria de Imagem',
        'search_items' => 'Procurar Galeria de Imagem',
        'not_found' =>  'Nenhuma Galeria de Imagem encontrado',
        'not_found_in_trash' => 'Nenhuma Galeria de Imagem na Lixeira',
        'parent_item_colon' => '',
        'menu_name' => 'Galerias de Imagens'
    );

    $args = array(
        'labels' => $descritivos,
        'public' => true,
        'hierarchical' => false,
        'menu_icon' => 'dashicons-format-gallery',
        'menu_position' => 36,
        'supports' => array('title', 'editor', 'thumbnail', 'comments', 'excerpt', 'custom-fields', 'revisions', 'trackbacks')
    );

    register_post_type('pipe_image_galery', $args);
    flush_rewrite_rules();
}




