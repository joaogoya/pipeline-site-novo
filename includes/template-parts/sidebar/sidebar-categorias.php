<?php
$todas_categorias = get_terms(array(
    'taxonomy'   => 'category',
    'hide_empty' => false, // Altere para 'true' para não mostrar categorias sem posts
));

if (!empty($todas_categorias) && !is_wp_error($todas_categorias)) {
?>
    <!-- Categories Widget -->
    <div class="widget categories-widget mb-40">
        <h5 class="widget-title">Categories</h5>
        <ul>
            <?php
            foreach ($todas_categorias as $categoria) {
                 $link = get_term_link($categoria);
            ?>
                <li>
                    <a href="<?php echo esc_url($link); ?>">
                        <?php echo esc_html($categoria->name); ?>
                        <span><?php echo esc_html($categoria->count); ?></span>
                    </a>
                </li>

            <?php

            }
            ?>
        </ul>
    </div>
<?php

}
?>

