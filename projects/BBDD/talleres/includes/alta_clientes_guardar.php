<?php
include './datos.php';
include './prohibir.php';
if(isset($_POST['dni']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) && $_SERVER['HTTP_REFERER'] == "http://35.180.100.249/~alfonso/php/bbdd/talleres/alta_clientes.php"){
    $query = "INSERT INTO clientes (nombre, mail, telefono, sexo, dni, fecha_nacimiento, taller) VALUES ('" . $_POST['nombre'] . "','" . $_POST['mail'] . "','" . $_POST['telefono'] . "'," . $_POST['sexo'] . ", '" . $_POST['dni'] . "', '" . $_POST['fecha_nacimiento'] . "', ".$id_taller." )";
    //echo $query;
    if($mysqli->query($query)){
        header("Location: ../clientes.php?id=".$mysqli->insert_id);
        exit();
    } else {
        header("Location: ../alta_clientes.php?error=2");
        exit();
    }
} else {
    header("Location: ../alta_clientes.php?error=1");
    exit();    
}
