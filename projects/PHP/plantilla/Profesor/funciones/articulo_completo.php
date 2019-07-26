<?
 function articulo_completo($datos, $texto){

    
        echo '
            <article>
                <h2>'.$datos[0].'</h2>'.
                $texto.'
                <img src="'.$datos[1].'">
            </article>
            ';

 }
?>