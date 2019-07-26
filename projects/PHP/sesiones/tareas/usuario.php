<?php
    session_start();
    //Si existe la sesion, guardo el nombre para dar la vienvenida
    if(isset($_SESSION['logueado']) and $_SESSION['logueado']){
        $nombre = $_SESSION['nombre'];
    }else{
        //Si el usuario no está logueado redireccionamos al login.
        header('Location: index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> Página de bienvenida </title>
    </head>
    <body>
    <h1> Bienvenido/a <?php echo $nombre; ?> </h1>
    <!--APP Tareas-->
    <?include('tareas.php');?>

    
    </body>
</html>