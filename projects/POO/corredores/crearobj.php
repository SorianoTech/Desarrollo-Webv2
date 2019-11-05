<?php
//Conexion a la base de datos
include_once ('../datos.php');
$query = 'SELECT * from tabla_corredores';
$datos = $mysqli->query($query);
$array = $datos->fetch_all();
//print_r($array);

$objetoserializado = serialize($array);
file_put_contents('corredores.txt', $objetoserializado);
$mysqli->close();

?>