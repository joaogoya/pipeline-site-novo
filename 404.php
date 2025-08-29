<?php get_header(); ?>

<section id="pg-not-found" class="contact-section pt-120 pb-120">
    <div class="container">
        <div class="section-title both-border text-center pb-80">
            <span class="title-tag">Lamentamos</span>
            <h2>A página não pôde ser encontrada.</h2>
        </div>
        <div class="contact-form-wrapper">
            <div class="row">

                <div class="col-12">

                    <div class="contact-form">

                        <form action="<?php echo esc_url(home_url('/')); ?>" role="search">

                            <div class="row padding-custom">
                                <di class="col-12 text-center">
                                    <p class="pode-pesquisar">
                                        Mas você pode pesquisar pelo o que deseja.
                                    </p>
                                </di>
                                <div class="col-12 col-md-9">
                                    <div class="input-group mb-10">
                                        <input type="search" name="s" placeholder="Eu procuro por ..." id="search" value="<?php echo get_search_query(); ?>" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="input-group mb-10">
                                        <div class="container-submit">
                                            <p><input class="wpcf7-form-control wpcf7-submit has-spinner btn-enviar" type="submit" value="Pesquisar"><span class="wpcf7-spinner"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--====== LATEST POST START ======-->
<section class="latetest-post pb-90 pt-120 news-nao-enontrada">
    <div class="container">
        <!-- Section  Title -->
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-8 col-sm-7 col-6">
                <div class="section-title left-border">
                    <span class="title-tag">Ou</span>
                    <h2>Navegar no blog</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-4 col-sm-5 col-6">
                <div class="blog-btn text-right">
                    <a href="<?php echo get_site_url(); ?>/blog" class="main-btn btn-filled">Todos os posts</a>
                </div>
            </div>
        </div>
        <!-- post Loop -->
        <div class="post-loop mt-70">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">

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

                                $main_category = get_the_category()[0];
                                $category_link = get_category_link($main_category->term_id);
                        ?>

                                <div class="col-md-4">
                                    <div class="post-grid-box mb-30">
                                        <ul class="post-cat">
                                            <li>
                                                <a href="<?php echo $category_link; ?>">
                                                    <?php echo esc_html($main_category->name); ?>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="post-desc">
                                            <h4><a href="single-news.html"><?php the_title();     ?></a>

                                            </h4>
                                            <p><?php the_excerpt(); ?></p>
                                        </div>
                                        <ul class="post-meta">
                                            <li><a href="#"><i class="fal fa-calendar-alt"></i> <?php echo $dia; ?> de <?php echo $mes; ?> de <?php echo $ano; ?> </a></li>
                                            <li><a href="#"><i class="fal fa-comments"></i>10 Comments</a></li>
                                        </ul>
                                    </div>
                                </div>

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
<!--====== LATEST POST END ======-->



<?php get_footer(); ?>