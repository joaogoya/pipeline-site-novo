<!-- modal -->
<div id="myModal" class="modal modal-img">

    <!-- close button -->
    <span class="close">&times;</span>

    <div id="img-wrap" class="modal-content">

        <?php        

        //seta tamanho do array para caption
        $total_images = count($images_ids);

        //percorre o array
        foreach ($images_ids as $key => $image_id) :

            //busca os attrs da img
            $img_atts = wp_get_attachment_image_src($image_id, 'full');

            //seta o src
            $img_src = $img_atts[0];

            //seta o data-index
            $data_index = $key + 1;

            // texto alternativo
            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);

            // Title
            $image_title = get_the_title($image_id);

            // Legenda
            $img_subtitle = wp_get_attachment_caption($image_id);
        ?>

            <!-- Images -->
            <div class="mySlides">

                <div class="numbertext"><?php echo $data_index; ?> / <?php echo $total_images; ?></div>

                <img title="<?php echo $image_title; ?>" alt="<?php echo $image_alt; ?>" data-index="<?php echo $data_index; ?>" class="slide lg-total" src="<?php echo $img_src; ?>" style="width:100%">


                <!-- <?php //echo pipe_get_img($image_id, false, 'large', 'slide lg-total', $data_index)?> -->

                <!-- caption -->
                <?php if ($img_subtitle) : ?>
                    <div class="caption-container">
                        <p>
                            <?php echo  $img_subtitle; ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>

        <?php endforeach; ?>

        <!-- btns -->
        <a class="prev change-slide">&#10094;</a>
        <a class="next change-slide">&#10095;</a>

    </div> <!-- modal-content -->
</div><!-- modal -->