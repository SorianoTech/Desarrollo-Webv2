<?php

include_once './datos.php';
if (isset($_POST['id_alerta'])) {
    $alerta = $_POST['id_alerta'];
    $sql = "DELETE FROM proyectos_alertas WHERE proyectos_alertas.id=$alerta";
    if ($mysqli->query($sql)) {
        $mysqli->close();
        header("Location: index.php");
        exit();
    }
}
header("Location: index.php?error=1");
exit();