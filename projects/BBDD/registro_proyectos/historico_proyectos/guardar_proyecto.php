<?php

include_once './datos.php';
if (!empty($_POST['proyecto'])) {
    $proyecto = mysqli_real_escape_string($mysqli, $_POST['proyecto']);
    $id_empresa =  $_POST['id_empresa'];
    $sql = "INSERT INTO proyectos_proyecto (proyecto, id_empresa) VALUES ('" . $proyecto ."','$id_empresa')";
    if ($mysqli->query($sql)) {
        $mysqli->close();
        header("Location: index.php?dominio=$proyecto");
        exit();
    }
}
header("Location: index.php?error=1");
exit();