<?php

$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

$dia = get_the_date('d');
$mes = get_the_date('F');
$ano = get_the_date('Y');

$main_category = get_the_category()[0];
$category_link = get_category_link($main_category->term_id);
?>
<div class="post-standard-box mb-40">
    <div class="post-media">
        <?php
        if (has_post_thumbnail()) {
            echo pipe_get_img(get_the_ID(), true, 'large', 'lg-total');
        } else {
            echo 'ddd';
        }
        ?>
    </div>
    <div class="post-desc">
        <!-- <a href="<?php echo $category_link; ?>" class="cat">
                                        <?php echo esc_html($main_category->name); ?>
                                    </a> -->
        <h2>
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
        <ul class="post-meta">
            <li><i class="far fa-calendar-alt"></i><?php echo $dia; ?> de <?php echo $mes; ?> </li>
        </ul>
        <p>
            <?php the_excerpt(); ?>
        </p>

        <div class="post-footer">
            <div class="author">
            </div>
            <div class="read-more">
                <a href="<?php the_permalink(); ?>"><i class="fa-solid fa-arrow-right-long"></i></i>Leia Mais</a>
            </div>
        </div>
    </div>
</div>