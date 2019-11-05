<?php
include_once '../includes/datos.php';

if(isset($_POST['materia'])){
    $materia = mysqli_real_escape_string($mysqli, $_POST['materia']);
    $sql = "INSERT INTO materias (materia) VALUES ('" . $materia . "')";
    if($mysqli->query($sql)){
        $mysqli->close();
        header("Location: index.php");
        exit();
    } 
}
header("Location: index.php?error=1");
exit();    

