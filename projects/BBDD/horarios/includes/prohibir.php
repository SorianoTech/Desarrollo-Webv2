<?php
//asigno variables para poder usarlas en el home(empleados.php)
if(isset($_COOKIE['id_empresa']) && isset($_COOKIE['empresa']) && $_COOKIE['id_empresa'] > 0){
    $id_empresa = $_COOKIE['id_empresa'];
    $nombre_empresa = $_COOKIE['empresa'];
} else {
    header("Location: ../index.php");
    exit();
}

