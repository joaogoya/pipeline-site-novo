<ul class="nav justify-content-center">
    <?php
    $main_menu = get_custom_menu('main-menu');
    foreach ($main_menu as $item) : ?>
        <li class="nav-item">
            <?php
            // $post = get_page_data_by_title($item->title, 'page');
            // $slug = $post->post->post_name;

            $post_id = url_to_postid($item->url);
            $slug = get_post_field('post_name', $post_id);
            ?>
            <a class="nav-link link-primary <?php if (is_front_page()) : echo 'smooth';
                                            endif; ?>" title="Vá para a página <?php echo $item->title;  ?>" href="<?php if (!is_front_page()) : echo  bloginfo('url');
                                                                                                                                                                endif; ?>/#<?php echo $slug; ?>">
                <?php echo $item->title; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>