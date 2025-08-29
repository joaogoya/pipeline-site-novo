<!DOCTYPE HTML>
<html class="no-js" lang="pt-br">

<head>
    <!-- <meta charset="<?php //bloginfo('charset'); 
                        ?>"> -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Pipeline Digital">
    <meta name="generator" content="Vscode">
    <meta name="rating" content="general">
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="icon" href="<?php bloginfo('template_url'); ?>/assets/img/logo.png">

    <!-- 
        preload lcp 
   -->
    <?php
    // $banner_id = get_afc_by_page_slug('imagem_do_banner', 'home_config', 'banner');
    // echo pipe_pre_load_image($banner_id);
    ?>
    <!-- fim preload -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="preload" href="https://fonts.gstatic.com/s/oswald/v100/example-oswald-700.woff2" as="font" type="font/woff2" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">

    <!-- header onitir -->

    <?php wp_head(); ?>
</head>

<body id="home" class="home-smooth">

    <!--====== PRELOADER ======-->
    <!-- <div id="preloader">
        <div>
            <div></div>
        </div>
    </div> -->

    <header class="header-absolute header-three sticky-header">

        <div class="container-fluid custom-container-two">

            <!-- desk menu -->
            <div class="mainmenu-area">
                <div class="d-flex align-items-center justify-content-between">
                    <!-- nav -->
                    <?php get_template_part('includes/template-parts/menu/navbar'); ?>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div class="row">
                <div class="col-12">
                    <div class="mobile-menu"></div>
                </div>
            </div>

        </div><!-- container fluid -->
    </header>

    <?php get_template_part('includes/template-parts/menu/single-top-bar'); ?>

    <!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->