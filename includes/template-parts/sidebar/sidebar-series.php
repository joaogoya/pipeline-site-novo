<?php

$todas_series = get_terms(array(
    'taxonomy'   => 'serie',
    'hide_empty' => false,
));

if (!empty($todas_series) && !is_wp_error($todas_series)) {
?>
    <!-- Categories Widget -->
    <div class="widget series-widget mb-40">
        <h5 class="widget-title">Series de posts</h5>
        <ul class="lista-series">

            <?php
            foreach ($todas_series as $serie) {
                $link = get_term_link($serie);
            ?>

                <li class="item-serie">
                    <a href="seu-link-aqui" class="nome-serie">
                        <?php echo esc_html($serie->name); ?>
                    </a>
                    <span class="quantidade-posts">
                        <?php echo esc_html($serie->count); ?>
                    </span>
                </li>

            <?php

            }
            ?>
        </ul>
    </div>
<?php

}
?>