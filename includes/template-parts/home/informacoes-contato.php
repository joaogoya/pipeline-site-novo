<?php
$contatos = get_page_data_by_slug('informacoes-de-contato', 'home_config');
if ($contatos->have_posts()) : while ($contatos->have_posts()) : $contatos->the_post();
?>

        <!-- TopBar cinza -->
        <section id="barra-cinza-header" class="bg-extraLightGray text-extraDarkGray">
            <div class="container">
                <div class="row">

                    <div class="col-6 desk">
                        <p class="text-v-center">
                            <i class="fa-solid fa-phone-volume text-primary"></i>
                            <span class="desk">
                                <?php echo get_cta_label(); ?>
                            </span>
                            <?php

                            ?> (51)
                            <a href="tel:+55051<?php echo str_replace(' ', '', get_field('telefone')); ?>" title="Clique para telefonar">
                                <?php the_field('telefone'); ?>
                            </a>
                        </p>
                    </div>

                    <div class="col-6 mobile">
                        <h1 title="Seja Bemvindo ao site da Reat Evaporadores">
                            <a href="<?php bloginfo('url') ?>" title="Clique para ir para homepage">
                                <?php
                                $logo_id = get_afc_by_page_slug('logo_empresa', 'home_config', 'logo');
                                echo pipe_get_img($logo_id, false, 'medium', '');
                                ?>
                            </a>
                        </h1>
                    </div>
                    
                    <div class="col-6">
                        <ul class="nav social-gray">
                            <li class="nav-item">
                                <a class="nav-link" title="Fala conosco pelo WhatsApp" rel="noreferrer" target="_blank" href="https://wa.me/5551<?php echo str_replace(' ', '', get_field('telefone')); ?>">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" title="Clique para enviar um e-mail" href="mailto:<?php the_field('e-mail'); ?>">
                                    <i class="fa-regular fa-envelope"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" title="Visite nosso Youtube" rel="noreferrer" target="_blank" href="<?php the_field('youtube'); ?>">
                                    <i class="fa-brands fa-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section id="barra-branca" class="desk">
            <div class="container">
                <div class="row">

                    <div class="col-sm-3">
                        <h1 title="Seja Bemvindo ao site da Reat Evaporadores">
                            <a href="<?php bloginfo('url') ?>" title="Clique para ir para homepage">
                                <?php
                                $logo_id = get_afc_by_page_slug('logo_empresa', 'home_config', 'logo');
                                echo pipe_get_img($logo_id, false, 'medium', '');
                                ?>
                            </a>
                        </h1>
                    </div>

                    <div class="col-sm-3">
                        <div class="card card-horizontal-01">
                            <div class="row no-gutters">
                                <div class="col-md-3 card-header">
                                    <i class="fa-solid fa-phone-flip"></i>
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <span>(51) <?php the_field('telefone'); ?></span> <br>
                                            <small class="text-muted">
                                                <?php the_field('e-mail'); ?>
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card card-horizontal-01">
                            <div class="row no-gutters">
                                <div class="col-md-3 card-header">
                                    <i class="fa-solid fa-house-chimney"></i>
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <span>Porto Alegre</span> <br>
                                            <small class="text-muted">
                                                Rio Grande do Sul
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card card-horizontal-01">
                            <div class="row no-gutters">
                                <div class="col-md-3 card-header">
                                    <i class="fa-regular fa-clock"></i>
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <span><?php the_field('horario_de_funcionamento'); ?></span> <br>
                                            <small class="text-muted">
                                                <?php the_field('dias_da_semana'); ?>
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

<?php endwhile;
endif;
wp_reset_postdata();
?>