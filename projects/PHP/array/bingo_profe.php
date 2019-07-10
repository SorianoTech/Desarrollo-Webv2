<?
function ordenar_array($array)
{
    $total = count($array) - 1;
    for ($p = 0; $p <= $total; $p++) {
        for ($b = $p; $b <= $total; $b++) {
            if ($array[$p] > $array[$b]) {
                $temp = $array[$b];
                $array[$b] = $array[$p];
                $array[$p] = $temp;
            }
        }
    }
    return $array;
}
//Esta funcion me crea array con nueros aleatorios sin que los números se repitan
function crear_array_alearios($cantidad, $min, $max)
{ //introduces la cantidad de elementos de la arrays y los números aleatorios que van a formarla
    $numeros; //array para meter los números aleatorios
    $numeros_sacados; // array espejo para quitar los números
    $key = 0;  //para saber en que posición estamos
    //Creo el array espejo desde la posición min hasta el max
    for ($index = $min; $index <= $max; $index++) {
        //si min = 10 y max = 30- $numeros_sacados[1-2-3] = 10 / $index=10-11-12 
        $numeros_sacados[$key++] = $index;
    }
    //bucle para que no se repitan los números,mete los valores en otra array y le resta 1
    for ($index = 0; $index < $cantidad; $index++) {
        $indice = rand(0, count($numeros_sacados) - $index - 1); //indice es igual a numero aletorio entre 0 y contador del array espejo menos el indice menos
        $numeros[$index] = $numeros_sacados[$indice];
        $numeros_sacados[$indice] = $numeros_sacados[count($numeros_sacados) - $index - 1];
        $numeros_sacados[count($numeros_sacados) - $index] = $numeros[$index];
    }
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
        .celdas {
            width: 20%;
            float: left;
            text-align: center;
            margin-top: 6px;
            margin-bottom: 6px;
        }

        .carton {
            width: 35%;
            margin: auto;
            border: 4px #000000 double;
            margin-top: 15px;
        }

        .borrar {
            float: none;
            clear: both;
        }

        .betun {
            color: #EF2400;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script>
        function marcar(carton, celda) {
            //alert(id);
            $('#celda_' + carton + '_' + celda).addClass('betun');
        }
    </script>

</head>

<body>

    <?php
    print_r(ordenar_array(crear_array_alearios(4, 1, 25)));
    print_r(ordenar_array(crear_array_alearios(4, 26, 50)));
    print_r(ordenar_array(crear_array_alearios(4, 51, 75)));
    print_r(ordenar_array(crear_array_alearios(4, 75, 99)));


    echo '-----------<br>';
    print_r(ordenar_array(crear_array_alearios(16, 1, 99)));


    $cantidad_cartones = 4;
    for ($i = 0; $i < $cantidad_cartones; $i++) {
        echo '<div class="carton">';
        $carton = (ordenar_array(crear_array_alearios(25, 1, 99)));
        for ($index = 0; $index < count($carton); $index++) {
            echo '<div  onclick="marcar(' . $i . ',' . $index . ')" id="celda_' . $i . '_' . $index . '"  class="celdas">' . $carton[$index] . '</div>';
        }
        echo '<div class="borrar"></div></div>';
    }
    ?>
</body>

</html>