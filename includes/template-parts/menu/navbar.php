

<nav class="main-menu">
    <div class="logo">

        <a 
            href="<?php echo get_site_url(); ?><?php if (is_front_page()) :echo '/#hero';endif; ?>
            " class="smooth" title="Vá para a nossa páginia inicial.">
            <?php
            $logo_id = get_afc_by_page_slug('logo_do_menu', 'home_config', 'logos');
            echo pipe_get_img($logo_id, false, 'thumb', 'normal-logo');
            echo pipe_get_img($logo_id, false, 'thumb', 'sticky-logo');
            ?>
        </a>
    </div>
    <div class="menu-items">
        <ul>
            <?php get_template_part('includes/template-parts/menu/loopMenu'); ?>
        </ul>
    </div>
</nav>

<div class="main-right">

    <a href="<?php echo get_site_url(); ?>/#orcamento" class="main-btn btn-filled smooth" title="Peça seu orçamento.">
        Orçamento
    </a>

    <a href="#" class="offcanvas-trigger">
        <i class="fa-solid fa-ellipsis-vertical"></i>
    </a>

    <?php get_template_part('includes/template-parts/menu/side-menu');  ?>
</div>