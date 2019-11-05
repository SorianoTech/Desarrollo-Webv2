<?php
include '../../includes/datos.php';

if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) && isset($_POST['pass'])){

  $mail = mysqli_real_escape_string($mysqli, $_POST['mail']);
  $pass = mysqli_real_escape_string($mysqli, $_POST['pass']);

  $resultado = $mysqli->prepare("SELECT * FROM profesores WHERE mail = ? and pass = ? limit 1");

  $resultado->bind_param("ss",$mail,$pass);     
  $resultado->execute();
  $resultado = $resultado->get_result();

  if($resultado->num_rows == 1){
        $fila = $resultado->fetch_assoc();
        //print_r($fila);
        setcookie('id_profesor', $fila['id'], time()+60*60*24*30, '/');
        setcookie('nombre', $fila['nombre'], time()+60*60*24*30, '/');
        header("Location: ../pages/front_profesores.php");
        exit();
  } else {
        header("Location: index.php?error=1");
        exit();        
    }
} else {
    header("Location: ../index.php?error=2");
    exit();
}
?>