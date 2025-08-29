<!-- OFF CANVAS WRAP START -->
<div class="off-canvas-wrap">
    <div class="overly"></div>
    <div class="off-canvas-widget">
        <a href="#" class="off-canvas-close"><i class="fal fa-times"></i></a>
        <div class="widget recent-post">
            <h4 class="widget-title">Posts recentes</h4>
            <ul>
                <?php
                $next_args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 3,
                    'order' => 'DESC',
                    'orderby' => 'date',
                );

                $the_query = new WP_Query($next_args);

                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post();

                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

                        $dia = get_the_date('d');
                        $mes = get_the_date('F');
                        $ano = get_the_date('Y');
                ?>
                        <li>
                            <div class="post-img"
                                style="background-image: url( <?php echo $featured_img_url; ?> );">
                            </div>
                            <div class="post-content">
                                <h6>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h6>
                                <span class="time"><i class="far fa-clock"></i>
                                    <?php echo $dia; ?> de <?php echo $mes; ?> de <?php echo $ano; ?>
                                </span>
                            </div>
                        </li>
                <?php endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </ul>
        </div>
        <div class="widget contact-widget">
            <h4 class="widget-title">Fale conosco</h4>
            <ul>
                <li>
                    <i class="far fa-map-marker-alt"></i>
                    <?php echo get_afc_by_page_slug('cidade', 'home_config', 'informacoes-de-contato'); ?> /
                    <?php echo get_afc_by_page_slug('estado', 'home_config', 'informacoes-de-contato'); ?>
                </li>
                <li>
                    <i class="far fa-phone"></i>
                    <a title="Fale conos por whatsapp" href="https://wa.me/55<?php echo str_replace(' ', '', get_afc_by_page_slug('telefone', 'home_config', 'informacoes-de-contato')); ?>">
                        <?php echo get_afc_by_page_slug('telefone', 'home_config', 'informacoes-de-contato'); ?>
                    </a>
                </li>
                <li>
                    <i class="far fa-envelope-open"></i>
                    <a title="Fale conosco por e-mail." href="mailto:<?php echo get_afc_by_page_slug('e-mail', 'home_config', 'informacoes-de-contato'); ?>">
                        <?php echo get_afc_by_page_slug('e-mail', 'home_config', 'informacoes-de-contato'); ?>
                    </a>
                </li>
            </ul>
        </div>
        <div class="widget social-widget">
            <h4 class="widget-title">Acompanhe nas redes</h4>
            <ul>
                <li>
                    <a title="Visite nosso Facebook." href="<?php echo get_afc_by_page_slug('facebook', 'home_config', 'informacoes-de-contato'); ?>" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a title="Visite nosso Linkedin." href="<?php echo get_afc_by_page_slug('linkedin', 'home_config', 'informacoes-de-contato'); ?>" target="_blank">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a title="Visite nosso instagram." href="<?php echo get_afc_by_page_slug('instagram', 'home_config', 'informacoes-de-contato'); ?>" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- OFF CANVAS WRAP END -->