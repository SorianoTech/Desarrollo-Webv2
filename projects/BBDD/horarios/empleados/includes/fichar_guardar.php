<?php

include './prohibir.php';
include '../../includes/datos.php';
$estado;

if (isset($_POST['descansar'])) {
    $estado = 0;
} elseif (isset($_POST['entrar'])) {
    $estado = 1;
}

$query = "INSERT INTO horarios_historial (id_empleado, estado) VALUES ('" . $id_empleado . "','" . $estado . "')";

if ($mysqli->query($query)) {
    if($estado==1){
        header("Location: ../pages/fichar.php?ok=1&estado=1");
        exit();
    }elseif($estado==0){
        header("Location: ../pages/fichar.php?ok=1&estado=0");
        exit();
    }
} else {
    header("Location: ../pages/fichar.php?error=2");
    exit();
}
?>

