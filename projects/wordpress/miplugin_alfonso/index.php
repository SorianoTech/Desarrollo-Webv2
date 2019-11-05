<?php
/*
  Plugin Name: miplugin
  Plugin URI: https://www.ciberweb.com
  Description: Plugin para acceder a shortcodes personalizados
  Version: 1.0.0.1
  Author: Alfonso Javier Gil Llamas
  Author URI: https://www.ciberweb.com
  License: GPLv2 o posterior
 */


/*
function contenido_despues_post( $content ) {
    $texto = file_get_contents("http://35.180.252.132/~alfonso/php/wordpress/listado.php");
    return $content . "<br>" . $texto;
}
add_filter( 'the_content', 'contenido_despues_post' );
*/



function contenido_despues_post( $content ) {
    $texto = "<h3>Últimas noticias de Web Amigas:</h3><ul>";
    $json = json_decode(file_get_contents("http://35.180.252.132/~alfonso/php/wordpress/listado_json.php"),true);
    //print_r($json);
    
    foreach ($json as $value) {
        $texto .=  "<li><a href ='" . $value[1] . "'>".$value[2]."</a></li>";
    } 
    $texto .= "</ul>";
    
    return $content . "<br>" . $texto;
}
add_filter( 'the_content', 'contenido_despues_post' );





function shortcode_hola(){
    return("<p>Hola amigos</p>");
}
add_shortcode("algomasmenoscomun", "shortcode_hola");


/*

function shortcode_noticiasamigas($atts) {
    $a = shortcode_atts(array('nombre' => 'guiaviaje'), $atts );	    
    
    $web['guiaviaje'] = "https://www.guiaviaje.com/json/json.php";
    $web['crina'] = "https://www.cristinabanica.com/cristinabanica3.json";
    $web['david'] = "https://www.davidreneses.es/json.php";

    $json = $web[$a['nombre']];
    $json = json_decode(file_get_contents($json),true);
    $texto = "<h2>Últimas noticias de ".$a['nombre']." </h2><ul>";
    foreach ($json as $value) {
        $texto .= "<li><a href='".$value[1]."'>".$value[0]."</a></li>";
    }
    $texto .= "</ul>";

    return $texto;
}
add_shortcode('noticiasamigas', 'shortcode_noticiasamigas');


function shortcode_videos($atts) {
    $a = shortcode_atts( array(
        'texto' => 'ultimas noticias'
    ), $atts );

    $buscar = rawurlencode($a['texto']);
    $texto = '<center>';

    $data = file_get_contents("https://www.googleapis.com/youtube/v3/search?part=id&q=".$buscar."&type=video&regionCode=ES&key=AIzaSyA37a6YVDbRu-rt6x3FKIOj07nQwmwUPsk");
    $videos = json_decode($data, true);
    if($videos['pageInfo']['totalResults'] > 0){
        $hasta = 4;
        if($videos['pageInfo']['totalResults'] < 5){
            $hasta = $videos['items']['totalResults'] - 1;
        }
        for ($i = 0; $i <= $hasta; $i++) {
            $video = $videos['items'][$i]['id']['videoId'];
            $texto .= '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $video . '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe><br>';
        }
    }
    $texto .= '</center>';
    return $texto ;
}
add_shortcode('videos', 'shortcode_videos');

*/
?>