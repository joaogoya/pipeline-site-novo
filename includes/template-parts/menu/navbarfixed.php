<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary fixed-mobile-menu">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContentFixed" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContentFixed">
            <ul class="navbar-nav mr-auto">
                <?php 
                    //exibe os bts das paginas no menu 
                    get_template_part('includes/template-parts/menu/loopMenu');
                ?>
            </ul>
            <?php
                //exibe as bandeiras do polylang no menu 
                //wp_nav_menu( array( 'menu' => 'polyllang-menu') ); ?>
                <!-- <ul class="polylang-flags">
                    <?php //pll_the_languages(array( 'show_flags' => 1,'show_names' => 0 )); ?>
                </ul> -->
        </div>

    </div>
</nav>

