<?php
include_once '../../../datos.php';

function crearjson($array, $mysqli){
    echo "<ul>";
    foreach ($array as $key => $value) {
        echo "<li>" . $value[0] . " " . $value[1];
        $query = "select * FROM menu where padre = " . $value[0] . " order by id";
        $resultado = $mysqli->query($query);
        if($resultado->num_rows > 0){
            $resultado = $resultado->fetch_all(); 
            crearjson($resultado,$mysqli);
        }
        echo '</li>';
    }
    echo "</ul>";
}


$query = "select * FROM menu where padre = 0 order by id";

$resultado = $mysqli->query($query);
echo gettype($resultado); //objeto

$array = $resultado->fetch_all();
echo gettype($array); //array
echo "<pre>";
    print_r($array);
echo "</pre>";

crearjson($array,$mysqli);