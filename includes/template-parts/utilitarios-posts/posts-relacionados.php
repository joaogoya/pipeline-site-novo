<?php

$tax_query_args = get_related_posts_query_args(get_the_ID());

$related_args =  array(
    'post_type'      => 'post',
    'post__not_in'   => array(get_the_ID()),
    'posts_per_page' => 3,
    'orderby'        => 'rand',
    'tax_query'      => $tax_query_args, // Agora, passa o array corretamente
);

$related_query = new WP_Query($related_args);

//print_var($related_query);

if ($related_query->have_posts()) :
    while ($related_query->have_posts()) : $related_query->the_post();

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
                    <h4><a href="single-news.html"><?php the_title(); ?></a>

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