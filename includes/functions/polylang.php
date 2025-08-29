<?php

//menu principal






// function section_title($item_title)
// {

//     /*
//         Trata id das sections a partir o item->title
//         em EN o item title é em ingles
//         este tratamento deixa pt-br para a home-en slidar
//     */

//     $section_title = '';
//     if (is_portuguese()) {
//         $section_title = $item_title;
//     } else {
//         switch ($item_title) {
//             case 'Offices':
//                 $section_title = 'escritorios';
//                 break;

//             case 'Products':
//                 $section_title = 'produtos';
//                 break;

//             case 'About':
//                 $section_title = 'sobre';
//                 break;

//             case 'home':
//                 $section_title = 'inicio';
//                 break;
//         }
//     }
//     return $section_title;
// }






// function link_botoes($item, $section_title)
// {

//     /*
//         Trata o link dos botoes do menu
//         Se for pg de contato
//             linke recebe a url
//         Se for home
//             Link recebe um # na frente para slidar
//         Se nao for home
//             link recebe home url + # + seção
//             para ir para a home e slidar para a seção clicada
//     */
//     $link = '';
//     if ($item->title == 'Contato' || $item->title == 'Contact') :

//         $link = $item->url;

//     else :

//         if (is_front_page()) :


//             $link = '#' . sanitize_title(strtolower($section_title));

//         else :

//             $link =  get_home_url() . '/#' . sanitize_title(strtolower($section_title));

//         endif;

//     endif;

//     return $link;
// }


// function link_bandeiras($item, $link)
// {
//     /**
//      * Link das bandeiras
//      * Força o direcionamento para a home.
//      */

//     if ($item->post_title == 'Idiomas' || $item->post_title == 'Languages') {

//         if (is_portuguese()) {
//             if ($item->lang == 'en-US') {
//                 $link = get_home_url() . '/en';
//             } else {
//                 $link = get_home_url();
//             }
//         } else {
//             $home = str_replace("/en", "", get_home_url());

//             if ($item->lang == 'en-US') {
//                 $link =  $home . '/en';
//             } else {
//                 $link =  $home;
//             }
//         }
//     };
//     return $link;
// }

// 
