
<div class="pagination-container">
    <?php the_posts_pagination(array(
        'screen_reader_text' => ' ',
        'prev_text'          => __('<<', 'twentyfifteen'),
        'next_text'          => __('>>', 'twentyfifteen'),
        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('', 'nieuwedruk') . ' </span>',
    )); ?>
</div>