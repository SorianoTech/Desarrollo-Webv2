<?php
include_once './prohibir.php';
include '../includes/datos.php';

function generarCodigo($longitud) {
    $key = '';
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    $max = strlen($pattern)-1;
    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
    return $key;
}   

if(isset($_POST['mail']) && isset($_POST['nombre']) &&  filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
    $nombre = mysqli_real_escape_string($mysqli, $_POST['nombre']);
    $pass = generarCodigo(10);

    $query  = 'INSERT INTO empleados'
            . ' (nombre, pass, mail, empresa) '
            . 'VALUES '
            . '("'.$nombre.'", "'.$pass.'","'.$_POST['mail'].'",'. $_SESSION['id_empresa'].')';
    if($mysqli->query($query)){
        header("Location: index.php");
        exit();           
    } else {
        header("Location: index.php?error=4");
        exit();           
    }
    
} else {
    header("Location: index.php?error=3");
    exit();    
}
