<?php
session_start();
include '../includes/datos.php';

//filtramos todo lo que podemos y más
if(isset($_POST['mail']) && isset($_POST['pass']) &&  filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
    $pass = mysqli_real_escape_string($mysqli, $_POST['pass']);
    
    $query = "SELECT *  FROM empleados WHERE pass = '".$_POST['pass']."' AND mail = '".$_POST['mail']."' limit 1";
    echo $query;
    $resultado = $mysqli->query($query);
    
    
/*    
    $resultado = $mysqli->prepare("SELECT *  FROM empresas WHERE pass = ? AND mail = ? limit 1");
    $resultado->bind_param("ss", $_POST['mail'], $pass);     
    $resultado->execute();
    $resultado = $resultado->get_result();    
*/    
    
    
    
    //echo serialize($resultado);
    if($resultado->num_rows == 1){
        $fila = $resultado->fetch_assoc();
        $_SESSION['id_empleado'] = $fila['id'];
        $_SESSION['nombre_empleado'] = $fila['nombre'];
        header("Location: index.php");
        exit();        
    } else {
        header("Location: index.php?error=2");
        exit();
    }
} else {
    header("Location: index.php?error=1");
    exit();
}




