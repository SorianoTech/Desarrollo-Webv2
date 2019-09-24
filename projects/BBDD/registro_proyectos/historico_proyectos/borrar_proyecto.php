<?php

include_once './datos.php';
if (isset($_POST['name_proyecto'])) {
    $proyecto = $_POST['name_proyecto'];
    $sql = "DELETE FROM proyectos_proyecto WHERE proyecto='$proyecto'";
    if ($mysqli->query($sql)) {
        $mysqli->close();
        header("Location: index.php");
        exit();
    }
}
header("Location: index.php?error=3");
exit();