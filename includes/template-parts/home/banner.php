

<?php
$banner_id = get_afc_by_page_slug('imagem_do_banner', 'home_config', 'Banner');
$imgurld = wp_get_attachment_image_url($banner_id, '');
?>
<section id="hero" class="banner-section banner-style-three banner-slider-two home-smooth"
    style="background-image: url(<?php echo $imgurld; ?>);">

    <div class="" id="">

        <div class="single-banner">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="banner-text">
                            <h1><?php echo get_afc_by_page_slug('titulo_do_banner', 'home_config', 'Banner'); ?></h1>
                            <div>
                                <b>
                                    <?php echo get_afc_by_page_slug('frase_do_banner', 'home_config', 'Banner'); ?>
                                </b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-shape-three">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
            <path d="M500,97C126.7,96.3,0.8,19.8,0,0v100l1000,0V1C1000,19.4,873.3,97.8,500,97z">
            </path>
        </svg>
    </div>

</section>