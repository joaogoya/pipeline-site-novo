<section id="<?php echo trata_id_smooth_fotos(); ?>" class="">
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <?php
                    $post_fotos = get_page_data_by_slug('fotos', 'page');
                    $titulo_fotos =$post_fotos->post->post_title;
                ?>
                <h2 class="before-line after-left">
                    <?php 
                        echo remove_sufixo($titulo_fotos);
                    ?>
                </h2>
                <br><br>
            </div>
        </div>
    </div>
    
    <div class="container ">
        <div class="row">
            <div class="col-12 ">
                <?php
                $id = get_post_id_by_slug('fotos', 'home_config');

                $args = array(
                    'p'         => $id,
                    'post_type' => 'home_config'
                );

                $fotos = new WP_Query($args);

                //print_var($fotos);

                if ($fotos->have_posts()) : while ($fotos->have_posts()) : $fotos->the_post();
                ?>
                        <?php pipe_grt_lightbox(); ?>

                <?php endwhile;
                endif;
                wp_reset_postdata(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <p>
                <?php echo trata_fotos_home()['frase']; ?>
                </p>
                <p>
                    <a href="<?php echo get_home_url(); ?>/<?php echo trata_fotos_home()['link_botao']; ?>/" class="btn btn-primary" title="Veja todas as fotos.">
                        <?php echo trata_fotos_home()['botao']; ?>
                    </a>
                </p>
            </div>
        </div>
    </div>

</section>