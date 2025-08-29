<?php get_header(); ?>

<section class="portfolio-details-wrap pt-150 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-2"></div>

            <!-- 
                Conteudo portifa
                box azul e the_content    
            -->
            <div class="col-lg-8">
                <div id="pg-not-found" class="contact-section portifa">
                    <div class="contact-form-wrapper portifa">


                        <?php if($post->post_name == 'projeto-da-agencia'): ?>
                            <h1>
                                <?php the_title();?> <br><br>
                            </h1>
                            <?php else: ?>

                        <!-- box azul -->
                        <div class="row">
                            <div class="col-12">
                                <div class="contact-form">
                                    <div class="row">

                                        <div class="card col-md-4">
                                            <div class="card-body">
                                                <h3 class="card-title">
                                                    Ramo
                                                </h3>
                                                <h4 class="card-subtitle mb-2 text-body-secondary">
                                                    <?php the_field('ramo'); ?>
                                                </h4>
                                            </div>
                                        </div>

                                        <div class="card col-md-4">
                                            <div class="card-body">
                                                <h3 class="card-title">
                                                    Cidade
                                                </h3>
                                                <h4 class="card-subtitle mb-2 text-body-secondary">
                                                    <?php the_field('cidade'); ?>
                                                </h4>
                                            </div>
                                        </div>

                                        <div class="card col-md-4">
                                            <div class="card-body">
                                                <h3 class="card-title">
                                                    Solução
                                                </h3>
                                                <h4 class="card-subtitle mb-2 text-body-secondary">
                                                    <?php the_field('solucao'); ?>
                                                </h4>
                                            </div>
                                        </div>

                                        <div class="card col-md-4">
                                            <div class="card-body">
                                                <h3 class="card-title">
                                                    Inicio
                                                </h3>
                                                <h4 class="card-subtitle mb-2 text-body-secondary">
                                                    <?php the_field('inicio'); ?>
                                                </h4>
                                            </div>
                                        </div>

                                        <div class="card col-md-8">
                                            <div class="card-body">
                                                <h3 class="card-title">
                                                    Serviços Prestados
                                                </h3>
                                                <h4 class="card-subtitle mb-2 text-body-secondary">
                                                    <?php the_field('servicos_prestados'); ?>
                                                </h4>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- fim box azul -->
                         <br><br><br>

                        <?php endif; ?>

                    </div>
                </div>
                

                <div class="single-post">
                    <div class="conteudo-post">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <!-- fim conteudo prtifa -->

            <div class="col-lg-2"></div>
        </div>
    </div>
</section>

<!-- blog do projeto  -->
 <?php  get_template_part('includes/template-parts/utilitarios-posts/blog-do-projeto') ;?>

<?php get_footer(); ?>