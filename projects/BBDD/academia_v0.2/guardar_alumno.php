<?php
include_once 'includes/datos.php';

if(isset($_POST['nombre']) && isset($_POST['telefono']) && isset($_POST['mail'])){
    foreach ($_POST as $key => $value) {
        $$key = mysqli_real_escape_string($mysqli,  $value);
    }
    
    $sql = "INSERT INTO alumnos (nombre, telefono, mail) VALUES ('" . $nombre . "', " . $telefono . ", '" . $mail . "')";
    if($mysqli->query($sql)){
        $mysqli->close();
        header("Location: index.php?abrir=alumnos");
        exit();
    } 
}
header("Location: index.php?error=1");
exit();   