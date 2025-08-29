<?php

/*******************************************************/
/******************* THEME SUPORT **********************/
/*******************************************************/

//Titulo dinamico
add_theme_support('title-tag');

// side bar
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name'            => 'Sidebar',
        'id'              => 'idebar-1',
        'before_widget'    => '<div class="widget">',
        'after_widget'    => '</div>',
        'before_title'    => '<h3>',
        'after_title'    => '</h3>',
    ));
}

//tamanhos diferentes de imgs na galeria
add_theme_support('post-thumbnails');

//ecerpt pages
add_post_type_support('page', 'excerpt');

// esconde a versao do wp
add_filter('the_generator', 'function_name');
function function_name()
{
    return;
}


/*******************************************************/
/************************* MENU ************************/
/*******************************************************/
add_action('init', 'register_main_menu');

function register_main_menu()
{
    register_nav_menu('main-menu', 'Menu principal do header');
}


function get_custom_menu($id)
{
    $menuLocations = get_nav_menu_locations();
    $menuID = $menuLocations[$id];
    $navbar_items = wp_get_nav_menu_items($menuID);
    $child_items = [];

    foreach ($navbar_items as $key => $item) {
        if ($item->menu_item_parent) {
            array_push($child_items, $item);
            unset($navbar_items[$key]);
        }
    }

    foreach ($navbar_items as $item) {
        foreach ($child_items as $key => $child) {
            if ($child->menu_item_parent == $item->post_name) {
                if (!$item->child_items) {
                    $item->child_items = [];
                }
                array_push($item->child_items, $child);
                unset($child_items[$key]);
            }
        }
    }

    return $navbar_items;
}

/*******************************************************/
/************************ ASSETS ***********************/
/*******************************************************/

