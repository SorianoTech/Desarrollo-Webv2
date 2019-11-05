<?php
include '../../includes/datos.php';

if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) && isset($_POST['pass'])){

  $pass = mysqli_real_escape_string($mysqli, $_POST['pass']);

  $resultado = $mysqli->prepare("SELECT id, nombre, id_empresa FROM horarios_empleados WHERE mail = ? and pass = ? limit 1");
  $resultado->bind_param("ss", $_POST['mail'],$pass);     
  $resultado->execute();
  $resultado = $resultado->get_result();
    
  if($resultado->num_rows == 1){

        $fila = $resultado->fetch_assoc();
        //print_r($fila);
        setcookie('id', $fila['id'], time()+60*60*24*30, '/');
        setcookie('empleado', $fila['nombre'], time()+60*60*24*30, '/');
        setcookie('empresa', $fila['id_empresa'], time()+60*60*24*30, '/');
        header("Location: ../pages/fichar.php");
        exit();
  } else {
        header("Location: ../index.php?error=1");
        exit();        
    }
} else {
    header("Location: ../index.php?error=2");
    exit();
}
?>

