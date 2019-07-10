<!DOCTYPE html>
<!--
Array de 10 posiciones ordenado
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $numeros;
            for ($index = 0; $index < 10; $index++) { // Crea una array de de 10 posiciones con numeros entre el 1 y el 99
                $numeros[$index] = rand(1, 99);
            }
            echo '<pre>';
            print_r($numeros);
            echo '</pre>';
            
            for($p = 0; $p <= 9; $p++){
                for($b = $p; $b <= 9; $b++){
                    if($numeros[$p] > $numeros[$b]){
                        $temp = $numeros[$b];
                        $numeros[$b] = $numeros[$p];
                        $numeros[$p] = $temp;
                    }
                }
            }
            
            echo '<pre>';
            print_r($numeros);
            echo '</pre>';            
            
        ?>
    </body>
</html>