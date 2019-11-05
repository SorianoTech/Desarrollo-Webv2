<?php
include '../includes/datos.php';
if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) && isset($_POST['pass']) && $_SERVER['HTTP_REFERER'] == "https://alfonsoylaura.com/alumnos/index.php"){
    
    $pass = mysqli_real_escape_string($mysqli, $_POST['pass']);
    $mail = mysqli_real_escape_string($mysqli, $_POST['mail']);
    
    $resultado = $mysqli->prepare("SELECT id, nombre, clave FROM alumnos WHERE mail = ? and pass = ? limit 1");
    $resultado->bind_param("ss", $mail, $pass);     
    $resultado->execute();
    $resultado = $resultado->get_result();
    if($resultado->num_rows == 1){
        $fila = $resultado->fetch_assoc();
        //print_r($fila);
        setcookie('id_alumno', $fila['id'], time()+60*60*24*30);
        setcookie('clave_alumno', $fila['clave'], time()+60*60*24*30);
        setcookie('nombre', $fila['nombre'], time()+60*60*24*30);
        //para mas seguridad añadir un campo alfanumérico en la base de datos para validad al usuario.      
        header("Location: index.php");
        exit();
    } else {
        header("Location: index.php?error=fallaconsulta");
        exit();        
    }
} else {
    header("Location: index.php?error=fallapost");
    exit();
}