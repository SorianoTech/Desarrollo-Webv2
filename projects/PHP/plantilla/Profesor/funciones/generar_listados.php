<?
 function generar_listado($array){
    echo '<section>';
    foreach ($array as $key => $value) {
        echo '
            <article>
                <h2>'.$value[0].'</h2>
                <img src="'.$value[1].'">
                <a href="detalle.php?id='.$key.'">Ver Más...</a>
            </article>
            ';
    }
    echo '</section>';
 }
?>