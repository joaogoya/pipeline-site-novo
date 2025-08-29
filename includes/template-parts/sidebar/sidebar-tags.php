<?php
$todas_tags  = get_terms(array(
   'taxonomy'   => 'post_tag',
    'hide_empty' => true,
     'number'     => 6,  
    'orderby'    => 'rand', 
));

if (!empty($todas_tags ) && !is_wp_error($todas_tags )) {
?>
    <!-- Categories Widget -->
     <div class="widget popular-tag-widget mb-40">
        <h5 class="widget-title">Tags</h5>
        <ul>
            <?php
            foreach ($todas_tags  as $tag) {
                 $link = get_term_link($tag);
            ?>
                <li>
                    <a href="<?php echo esc_url($link); ?>">
                        <?php echo esc_html($tag->name); ?>
                    </a>
                </li>
            <?php

            }
            ?>
        </ul>
    </div>
<?php

}
?> 
