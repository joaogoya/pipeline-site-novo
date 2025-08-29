<div class="row">
    <?php

    $colunas_galeria = get_post_meta($post_id, 'pipeloine_colunas_galeria', true);

    $colunas = '';
    switch ($colunas_galeria) {
        case '1':
            $colunas = '12';
        break;

        case '2':
            $colunas = '6';
        break;

        case '3':
            $colunas = '4';
        break;

        case '4':
            $colunas = '3';
        break;

        case '6':
            $colunas = '2';
        break;

        case '12':
            $colunas = '1';
        break;

        default:
            $colunas = '12';
        break;
    }

    //percorre o array
    foreach ($images_ids as $key => $image_id) :

        //busca os attrs da img
        $img_atts = wp_get_attachment_image_src($image_id, 'full');

        //seta o src
        $img_src = $img_atts[0];

        //seta o data-indes
        $data_index = $key + 1;
      
        // textto alternativo      
        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);

        // Title
        $image_title = get_the_title($image_id);
           
    ?>

        <div class="col-sm-<?php echo $colunas; ?> my-auto">
            <img alt="<?php echo $image_alt; ?>" title="<?php echo $image_title; ?>" src="<?php echo $img_src; ?>"class="click-modal lg-total hover-shadow cursor " data-index="<?php echo $data_index; ?>">

            <!-- <?php //echo pipe_get_img($image_id, false, 'medium', 'click-modal hover-shadow cursor lg-total', $data_index)?> -->

        </div>

    <?php  endforeach; ?>
</div>

