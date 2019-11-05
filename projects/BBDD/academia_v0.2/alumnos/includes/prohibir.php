<?php
//asigno variables para poder usarlas en el home(empleados.php)
if(isset($_COOKIE['id_alumno']) && isset($_COOKIE['nombre']) && $_COOKIE['id_alumno'] > 0){
    $id_alumno = $_COOKIE['id_alumno'];
    $nombre_alumno = $_COOKIE['nombre'];
} else {
    header("Location: ../index.php");
    exit();
}
?>
