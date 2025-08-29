<?php get_header(); ?>
<br><br>

<?php
    $videos_home = get_afc_by_page_slug('todos_os_videos', 'home_config', 'videos');
    echo do_shortcode($videos_home);     
?>
                   
<br><br>
<?php get_footer(); ?>