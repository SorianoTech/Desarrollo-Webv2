<?php
if(isset($_COOKIE['id_alumno']) && isset($_COOKIE['nombre']) && $_COOKIE['id_alumno'] > 0 && isset($_COOKIE['clave_alumno'])){
    $id_alumno = $_COOKIE['id_alumno'];
    $nombre = $_COOKIE['nombre'];
} else {
    header("Location: index.php");
    exit();
}

