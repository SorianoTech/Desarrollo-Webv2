<?php
include_once './menu.php';
include_once '../../../servidores/includes/datos.php';


/*


function crearjson($array, $mysqli){
    echo "<ul>";
    foreach ($array as $key => $value) {
        //print_r($value);
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
$array = $resultado->fetch_all();

crearjson($array,$mysqli);
*/


$query = "select * FROM menu order by id";
$resultado = $mysqli->query($query);
$array = $resultado->fetch_all();

file_put_contents("menu.json", json_encode($array));

sleep(2);

$menu_normal = new menu("http://35.180.252.132/~alfonso/php/poo/menu_subcategorias/menu.json");
$menu_normal->pintar_fichero();