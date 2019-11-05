<?php
//asigno variables para poder usarlas en el home(empleados.php)
if(isset($_COOKIE['id_profesor']) && isset($_COOKIE['nombre']) && $_COOKIE['id_profesor'] > 0){
    $id_profesor = $_COOKIE['id_profesor'];
    $nombre_profesor = $_COOKIE['nombre'];
} else {
    header("Location: ../index.php");
    exit();
}
?>
