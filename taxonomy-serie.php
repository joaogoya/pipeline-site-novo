<?php get_header();

$opst_serie = get_custom_tax_slug(get_the_id(), 'serie');
$full_series_data = get_full_series_data($opst_serie);

// Adiciona o item "is_last" ao final do novo array
foreach ($full_series_data as $item) {
    if ($item->is_last === true) {
        $item_is_last = $item; 
    } else {
        $array_novo[] = $item; 
    }
}
if ($item_is_last) {
    $array_novo[] = $item_is_last;
}
?>




<section class="blog-section pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="blog-loop">

                    <?php foreach ($array_novo as $key => $item) :  ?>

                        <?php //if ($item->is_index): ?>

                            <!-- <h1>
                                é o primeiro
                            </h1> -->


                        <?php //else: ?>


                            <?php
                       

                            // Obtém o objeto do termo usando o slug
                            $termo = get_term_by('slug', $item->slug, 'serie');

                            // A condição principal
                            if ($termo && $termo->parent > 0) {
                                echo "é fiçlha";
                            } else {
                                echo "nao é filha.";
                            }

                           // print_var($item);


                            ?>



                            <div class="post-standard-box mb-40">
                                <div class="post-desc">

                                    <h2>
                                        <a href="<?php echo $item->permalink; ?>">
                                            <?php echo $item->title; ?>
                                        </a>
                                    </h2>

                                    <p>
                                        <?php echo substr($item->content, 0, 90);  ?>
                                    </p>

                                    <div class="post-footer">
                                        <div class="author">
                                        </div>
                                        <div class="read-more">
                                            <a href="<?php echo $item->permalink; ?>"><i class="fa-solid fa-arrow-right-long"></i></i>Leia Mais</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php //endif; ?>
                    <?php endforeach; ?>
                </div>

                <div class="pagination-wrap">
                    <?php //get_template_part('includes/template-parts/pagination') 
                    ?>
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

<?php get_footer(); ?>