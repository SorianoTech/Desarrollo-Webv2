<?php
include_once 'includes/datos.php';
print_r($_POST);
if(isset($_POST['nombre']) && isset($_POST['telefono']) && isset($_POST['mail'])){
//if(isset($_POST['nombre']) && isset($_POST['telefono']) && isset($_POST['mail']) && isset($_POST['materia']))    
    foreach ($_POST as $key => $value) {
        //crea una variable por cada elemento recibido por POST
        $$key = mysqli_real_escape_string($mysqli,  $value);
    }
    
    $sql = "INSERT INTO profesores (nombre, telefono, mail) VALUES ('" . $nombre . "', " . $telefono . ", '" . $mail . "')";
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
//header("Location: index.php?error=1");
//exit();   