<?php

$blog = get_category_by_slug('blog');
$blog_children = get_categories(
    array('parent' => $blog->term_id)
);
?>

<H4 class="text-center">
    Blog
</H4>
<div class="row">
    <?php foreach ($blog_children as $category) : ?>
        <?php $cat_url = get_category_link($category->term_id); ?>

        <div class="col-12 text-center">
            <a class="btn btn-light" href="<?php echo $cat_url; ?>">
                <?php echo $category->name; ?>
            </a>
        </div>
        <br><br>

    <?php endforeach; ?>
</div>

<?php

$especialidades = get_category_by_slug('especialidades');
$especialidades_children = get_categories(
    array('parent' => $especialidades->term_id)
);

?>
<hr>
<br>
<H4 class="text-center">
    Especialidades
</H4>
<div class="row">
    <?php foreach ($especialidades_children as $category) : ?>

        <div class="col-12 text-center">
            <a class="btn btn-light" href="<?php bloginfo('url'); ?>/especialidades">
                <?php echo $category->name; ?>
            </a>
        </div>
        <br><br>

    <?php endforeach; ?>
</div>