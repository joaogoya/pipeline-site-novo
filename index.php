<?php get_header(); ?>

<section class="blog-section pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="blog-loop">

                    <?php
                    $next_args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'order' => 'DESC',
                        'orderby' => 'date',
                        'paged' => $paged,
                    );

                    $the_query = new WP_Query($next_args);

                    if ($the_query->have_posts()) :
                        while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            
                           <?php get_template_part('includes/template-parts/utilitarios-posts/loop-posts') ?>
                        
                    <?php endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>

                <div class="pagination-wrap">
                    <?php get_template_part('includes/template-parts/pagination') ?>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-8 col-sm-10">
                <div class="sidebar">
                   <?php get_template_part('includes/template-parts/sidebar/sidebar') ?>
                </div>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>