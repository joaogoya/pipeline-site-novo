<?php

function pipe_grt_lightbox()
{

    if (get_field('slug_da_galeria')) {

        $slug_galeria = get_field('slug_da_galeria');
        $id_galeria = get_post_id_by_slug($slug_galeria, 'pipe_image_galery');

        $imagens_da_galeria = get_post_gallery($id_galeria, false);
        $ids_imagens_str = $imagens_da_galeria['ids'];

        $ids_imagens_array = explode (",", $ids_imagens_str); 
        $ids_imagens = array_reverse($ids_imagens_array);
        
        require('gallery.php');

        require('modal.php');
    }
}


function get_gakeria_by_id($id_galeria){

    if (get_field('slug_da_galeria')) {

    $imagens_da_galeria = get_post_gallery($id_galeria, false);
        $ids_imagens_str = $imagens_da_galeria['ids'];

        $ids_imagens_array = explode (",", $ids_imagens_str); 
        $ids_imagens = array_reverse($ids_imagens_array);
        
        require('gallery.php');

        require('modal.php');

    }
        
}
