<?php

function get_cta_label()
{
    $idioma = pll_current_language();
    $phone_label = '';

    switch ($idioma) {
        case 'pt':
            $phone_label = 'Para saber mais sobre nossos equipamentos';
            break;

        case 'en':
            $phone_label = 'To find out more about our equipment';
            break;

        case 'es':
            $phone_label = 'PPara saber más sobre nuestros equipos';
            break;
    }

    return $phone_label;
}



function trata_leia_mais()
{
    $idioma = pll_current_language();
    $leia_maisl = '';

    switch ($idioma) {
        case 'pt':
            $leia_maisl = 'LEIA MAIS';
            break;

        case 'en':
            $leia_maisl = 'READ MORE';
            break;

        case 'es':
            $leia_maisl = 'LEA MAS';
            break;
    }

    return $leia_maisl;
}

function trata_fotos_home()
{
    $idioma = pll_current_language();
    $textos_fotos_home = array(
        "frase" => "",
        "botao" => "",
        "link_botao" => ''
    );

    switch ($idioma) {
        case 'pt':
            $textos_fotos_home['frase'] = 'Clique na imagem para ampliar ou';
            $textos_fotos_home['botao'] = 'VEJA TODAS AS FOTOS';
            $textos_fotos_home['link_botao'] = 'fotos';
            break;

        case 'en':
            $textos_fotos_home['frase'] = 'Click on the image to enlarge or';
            $textos_fotos_home['botao'] = 'SEE ALL PHOTOS';
            $textos_fotos_home['link_botao'] = 'en/photos/';
            break;

        case 'es':
            $textos_fotos_home['frase'] = 'Haga clic en la imagen para ampliar o';
            $textos_fotos_home['botao'] = 'VER TODAS LAS FOTOS';
            $textos_fotos_home['link_botao'] = 'es/fotos-2';
            break;
    }

    return $textos_fotos_home;
}

function trata_videos_home()
{
    $idioma = pll_current_language();
    $textos_videos_home = array(
        'frase' => '',
        'botao' => '',
        'link_botao' => '',
        'buscando' => '',
        'titulo' => '',
        'apresentacao' => ''
    );

    switch ($idioma) {
        case 'pt':
            $textos_videos_home['frase'] = 'Clique no vídeo para rodar ou';
            $textos_videos_home['botao'] = 'VEJA TODOS OS VÍDEOS';
            $textos_videos_home['link_botao'] = 'videos';
            $textos_videos_home['buscando'] = 'Conectando no youtube para exibir o vídeo.';
            $textos_videos_home['titulo'] = 'Vídeos';
            $textos_videos_home['apresentacao'] = 'Veja vídeos do nosso equipamento em pleno funcionamento.';
            break;

        case 'en':
            $textos_videos_home['frase'] = 'Click on the video to play or';
            $textos_videos_home['botao'] = 'SEE ALL VIDEOS';
            $textos_videos_home['link_botao'] = 'en/videos-en';
            $textos_videos_home['buscando'] = 'Connecting to YouTube to show the video';
            $textos_videos_home['titulo'] = 'Videos';
            $textos_videos_home['apresentacao'] = 'See videos of our equipment in full operation.';
            break;

        case 'es':
            $textos_videos_home['frase'] = 'Haga clic en el vídeo para reproducir o';
            $textos_videos_home['botao'] = 'VER TODOS LOS VÍDEOS';
            $textos_videos_home['link_botao'] = 'es/videos-3';
            $textos_videos_home['buscando'] = 'Conectando en youtube para exhibir o vídeo.';
            $textos_videos_home['titulo'] = 'Vídeos';
            $textos_videos_home['apresentacao'] = 'Vea videos de nuestros equipos en pleno funcionamiento.';
            break;
    }

    return $textos_videos_home;
}

function get_get_cf7_home(){
    $idioma = pll_current_language();
    $formulario = '';
    switch ($idioma) {
        case 'pt':
            $formulario = '[contact-form-7 id="bebc193" title="Formulário Contato - pt"]';
            break;

        case 'en':
            $formulario = '[contact-form-7 id="a005be4" title="Formulário contato - en"]';
            break;

        case 'es':
            $formulario = '[contact-form-7 id="860d7dc" title="Formulário Contato - es"]';
            break;
    }

    return $formulario;
}

function titulo_contato_home()
{
    $idioma = pll_current_language();
    $titulo = '';

    switch ($idioma) {
        case 'pt':
            $titulo = 'Fale conosco';
            break;

        case 'en':
            $titulo = 'Contact us';
            break;

        case 'es':
            $titulo = 'Hable con nosotros';
            break;
    }

    return $titulo;
}

function desenvolvido_por()
{
    $idioma = pll_current_language();
    $desenvolvido = '';

    switch ($idioma) {
        case 'pt':
            $desenvolvido = 'Desenvolvido por';
            break;

        case 'en':
            $desenvolvido = 'Developed by';
            break;

        case 'es':  
            $desenvolvido = 'Desarrollado por';
            break;
    }

    return $desenvolvido;
}



function trata_404(){
    $idioma = pll_current_language();
    $textos_v404 = array(
        'frase' => '',
        'titulo' => '',        
    );

    switch ($idioma) {
        case 'pt':
            $textos_v404['titulo'] = 'Página não encontrada.';
            $textos_v404['frase'] = 'Lamentamos, mas a página não pôde ser encontrado.';
            break;

        case 'en':
            $textos_v404['titulo'] = 'Page not found.';
            $textos_v404['frase'] = 'Wee are sorry, but the page could not be found.';
            break;

        case 'es':
            $textos_v404['titulo'] = 'Página no encontrada.';
            $textos_v404['frase'] = 'Lo sentimos, pero no se pudo encontrar la página.';
            break;
    }

    return $textos_v404;
}












?>