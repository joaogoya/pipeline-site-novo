<!-- modal -->
<div id="myModal" class="modal modal-img">

    <!-- close button -->
    <span class="close">&times;</span>

    <div id="img-wrap" class="modal-content">

        <?php

        //seta tamanho do array para caption
        $total_images = count($ids_imagens);

        //percorre o array
        foreach ($ids_imagens as $key => $image_id) :

            //seta o data-index
            $data_index = $key + 1;

            // Legenda
            $img_subtitle = wp_get_attachment_caption($image_id);
        ?>

            <!-- Images -->
            <div class="mySlides">

                <div class="numbertext"><?php echo $data_index; ?> / <?php echo $total_images; ?></div>

                <?php echo pipe_get_img_lightbox_reat($image_id, false, 'large', 'slide lg-total', $data_index) ?>

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