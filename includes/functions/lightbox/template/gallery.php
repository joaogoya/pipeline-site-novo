<div class="row">
    <?php

    $colunas_galeria = get_field('numero_de_colunas');

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
    foreach ($ids_imagens as $key => $image_id) :

        //seta o data-indes
        $data_index = $key + 1;
    ?>

        <div class="col-sm-<?php echo $colunas; ?> my-auto">

            <?php echo pipe_get_img_lightbox_reat($image_id, false, 'medium', 'click-modal hover-shadow cursor lg-total', $data_index) ?>

        </div>

    <?php endforeach; ?>
</div>