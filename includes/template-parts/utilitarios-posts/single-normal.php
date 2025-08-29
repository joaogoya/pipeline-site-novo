



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

?>

<section class="blog-section pt-120 pb-120 single-post">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Blog Loop Start -->
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
                                Por: <?php echo $author_first_name; ?>  <?php echo $author_last_name; ?> 
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
                    <?php get_template_part('includes/template-parts/sidebar/sidebar') ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!--====== LATEST POST START ======-->
<section class="latetest-post pb-90 pt-120 news-nao-enontrada">
    <div class="container">
        <!-- Section  Title -->
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-8 col-sm-7 col-6">
                <div class="section-title left-border">
                    <span class="title-tag">Posts</span>
                    <h2>Relacionados</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-4 col-sm-5 col-6">
                <div class="blog-btn text-right">
                    <a href="<?php echo get_site_url(); ?>/blog" class="main-btn btn-filled">Todos os posts</a>
                </div>
            </div>
        </div>
        <!-- post Loop -->
        <div class="post-loop mt-70">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">
                        <?php  get_template_part('includes/template-parts/utilitarios-posts/posts-relacionados') ;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>