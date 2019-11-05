<?php
//asigno variables para poder usarlas en el home(empleados.php)
if(isset($_COOKIE['id']) && isset($_COOKIE['empleado']) && $_COOKIE['id'] > 0){
    $id_empleado = $_COOKIE['id'];
    $id_empresa = $_COOKIE['empresa'];
} else {
    header("Location: ../index_empleados.php");
    exit();
}

