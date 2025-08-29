<?php add_shortcode('pipeline_lightbox', 'pipeline_do_lightbox'); ?>

<?php function pipeline_do_lightbox($attr, $content = null)
{ 
    $attr = shortcode_atts([
        'id' => false, 
    ], $attr);

    ob_start();


    $post_id = $attr['id'];

    $galeria = get_post_gallery($post_id, false);

    $images_ids = explode(',' , $galeria['ids']);
    
    ?>

    <div id="pageone" class="container">

        <?php require('gallery.php'); ?>

        <?php require_once('modal.php'); ?>

    </div>

  
    
<?php
  //ob_get_clean();
    wp_reset_postdata();
  
}

