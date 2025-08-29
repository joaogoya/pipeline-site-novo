<?php get_header(); ?>

<br><br><br><br><br><br>
<section id="interna-blog">

    <div class="container">
        <div class="row">
            
            <div class="col-12">

                <div class="text-gray">

                    <?php the_content(); ?>

                </div>
            </div>

        </div>

    </div>
</section>
<br><br><br><br><br><br>
<!-- posts relacionados --
<section class="section-bg bambu-pedras bottom-right">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <h2 class="t-left large">Posts relacionados</h2>

            </div>

        </div>

        <div id="cards" class="row">

            <?php
            $args = array(
                'post_type' => 'post',
                'orderby' => 'rand',
                'posts_per_page' => 3
            );
            $query_blog = new WP_Query($args);

            ?>

            <?php if ($query_blog->have_posts()) : while ($query_blog->have_posts()) : $query_blog->the_post(); ?>

                <?php get_template_part('includes/template-parts/internas/cards-blog'); ?>

            <?php endwhile;
            endif; ?>

        </div>

    </div>

</section -->

<?php get_footer(); ?>
