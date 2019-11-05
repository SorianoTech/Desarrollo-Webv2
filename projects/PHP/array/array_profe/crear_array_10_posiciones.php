<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $numeros;
            for ($index = 0; $index < 10; $index++) {
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
