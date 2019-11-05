<?
    function ordenar_array($array){
        $total = count($array) - 1;
        for($p = 0; $p <= $total; $p++){
            for($b = $p; $b <= $total; $b++){
                if($array[$p] > $array[$b]){
                    $temp = $array[$b];
                    $array[$b] = $array[$p];
                    $array[$p] = $temp;
                }
            }
        }        
        return $array;
    }
    
    function crear_array_alearios($cantidad, $min, $max){
        $numeros;
        $numeros_sacados;
        $vueltas = 0;
        $key = 0;
        for ($index = $min; $index <= $max; $index++) {
            $numeros_sacados[$key++] = $index;
        }        
        
        for ($index = 0; $index < $cantidad; $index++) {
            $vueltas++;
            $indice = rand(0, count($numeros_sacados)-$index-1);
            $numeros[$index] = $numeros_sacados[$indice] ;
            $numeros_sacados[$indice] = $numeros_sacados[count($numeros_sacados)-$index-1];
            $numeros_sacados[count($numeros_sacados)-$index] = $numeros[$index];
        }        
        echo $vueltas;
        return $numeros;
    }
    
    
    function crear_array_alearios_m2($cantidad, $min, $max){
        $numeros;
        $vueltas = 0;
        for ($index = 0; $index < $cantidad; $index++) {
            $aleatorio = rand($min, $max);
            $encontrado = true;
            while($encontrado == true){
                foreach ($numeros as $key => $value) {
                    $vueltas++;
                    if($value == $aleatorio){
                        $aleatorio = rand($min, $max);
                        break;
                    }
                }
                $encontrado = false;
            }
            $numeros[$index] = $aleatorio;
        } 
        echo $vueltas;
        return $numeros;
    }    
?>


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
        <style>
            .celdas{
                width: 20%;
                float: left;
                text-align: center;
                margin-top: 6px;
                margin-bottom: 6px;
            }
            .carton{
                width: 35%;
                margin: auto;
                border: 4px #000000 double;
                margin-top: 15px;
            }
            .borrar{
                float: none;
                clear: both;
            }
            
            .betun{
                color: #EF2400;
            }
        </style>
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script>
            function marcar(carton, celda){
                //alert(id);
                $('#celda_'+carton+'_'+celda).addClass('betun');
            }
        </script>

    </head>
    <body>
        
        <?php
            echo '*****************<br>';
            print_r(crear_array_alearios_m2(5, 1, 150000));
            echo '*****************<br>';
            
            
            echo '*****************<br>';
            print_r(crear_array_alearios(5, 1, 150000));
            echo '*****************<br>';
            
            print_r(ordenar_array(crear_array_alearios(4, 1, 25)));
            print_r(ordenar_array(crear_array_alearios(4, 26, 50)));
            print_r(ordenar_array(crear_array_alearios(4, 51, 75)));
            print_r(ordenar_array(crear_array_alearios(4, 75, 99)));
            
            
            echo '-----------<br>';
            print_r(ordenar_array(crear_array_alearios(16,1,99)));
            
            
           $cantidad_cartones = 4; 
           for ($i = 0; $i < $cantidad_cartones; $i++){
                echo '<div class="carton">';
                $carton = (ordenar_array(crear_array_alearios(25,1,99)));
                for ($index = 0; $index < count($carton); $index++) {
                    echo '<div  onclick="marcar('.$i.','.$index.')" id="celda_' . $i .'_'.$index.'"  class="celdas">'. $carton[$index] .'</div>';
                } 
                echo '<div class="borrar"></div></div>';
           }
             
            
        
            
            
        ?>
            
        
        
    </body>
</html>
