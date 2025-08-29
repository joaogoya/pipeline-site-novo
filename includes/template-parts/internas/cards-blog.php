<div class="card col-12 card-horizontal-03">
    <div class="row no-gutters">
        <?php if (has_post_thumbnail($post->ID)) : ?>
            <div class="col-lg-4 card-header">
                <div class="center-image">
                    <?php echo pipe_get_img($post->ID, true, 'medium', 'card-img-top'); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php $coluna = has_post_thumbnail($post->ID) ? '8' : '12'; ?>
        <div class="col-lg-<?php echo $coluna; ?>">
            <div class="card-body">
                <h3>
                    <?php the_title(); ?>
                </h3>
                <p class="card-infos">
                    <i class="far fa-user"></i> <?php echo get_the_date('d F Y'); ?>
                </p>
                <p class="card-text">
                    <?php echo wp_trim_words(get_the_content(), 15, '...'); ?>
                </p>
                <p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                        Ler mais
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>