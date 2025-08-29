<!-- 404 - página nao econtrada -->
<?php if (is_404()) : ?>
    Página Não encontrada

    <!-- Resultado de pesquisa -->
<?php elseif (is_search()) : ?>
    Resultado da pesquisa

    <!-- Lista de posts do blog -->
<?php elseif (is_home()): ?>
    Blog


    <!-- Produtos -->
<?php elseif (is_singular('portfolio')):
    echo get_post_title_by_slug(get_queried_object()->post_name, 'portfolio');
?>

    <!-- Serviços -->
<?php elseif (is_singular('servicos')):
    echo get_post_title_by_slug(get_queried_object()->post_name, 'servicos');
?>

    <!-- Página comum -->
<?php else : ?>
    <?php //echo remove_sufixo(get_the_title());  ?>

<?php endif; ?>