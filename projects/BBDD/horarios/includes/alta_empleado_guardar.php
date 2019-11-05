<?php
include './datos.php';
include './prohibir.php';
//array para que funcione tanto en local como en la web de clase
$url_previa= array("http://localhost/desarrollo-web/desarrollo-web/proyecto_curso/projects/BBDD/horarios/pages/alta_empleado.php","http://35.180.100.249/~sergio/bbdd/horarios/pages/alta_empleado.php");

/*$stmt = $mysqli->prepare("INSERT INTO horarios_empleados (nombre, apellido, genero, telefono, mail, fecha_nacimiento, id_empresa , pass, dni ) VALUES (?,?,?,?,?,?,?,?,?)");

$stmt->bind_param("ssssssiss", $city);*/

if(isset($_POST['dni']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) && $_SERVER['HTTP_REFERER'] == $url_previa[0] || $_SERVER['HTTP_REFERER'] == $url_previa[1] ){
        $query = "INSERT INTO horarios_empleados (nombre, apellido, genero, telefono, mail, fecha_nacimiento, id_empresa , pass, dni ) VALUES ('".$_POST['nombre'] ."','".$_POST['apellido'] ."','".$_POST['genero'] ."','".$_POST['telefono'] ."','".$_POST['mail'] ."','".$_POST['fecha_nacimiento'] ."','".$id_empresa ."','".$_POST['pass'] ."','".$_POST['dni'] ."')";
       
    //Si la consulta funciona
    if($mysqli->query($query)){
        header("Location: ../pages/alta_empleado.php?ok=1");
        exit();
    } else {
        header("Location: ../pages/alta_empleado.php?error=2");
        exit();
        }
    } 
else {
    header("Location: ../pages/alta_empleado.php?error=1");
    exit();
}   

