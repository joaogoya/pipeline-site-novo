     <div class="widget popular-feeds mb-40">
         <h5 class="widget-title">Posts recentes</h5>
         <div class="popular-feed-loop">

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

                     <div class="single-popular-feed">
                         <div class="feed-img">
                             <?php echo pipe_get_img(get_the_ID(), true, 'thumb', 'lg-total'); ?>
                         </div>
                         <div class="feed-desc">
                             <h6>
                                 <a href="<?php the_permalink(); ?>">
                                     <?php the_title(); ?>
                                 </a>
                             </h6>
                             <span class="time">
                                 <i class="far fa-calendar-alt"></i>
                                 <?php echo $dia; ?> de <?php echo $mes; ?> de <?php echo $ano; ?>
                             </span>
                         </div>
                     </div>

             <?php endwhile;
                    wp_reset_postdata();
                endif;
                ?>

         </div>
     </div>