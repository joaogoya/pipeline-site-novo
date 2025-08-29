<section id="servicos" class="services-secton featured-service mt-negative">
    <div class="container">
        <div class="services-loop">
            <div class="row justify-content-center">

                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="single-service text-center white-bg mb-60">
                        <div class="icon">
                            <?php
                            $ig_gmn = get_afc_by_page_slug('icone_gmn', 'home_config', 'sercicos');
                            echo pipe_get_img($ig_gmn, false, 'thumb', '');
                            ?>
                        </div>
                        <h4>
                            <?php echo get_afc_by_page_slug('titulo_gmn', 'home_config', 'sercicos'); ?>
                        </h4>
                        <p>
                            <?php echo get_afc_by_page_slug('texto_gmn', 'home_config', 'sercicos'); ?>
                        </p>
                        <a href="<?php echo get_home_url(); ?>/servicos/google-meu-negocio" class="service-link">Saiba mais</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="single-service text-center secondary-bg doted mb-60">
                        <div class="icon">
                            <?php
                            $ig_sites = get_afc_by_page_slug('icone_sites', 'home_config', 'sercicos');
                            echo pipe_get_img($ig_sites, false, 'thumb', '');
                            ?>
                        </div>
                        <h4>
                            <?php echo get_afc_by_page_slug('titulo_sites', 'home_config', 'sercicos'); ?>
                        </h4>
                        <p>
                            <?php echo get_afc_by_page_slug('texto_sites', 'home_config', 'sercicos'); ?>
                        </p>
                        <a href="<?php echo get_home_url(); ?>/servicos/sites" class="service-link">Saiba mais</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="single-service text-center primary-bg mb-60">
                        <div class="icon">
                            <?php
                            $ig_sads = get_afc_by_page_slug('icone_ads', 'home_config', 'sercicos');
                            echo pipe_get_img($ig_sads, false, 'thumb', '');
                            ?>
                        </div>
                        <h4>
                            <?php echo get_afc_by_page_slug('titulo_ads', 'home_config', 'sercicos'); ?>
                        </h4>
                        <p>
                            <?php echo get_afc_by_page_slug('texto_ads', 'home_config', 'sercicos'); ?>
                        </p>
                        <a href="<?php echo get_home_url(); ?>/servicos/anuncios-no-google" class="service-link">Saiba mais</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>