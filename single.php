<?php get_header();

    if ( has_term( '', 'serie' ) ) {
        get_template_part('includes/template-parts/utilitarios-posts/single-serie') ;
    } else {
        get_template_part('includes/template-parts/utilitarios-posts/single-normal') ;
    }

get_footer(); ?>