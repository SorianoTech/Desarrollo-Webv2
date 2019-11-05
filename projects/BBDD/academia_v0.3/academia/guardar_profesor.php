<?php
include_once '../includes/datos.php';
include_once '../includes/funciones.php';

if(isset($_POST['nombre']) && isset($_POST['telefono']) && isset($_POST['mail']) && isset($_POST['materia'])){
    foreach ($_POST as $key => $value) {
        $$key = mysqli_real_escape_string($mysqli,  $value);
    }
    
    $sql = "INSERT INTO profesores (nombre, telefono, mail, pass) VALUES ('" . $nombre . "', " . $telefono . ", '" . $mail . "', '" . generar_password_complejo(10) . "')";
    if($mysqli->query($sql)){
        $id_profesor = $mysqli->insert_id;
        foreach ($_POST['materia'] as $key => $value) {
            $sql = "INSERT INTO profesores_materias (profesor, materia) VALUES (" . $id_profesor . ", " . $value . ")";
            $mysqli->query($sql);
        }
        $mysqli->close();
        header("Location: index.php?abrir=profesores");
        exit();
    } 
}
header("Location: index.php?error=1");
exit();   