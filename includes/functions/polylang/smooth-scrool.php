<?php

function trata_id_smooth_home(){

    $idioma = pll_current_language();
    $home_id = '';

    switch ($idioma) {
        case 'pt':
            $home_id = 'home';
            break;

        case 'en':
            $home_id = 'home-english';
            break;

        case 'es':  
            $home_id = 'home-espanol';
            break;
    }

    return $home_id;
}

function trata_id_smooth_sobre(){
    $idioma = pll_current_language();
    $sobre_id = '';

    switch ($idioma) {
        case 'pt':
            $sobre_id = 'sobre';
            break;

        case 'en':
            $sobre_id = 'about';
            break;

        case 'es':  
            $sobre_id = 'sobre-2';
            break;
    }

    return $sobre_id;
}

function trata_id_smooth_produtos(){
    $idioma = pll_current_language();
    $produtos_id = '';

    switch ($idioma) {
        case 'pt':
            $produtos_id = 'produtos';
            break;

        case 'en':
            $produtos_id = 'products';
            break;

        case 'es':  
            $produtos_id = 'productos';
            break;
    }

    return $produtos_id;
}

function trata_id_smooth_fotos(){
    $idioma = pll_current_language();
    $fotos_id = '';

    switch ($idioma) {
        case 'pt':
            $fotos_id = 'fotos';
            break;

        case 'en':
            $fotos_id = 'photos';
            break;

        case 'es':  
            $fotos_id = 'fotos-2';
            break;
    }

    return $fotos_id;
}

function trata_id_smooth_videos(){
    $idioma = pll_current_language();
    $videos_id = '';

    switch ($idioma) {
        case 'pt':
            $videos_id = 'videos';
            break;

        case 'en':
            $videos_id = 'videos-en';
            break;

        case 'es':  
            $videos_id = 'videos-3';
            break;
    }

    return $videos_id;
}

function trata_id_smooth_contato(){
    $idioma = pll_current_language();
    $vcontato_id = '';

    switch ($idioma) {
        case 'pt':
            $videos_id = 'contato';
            break;

        case 'en':
            $videos_id = 'contact';
            break;

        case 'es':  
            $videos_id = 'contacto';
            break;
    }

    return $videos_id;
}
?>