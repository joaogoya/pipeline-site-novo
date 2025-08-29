<?php

// autor e data - sao usados em dois locais

$author_id = get_the_author_meta('ID');
$avatar_dados = get_the_author_meta('simple_local_avatar', $author_id);
$avatar_id = $avatar_dados['media_id'];

$author_first_name = get_the_author_meta('first_name', $author_id);
$author_last_name  = get_the_author_meta('last_name', $author_id);
$author_desc       = get_the_author_meta('description', $author_id);

//------------------------------------

$dia = get_the_date('d');
$mes = get_the_date('F');
$ano = get_the_date('Y');


/*seta todos os posts da série*/
$opst_serie = get_custom_tax_slug(get_the_id(),'serie' );
$full_series_data = get_full_series_data($opst_serie);
set_query_var('full_series_data', $full_series_data);

?>

<section class="blog-section pt-120 pb-120 single-post">
    <div class="container">
        <div class="row justify-content-center">

            <!-- Start -->
            <div class="col-lg-8">
                <div class="blog-details-box">
                    <div class="entry-content">

                        <?php
                        $categorias = nome_link_categorias(get_the_id());
                        ?>
                        <!-- <a href="<?php echo $categorias[0]['link']; ?>" class="cat">
                            <?php echo $categorias[0]['name']; ?>
                        </a> -->

                        <h2 class="title">
                            <?php the_title(); ?>
                        </h2>

                        <ul class="post-meta">
                            <li>
                                <i class="far fa-user"></i>
                                Por: <?php echo $author_first_name; ?> <?php echo $author_last_name; ?>
                            </li>
                            <li>
                                <i class="far fa-calendar-alt"></i>
                                <?php echo $dia; ?> de <?php echo $mes; ?> de <?php echo $ano; ?>
                            </li>
                        </ul>

                        <div class="conteudo-post">
                            <?php the_content(); ?>
                        </div>
                    </div>

                    <div class="entry-footer">

                        <?php $navegação = get_next_and_prev_posts(get_the_ID(), $full_series_data); ?>

                        <div class="related-post mt-50">

                            <div class="row">

                                <div class="col-md-6">
                                    <?php if ($navegação['item_prev']): ?>
                                        <div class="related-post-box mb-50">
                                            <h3 class="mb-30">
                                                Post Anterior
                                            </h3>
                                            <div class="thumb"
                                                style="background-image: url(<?php echo $navegação['item_prev']->thumb; ?>);">
                                            </div>
                                            <div class="desc">
                                                <h4>
                                                    <a href="<?php echo $navegação['item_prev']->permalink; ?>">
                                                        <?php echo $navegação['item_prev']->title; ?>
                                                    </a>
                                                </h4>
                                                <p>
                                                    <?php echo substr($navegação['item_prev']->content, 0, 90);  ?>
                                                </p>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="related-post-box mb-50">
                                            <h3 class="mb-30">
                                                Post Anterior
                                            </h3>

                                            <div class="desc">
                                                <p>
                                                    O post que você acabou de ler é o primeiro da série. Não existe post anterior.
                                                </p>
                                            </div>

                                        </div>
                                    <?php endif; ?>
                                </div>


                                <div class="col-md-6">
                                    <?php if ($navegação['item_next']): ?>
                                        <div class="related-post-box mb-50">
                                            <h3 class="mb-30">
                                                Post Anterior
                                            </h3>
                                            <div class="thumb"
                                                style="background-image: url(<?php echo $navegação['item_next']->thumb; ?>);">
                                            </div>
                                            <div class="desc">
                                                <h4>
                                                    <a href="<?php echo $navegação['item_next']->permalink; ?>">
                                                        <?php echo $navegação['item_next']->title; ?>
                                                    </a>
                                                </h4>
                                                <p>
                                                    <?php echo substr($navegação['item_next']->content, 0, 90);  ?>
                                                </p>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="related-post-box mb-50">
                                            <h3 class="mb-30">
                                                Próximo Post
                                            </h3>

                                            <div class="desc">
                                                <p>
                                                    O post que você acabou de ler é o último da série. Não existe próximo post.
                                                </p>
                                            </div>

                                        </div>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
















                        <div class="post-nav tag-and-share mt-50 d-md-flex align-items-center justify-content-between">
                            <div class="tag">
                                <h5>Categorias</h5>
                                <ul>
                                    <?php
                                    //$categorias = get_cata_data(get_the_id());
                                    foreach ($categorias as $key => $categoria) {
                                    ?>
                                        <li>
                                            <a href="<?php echo $categoria['link']; ?>" class="cat-loop">
                                                <?php echo $categoria['name']; ?>
                                            </a>
                                        </li>
                                    <?php  } ?>
                                </ul>
                            </div>
                        </div>

                        <div class="post-nav tag-and-share d-md-flex align-items-center justify-content-between">
                            <div class="tag">
                                <h5>Tags</h5>
                                <ul>
                                    <?php $tags = nome_link_tags(get_the_id());
                                    foreach ($tags as $key => $tag) {
                                    ?>
                                        <li>
                                            <a href="<?php echo $tag['link']; ?>">
                                                <?php echo $tag['name']; ?>
                                            </a>
                                        </li>
                                    <?php  } ?>
                                </ul>
                            </div>
                        </div>

                        <div class="author-info-box mb-45">

                            <div class="author-img">
                                <?php echo pipe_get_img($avatar_id, false, 'small', 'lg-total'); ?>
                            </div>
                            <div class="info-text">
                                <span>Escrito por</span>
                                <h3><?php echo esc_html($author_first_name); ?> <?php echo esc_html($author_last_name); ?></h3>
                                <p>
                                    <?php echo esc_html($author_desc); ?>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-4 col-md-8 col-sm-10">
                <div class="sidebar">
                    <?php get_template_part('includes/template-parts/sidebar/sidebar-single-serie') ?>
                </div>
            </div>


        </div>
    </div>
</section>