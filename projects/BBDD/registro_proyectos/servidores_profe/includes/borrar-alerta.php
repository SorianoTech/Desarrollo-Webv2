<?php
/*
Borrar Alertas
*/
include_once './datos.php';

$id = $mysqli->real_escape_string($_POST['id']);

$resultado = $mysqli->prepare("delete from alertas where id = ?");
$resultado->bind_param("i", $id);

if($resultado->execute()){
    echo "2";
} else {
    echo "1";
}



?>