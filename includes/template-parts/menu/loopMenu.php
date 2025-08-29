<?php

$main_menu = get_custom_menu('main-menu');

foreach ($main_menu as $item) :

    $post_id = $item->object_id;
    $slug = get_post_field('post_name', $post_id);

    $link = '';
    if ($slug == 'sobre' || $slug == 'blog'):
        $link = $item->url;
    else:
        $link =  get_site_url() . '/#' . $slug;
    endif;

?>
    <?php if (empty($item->child_items)) : // se nao tem filhos 
    ?>
        <li class="">

            <a
                class="<?php if (is_front_page()) : echo 'smooth';
                        endif; ?>"
                title="Vá para a página <?php echo $item->title; ?>"
                href="<?php echo $link; ?>">
                <?php echo $item->title; ?>
            </a>
        </li>

    <?php else : // se tem filhos 
    ?>
        <li class="">

            <a title="Vá para a página <?php echo $item->title; ?>" href="<?php echo $link; ?>">
                <?php echo $item->title ?>
            </a>

            <ul class="submenu">
                <?php 
                    foreach ($item->child_items as $key => $child_item) : 
                   // print_var( $child_item);
                    ?>
                    <li>
                        <a title="Vá para a página <?php echo $child_item->title; ?>" 
                        href="<?php echo $child_item->url; ?>">
                            <?php echo $child_item->title ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

        </li>

    <?php endif; ?>
<?php endforeach; ?>