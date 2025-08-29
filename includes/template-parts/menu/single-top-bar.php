<!--  Top bar é a barra que exibe o breadcrum e o titulo da página -->

<!-- Se é a home, esconde o topbar -->
<?php 

if (!is_front_page()) : ?>

    <section class="breadcrumb-section" style="background-image: url( <?php echo dados_internas()['thumb_url'];; ?> );">
        <div class="container">
            <div class="breadcrumb-text">
                <h1>
                   <?php echo dados_internas()['titulo']; ?>
                </h1>
            </div>

            <?php
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
            }
            ?>
             <span class="btg-text">onitir</span>
        </div>
        <div class="breadcrumb-shape">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                <path d="M500,97C126.7,96.3,0.8,19.8,0,0v100l1000,0V1C1000,19.4,873.3,97.8,500,97z">
                </path>
            </svg>
        </div>
    </section>





<?php endif; ?>