function pipe_add_scripts()
{
    wp_enqueue_script('jquery');
 // CSS
    // Agora, seu estilo principal depende de todos os outros estilos que vêm antes dele.
    $style_dependencies = array(
        'bootstrap',
        'animate',
        'pe-icon-7-stroke',
        'magnific-popup',
        'slick',
        'meanmenu',
        'default',
        'style'
    );
    
    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/assets/dist/css/bootstrap.min.css');
    wp_enqueue_style('animate', get_stylesheet_directory_uri() . '/assets/dist/css/animate.min.css');
    wp_enqueue_style('pe-icon-7-stroke', get_stylesheet_directory_uri() . '/assets/dist/css/pe-icon-7-stroke.css');
    wp_enqueue_style('magnific-popup', get_stylesheet_directory_uri() . '/assets/dist/css/magnific-popup.css');
    wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/assets/dist/css/slick.css');
    wp_enqueue_style('meanmenu', get_stylesheet_directory_uri() . '/assets/dist/css/meanmenu.min.css');
    wp_enqueue_style('meanmenu', get_stylesheet_directory_uri() . '/assets/dist/css/edfault.css');
    wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/assets/dist/css/font-awesome.min.css');
    wp_enqueue_style('default', get_stylesheet_directory_uri() . '/assets/dist/css/default.css');
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/assets/dist/css/style.css');

    wp_enqueue_style('pipe_main_css', get_stylesheet_directory_uri() . '/assets/dist/css/style.min.css', $style_dependencies);


    // JavaScript
    //Note que todos os scripts que precisam de jQuery (quase todos) têm 'jquery' como dependência.
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/dist/js/vendor/modernizr-3.6.0.min.js', array(), '3.6.0', false); // Não depende de jQuery, pode ir no header
    wp_enqueue_script('popper', get_template_directory_uri() . '/assets/dist/js/popper.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/dist/js/bootstrap.min.js', array('jquery', 'popper'), '1.0', true);
    wp_enqueue_script('slick', get_template_directory_uri() . '/assets/dist/js/slick.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('isotope.pkgd', get_template_directory_uri() . '/assets/dist/js/isotope.pkgd.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('jquery.magnific-popup', get_template_directory_uri() . '/assets/dist/js/jquery.magnific-popup.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('jquery.inview', get_template_directory_uri() . '/assets/dist/js/jquery.inview.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('jquery.countTo', get_template_directory_uri() . '/assets/dist/js/jquery.countTo.js', array('jquery'), '1.0', true);
    wp_enqueue_script('jquery.easypiechart', get_template_directory_uri() . '/assets/dist/js/jquery.easypiechart.js', array('jquery'), '1.0', true);
    wp_enqueue_script('jquery.meanmenu.min', get_template_directory_uri() . '/assets/dist/js/jquery.meanmenu.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('pipe_main_js', get_template_directory_uri() . '/assets/dist/js/main.min.js', array('jquery'), '1.0', true); // Nosso script principal depende do jQuery
}


add_action('wp_enqueue_scripts', 'pipe_add_scripts');


/*******************************************************/
/************************ DUMP *************************/
/*******************************************************/

function print_var($var)
{
    print("<pre>" . print_r($var, true) . "</pre>");
}

/*******************************************************/
/******************* GET CATEGORIES ********************/
/*******************************************************/

function get_page_categories_by_slug($title, $post_type)
{

    $page = get_page_by_title($title, OBJECT, $post_type);

    return get_the_category($page->ID);
}

/*******************************************************/
/******************* HAS CHILDREN **********************/
/*******************************************************/

function category_has_children($id_post)
{

    $categories = wp_get_post_categories($id_post);

    foreach ($categories as $c) {

        $cat = get_category($c);

        $children =  get_categories(array(
            'orderby' => 'name',
            'parent' => $cat->term_id
        ));

        if (empty($children)) {

            return ($cat->slug);
        }
    }
    return '';
}


/*******************************************************/
/***************** GET ID BY SLUG  *********************/
/*******************************************************/
function get_post_id_by_slug($slug, $post_type)
{

    $args = array(
        'name'        => $slug,
        'post_type'   => $post_type,
        'post_status' => 'publish',
        'numberposts' => 1
    );

    $my_posts = get_posts($args);

    return $my_posts[0]->ID;
}

/*******************************************************/
/**************** GET TITLE BY SLUG  *******************/
/*******************************************************/
function get_post_title_by_slug($slug, $post_type)
{

    $args = array(
        'name'        => $slug,
        'post_type'   => $post_type,
        'post_status' => 'publish',
        'numberposts' => 1
    );

    $my_posts = get_posts($args);

    return $my_posts[0]->post_title;
}

/*******************************************************/
/************* GET PAGE INFORMATIONS *******************/
/*******************************************************/

function get_page_data_by_slug($slug, $post_type)
{

    /*
        Busca as informações de uma página específica pelo título
        retorna uma query para ser loopada
    */

    $id = get_post_id_by_slug($slug, $post_type);

    $args = array(
        'p'         => $id,
        'post_type' => $post_type
    );

    $my_post = new WP_Query($args);

    wp_reset_postdata();

    return $my_post;
}


/*******************************************************/
/***************** GET PAGE BY TITLE *******************/
/*******************************************************/

function get_page_data_by_title($title, $post_type)
{


    $args = array(
        'post_type' => $post_type,
        'posts_per_page' => 5,
        'orderby' => 'title',
        'title' => $title
    );

    $my_post = new WP_Query($args);
    //print_var($my_post);

    wp_reset_postdata();

    return $my_post;
}

/*******************************************************/
/******************* SEARCH ONLY POSTS *****************/
/*******************************************************/

/*
    A searchbar traz, por default, posts types, páginas, ...
    Essa function restringe a pesquisa apenas aos posts do blog
*/

function search_filter($query)
{
    if (!is_admin() && $query->is_main_query()) {
        if ($query->is_search) {
            $query->set('post_type', 'post');
        }
    }
}

add_action('pre_get_posts', 'search_filter');
/* Fim search only posts */


/*******************************************************/
/******************* DADOS INTERNAS ********************/
/*******************************************************/


/*
    esta função trata os títulos das pgs internas
*/
function dados_internas($post_id = null)
{

    $dados = array(
        "titulo"    => "",
        "subtitulo" => "",
        "thumb_url" => "",
    );

    // 1. Define um banner padrão de fallback/configuração fora das condições repetitivas
    $default_banner_id = get_afc_by_page_slug('banner_internas', 'home_config', 'Banner');
    $default_banner_url = wp_get_attachment_image_url($default_banner_id, 'full');

    if (is_404()) {
        $dados['titulo'] = 'Página não encontrada';
        $dados['subtitulo'] = '404';
        $dados['thumb_url'] = $default_banner_url;
    } elseif (is_search()) {
        $dados['titulo'] = 'Resultado da pesquisa';
        $dados['subtitulo'] = 'Resultados para: ' . get_search_query();
        $dados['thumb_url'] = $default_banner_url;
    } elseif (is_home() && !is_front_page()) {
        $dados['titulo'] = 'Blog';
        $dados['thumb_url'] = $default_banner_url;
    } elseif (is_category()) {
        $dados['titulo'] = single_cat_title('', false);
        $dados['thumb_url'] = $default_banner_url;
    } elseif (is_tag()) {
        $dados['titulo'] = single_tag_title('', false);
        $dados['thumb_url'] = $default_banner_url;
    } elseif (is_tax()) {
        $queried_object = get_queried_object();
        $dados['titulo'] = $queried_object->name;
        $dados['thumb_url'] = $default_banner_url;
    } elseif (is_author()) {
        $dados['titulo'] = 'Posts de ' . get_the_author();
        $dados['thumb_url'] = $default_banner_url;
    } elseif (is_date()) {
        $dados['titulo'] = get_the_archive_title();
        $dados['thumb_url'] = $default_banner_url;
    } elseif (is_post_type_archive()) {
        $dados['titulo'] = post_type_archive_title('', false);
        $dados['thumb_url'] = $default_banner_url;
    } elseif (is_archive()) {
        $dados['titulo'] = get_the_archive_title();
        $dados['thumb_url'] = $default_banner_url;
    } else {

        if (is_null($post_id) && is_singular()) {
            $post_id = get_the_ID();
        }

        if ($post_id) {
            $dados['titulo'] = get_the_title($post_id);
            $dados['thumb_url'] = get_the_post_thumbnail_url($post_id, 'full');

            if (empty($dados['thumb_url'])) {
                $dados['thumb_url'] = $default_banner_url;
            }
        } else {
            $dados['titulo'] = get_bloginfo('name');
            $dados['thumb_url'] = $default_banner_url;
        }
    }
    return $dados;
}


/* FIM DADOS INTERNAS */


/*******************************************************/
/********* nome e link das categorias do post **********/
/*******************************************************/

function nome_link_categorias($post_id)
{
    $categories = get_the_category($post_id);

    $all_cats_data = array();

    if (!empty($categories)) {
        // Percorre cada categoria
        foreach ($categories as $category) {
            $all_cats_data[] = array(
                'name' => $category->name,
                'link' => get_category_link($category->term_id)
            );
        }
    }
    //print_var($all_cats_data);
    return $all_cats_data;
}

/*******************************************************/
/*********** nome e link das tags do post **************/
/*******************************************************/

function nome_link_tags($post_id)
{
    $tags = wp_get_post_tags($post_id);

    $all_tags_data = array();

    if (!empty($tags)) {
        // Percorre cada categoria
        foreach ($tags as $tag) {
            $all_tags_data[] = array(
                'name' => $tag->name,
                'link' => get_tag_link($tag->term_id)
            );
        }
    }
    //print_var($all_cats_data);
    return $all_tags_data;
}

/*******************************************************/
/** pega toso os posts com tags e cats doo post atual **/
/*******************************************************/

function get_related_posts_query_args($post_id)
{
    $categories = get_the_category($post_id);
    $tags = get_the_tags($post_id);

    // Array principal da tax_query
    $related_tax_query = array('relation' => 'OR');

    // Se houver categorias, adiciona o array de categorias à query
    if (!empty($categories)) {
        $category_ids = wp_list_pluck($categories, 'term_id');
        $related_tax_query[] = array(
            'taxonomy' => 'category',
            'field'    => 'term_id',
            'terms'    => $category_ids,
        );
    }

    // Se houver tags, adiciona o array de tags à query
    if (!empty($tags)) {
        $tag_ids = wp_list_pluck($tags, 'term_id');
        $related_tax_query[] = array(
            'taxonomy' => 'post_tag',
            'field'    => 'term_id',
            'terms'    => $tag_ids,
        );
    }

    if (!empty($related_tax_query)) {
        return $related_tax_query;
    } else {
        return null; // Retorna nulo se não houver termos para buscar
    }
}



/**************************************************************/
/** na pg de listagen de posts, filtra pelo scf relationship **/
/**************************************************************/

function filtrar_posts_por_cliente($query)
{
    // 1. Verifica se estamos na query principal, no front-end e em uma página de listagem de posts
    if (is_admin() || ! $query->is_main_query() || ! $query->is_home()) {
        return;
    }

    // 2. Verifica se o parâmetro 'cliente_id' está na URL
    if (isset($_GET['cliente_id']) && ! empty($_GET['cliente_id'])) {
        $cliente_id_filtro = intval($_GET['cliente_id']);

        // 3. Adiciona a meta_query para filtrar pelo ID do cliente
        $meta_query = array(
            array(
                'key'     => 'cliente',
                'value'   => '"' . $cliente_id_filtro . '"',
                'compare' => 'LIKE',
            ),
        );
        $query->set('meta_query', $meta_query);
    }
}
add_action('pre_get_posts', 'filtrar_posts_por_cliente');


require('includes/functions/custom-posts.php');
require('includes/functions/img_handle/index.php');
require('includes/functions/acf_utils.php');
//require('includes/functions/polylang/index.php');
//require('includes/functions/Videos/index.php');
//require('includes/functions/lightbox/index.php');
require('includes/functions/list-to-array.php');
require('includes/functions/single-top-bar.php');
require('includes/functions/custom-tax-handle.php');
