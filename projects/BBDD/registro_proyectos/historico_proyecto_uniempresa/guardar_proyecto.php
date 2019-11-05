<?php

include_once './datos.php';
if (!empty($_POST['proyecto'])) {
    $proyecto = mysqli_real_escape_string($mysqli, $_POST['proyecto']);
    $sql = "INSERT INTO proyectos_proyecto (proyecto) VALUES ('" . $proyecto . "')";
    if ($mysqli->query($sql)) {
        $mysqli->close();
        header("Location: index.php?dominio=$proyecto");
        exit();
    }
}
header("Location: index.php?error=1");
exit();