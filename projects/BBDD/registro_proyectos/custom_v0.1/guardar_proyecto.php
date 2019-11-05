<?php

include_once './includes/datos.php';
if (isset($_POST['proyecto'])) {
    $proyecto = mysqli_real_escape_string($mysqli, $_POST['proyecto']);
    $sql = "INSERT INTO proyectos_proyecto (proyecto) VALUES ('" . $proyecto . "')";
    if ($mysqli->query($sql)) {
        $mysqli->close();
        header("Location: index.php?abrir=proyecto");
        exit();
    }
}
header("Location: index.php?error=1");
exit();