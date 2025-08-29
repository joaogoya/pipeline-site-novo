<?php
add_action('init', 'register_languages_menu');
function register_languages_menu()
{
    register_nav_menu('polyllang-menu', 'Menu do PolyLang');
}

function remove_sufixo($texto)
{
    if (str_contains($texto, '-')) {
        
        $texto_sarray = array_map('trim', explode('-', $texto));
        $texto_sem_sufixo = $texto_sarray[0];
    } else {
        $texto_sem_sufixo = $texto;
        
    }
    return $texto_sem_sufixo;
}

require('traducoes-home.php');
require('smooth-scrool.php');
?>