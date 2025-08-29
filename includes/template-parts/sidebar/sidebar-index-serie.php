<?php
$full_series_from_parent = get_query_var('full_series_data');
$titulo_da_serie = $full_series_from_parent[0]->title;
?>

<!-- Categories Widget -->
<div class="widget indice-serie-widget mb-40">
    <h5 class="widget-title">
        Este post pertence a uma série de posts
    </h5>
    <hr>
    <div class="apresentacao-serie">
        <p class="ad-budget-note">
            Este post faz parte da série <b><?php echo $titulo_da_serie; ?></b>, um guia completo que criamos para ajudar você a se aprofundar mais no tema. Navegue por todos os capítulos para ver o conteúdo na ordem que desejar.
        </p>
    </div>
    <hr>

    <div class="indice-container">
        <ol class="list-group list-group-flush">
            <?php foreach ($full_series_from_parent as $key => $serie) {
                if ($key < 3) {  ?>
                    <li class="list-group-item d-flex align-items-start">
                        <div class="ms-0 me-auto">
                            <a href="<?php echo $serie->permalink; ?>">
                                <i class="fa-solid fa-angles-right"></i>
                                <?php echo $serie->title; ?>
                            </a><br>
                        </div>
                    </li>
                <?php } ?>

            <?php } //fim foeach 
            ?>

            <a href="<?php echo $full_series_from_parent[0]->permalink;; ?>" class="btn-indice main-btn btn-filled smooth">
                Ver o índice da série
            </a>
        </ol>
    </div>
</div>



