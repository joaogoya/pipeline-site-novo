<section class="latetest-post pb-90 pt-120 news-nao-enontrada">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-8 col-sm-7 col-6">
                <div class="section-title left-border">
                    <span class="title-tag">Acompanhe o</span>
                    <h2>Blog do prjeto</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-4 col-sm-5 col-6">

                <!-- 
                    bt ver todos os posts
                    presets p montar o link com parametro
                -->
                <div class="blog-btn text-right">
                    <?php
                    $cliente_id = get_the_ID();
                    $url_pagina_blog = home_url('/categorias/sucesso-dos-clientes/');
                    $link_todos_posts = add_query_arg('cliente_id', $cliente_id, $url_pagina_blog);
                    ?>
                    <a title="Veja todos os posts deste cliente no nosso blog" href="<?php echo esc_url($link_todos_posts); ?>" class="main-btn btn-filled">
                        Todos os posts
                    </a>
                </div>
            </div>
        </div>

        <!-- post Loop -->
        <div class="post-loop mt-70 blog-portifa">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">

                        <?php

                        //seta categoria p filtrar
                        $portfolio_id = get_the_ID();
                        $categoria = get_term_by('slug', 'sucesso-dos-clientes', 'category');

                        //args da query
                        $next_args = array(
                            'post_type'      => 'post',
                            'post_status'    => 'publish',
                            'posts_per_page' => 5,
                            'orderby'        => 'rand',

                            //filtro cat - sucesso dos clientes    
                            'tax_query'      => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field'    => 'term_id',
                                    'terms'    => $categoria->term_id,
                                ),
                            ),

                            // filtro pos scf - relationship - cliente
                            'meta_query'     => array(
                                array(
                                    'key'     => 'cliente',
                                    'value'   => '"' . $portfolio_id . '"',
                                    'compare' => 'LIKE',
                                ),
                            ),
                        );
                        $the_query = new WP_Query($next_args);

                        //loop
                        if ($the_query->have_posts()) :
                            while ($the_query->have_posts()) : $the_query->the_post();

                                // presets uteis
                                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

                                $dia = get_the_date('d');
                                $mes = get_the_date('F');
                                $ano = get_the_date('Y');

                                $main_category = get_the_category()[0];
                                $category_link = get_category_link($main_category->term_id);


                                //se é o primeiro, trata como destaque
                                if ($the_query->current_post == 0) { ?>

                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <b>
                                                        Post em destaque
                                                    </b>
                                                </h4><br>
                                            </div>

                                            <div class="col-12">                        
                                                <?php 
                                                    //se tem banner cadastrado, pega o banner
                                                    if (get_field('banner_do_post')) {
                                                        echo pipe_get_img(get_field('banner_do_post'), false, 'medium', 'lg-total'); 
                                                    //se nao tem, pega a thumb
                                                    } else {
                                                        echo pipe_get_img($post->ID, true, 'medium', 'lg-total'); 
                                                    }
                                                ?>
                                                <br><br>
                                            </div>
                                            <div class="col-12">
                                                <h3>
                                                    <?php the_title(); ?>
                                                </h3>
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <p class="content-lista">
                                                    <?php echo wp_trim_words(get_the_content(), 30, '...'); ?>
                                                </p>
                                            </div>
                                            <div class="col-12">
                                                <a class="button-more" title="Leia o post: <?php the_title() ?>" href="<?php the_permalink(); ?>" aria-label="Leia o post::  <?php the_title() ?>">
                                                    LEIA MAIS
                                                </a>
                                            </div> <br><br><br>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <b>
                                                        Mais posts
                                                    </b>
                                                </h4><br>
                                            </div>
                                        <?php

                                        // se não é o primeiro, poe na lista 
                                    } else { ?>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-5 col-md-3">
                                                        <?php 
                                                    //se tem banner cadastrado, pega o banner
                                                    if (get_field('banner_do_post')) {
                                                        echo pipe_get_img(get_field('banner_do_post'), false, 'medium', 'lg-total'); 
                                                    //se nao tem, pega a thumb
                                                    } else {
                                                        echo pipe_get_img($post->ID, true, 'medium', 'lg-total'); 
                                                    }
                                                ?>
                                                    </div>

                                                    <div class="col-7 col-md-9">
                                                        <div class="col-12">
                                                            <h4>
                                                                <?php the_title(); ?>
                                                            </h4>
                                                        </div>
                                                        <div class="col-12">
                                                            
                                                            <p class="content-lista">
                                                                <?php echo wp_trim_words(get_the_content(), 15, '...'); ?>
                                                            </p>
                                                        </div>
                                                        <div class="col-12">
                                                            <a class="button-more" title="Leia o post: <?php the_title() ?>" href="<?php the_permalink(); ?>" aria-label="Leia o post::  <?php the_title() ?>">
                                                                LEIA MAIS
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        <?php
                                    }

                                        ?>

                                <?php endwhile;
                            wp_reset_postdata();
                        endif;
                                ?>
                                        </div>
                                    </div>
                    </div>
                </div>
            </div>
</section>