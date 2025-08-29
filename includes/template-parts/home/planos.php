<section id="planos" class="services-secton services-secton-two pt-120 pb-120 ">
    <div class="container">
        <!-- Section Title -->
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-5 col-md-8 col-sm-7">
                <div class="section-title left-border">
                    <span class="title-tag">conheça</span>
                    <h2>Nossos planos e valores</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-4 col-sm-5 d-none d-sm-block">
                <div class="service-page-link- text-right">
                    <a href="<?php echo get_site_url(); ?>/orcamento" class="main-btn btn-filled" title="Peça seu orçamento.">
                        Orçamento
                    </a>
                </div>
            </div>
        </div>
        <br><br><br><br>

        <?php
        // 1. Encontrar o ID do post pai "planos" dentro do CPT 'home-config'
        $parent_post = get_page_by_path('planos', OBJECT, 'home_config');

        $parent_id = 0;
        if ($parent_post) {
            $parent_id = $parent_post->ID;
        }

        // 2. Montar a WP_Query para os posts filhos
        if ($parent_id) {
            $args = array(
                'post_type'      => 'home_config', // CPT dos posts filhos. Ajuste se for outro CPT (ex: 'plano')
                'post_parent'    => $parent_id,    // ID do post pai
                'posts_per_page' => -1,            // Traz todos os filhos (no seu caso, os 3)
                'orderby'        => 'date',  // Opcional: ordena pela ordem que você definiu no painel
                'order'          => 'ASC',         // Ordem ascendente
                'post_status'    => 'publish',     // Apenas posts publicados
            );
            $children_query = new WP_Query($args);
        } else {
            echo '<p>O post pai "planos" (CPT home-config) não foi encontrado.</p>';
        } ?>

        <div class="pricing-table"><!-- container tabelas -->

            <?php if ($children_query->have_posts()) {

                while ($children_query->have_posts()) {
                    $children_query->the_post();

                    /*
                        Class features para tabela do meio
                    */
                    $featured = '';
                    if ($post->post_name == 'plano-profissional') {
                        $featured = "featured";
                    } else {
                        $featured = '';
                    }
            ?>

                    <div class="pricing-plan <?= $featured; ?> "> <!-- Tabela  - lebrar que a do meio tem a class featured - ver se é só essa -->

                        <!-- icone -->
                        <div class="plan-icon-top">
                            <i class="<?php echo get_field('icone_do_plano'); ?>"></i>
                        </div>

                        <!-- Apresentação do plano -->
                        <div class="plan-header">
                            <h3><?php the_title(); ?></h3>
                            <p class="plan-sub-title">
                                <?php //echo get_afc_by_page_slug('titulo_gmn', 'home_config', 'sercicos'); 
                                ?>
                                <?php the_field('subtitulo_do_plano'); ?>
                            </p>
                            <!-- Valor do plano -->
                            <div class="price-highlight-box">
                                <span class="plan-price"> <small>R$</small> <?php the_field('valor_do_plano'); ?><small>/mês</small></span>
                                <p class="ad-budget-note">Verba de anúncios não inclusa.</p>
                            </div>
                        </div>

                        <!-- Lista de vantagens do plano-->
                        <div class="plan-features">
                            <ol class="list-group list-group-flush">

                                <?php

                                // Chame a função, especificando o separador (se usar '::' ou outro)
                                // Se você pedir para o cliente usar <br> no WYSIWYG, deixe o separador vazio.
                                $lista_formatada = pipeline_get_list_wysing(get_field('vantagens_do_plano'), '::'); // Ou use '' para detecção de <br>

                                foreach ($lista_formatada as $key => $vantagems) { ?>
                                    <li class="list-group-item d-flex align-items-start">
                                        <i class="pe-7s-check me-2"></i> 
                                        <div class="ms-0 me-auto"> <?php echo $vantagems['item']; ?> <br>
                                            <small><?php echo $vantagems['subitem']; ?></small>
                                        </div>
                                    </li>

                                <?php  }  ?>
                            </ol>
                        </div>

                        <!-- bt quero saber mais -->
                        <div class="plan-footer">
                            <a href="<?php echo get_site_url(); ?>/servicos/<?php echo $post->post_name; ?>" title="Peça já seu orçamento!" class="main-btn btn-filled mt-40">Saiba Mais</a>
                        </div>
                    </div>
            <?php

                } //fecha while

                wp_reset_postdata(); // Restaura os dados originais do post global
            } else { // fecha if have posts
                echo '<p>Nenhum plano filho encontrado para o post pai "planos" no CPT home-config.</p>';
            }

            ?>

        </div><!-- container tabelas -->
    </div>
    <br><br>
</section>
<!--====== SERVICES SECTION END ====== -->