<?php
//envia dados das series para os widgets
$full_series_from_parent = get_query_var('full_series_data');
set_query_var('series_data_for_index', $full_series_from_parent);
?>


<?php get_template_part('includes/template-parts/sidebar/sidebar-index-serie') ; ?>
<?php get_template_part('includes/template-parts/sidebar/sidebar-pesquisar') ?>
<?php get_template_part('includes/template-parts/sidebar/sidebar-social') ?>
<?php get_template_part('includes/template-parts/sidebar/sidebar-sobre') ; ?>

