<?php
    session_start();
    $usuarios = array(
        array('nombre' => 'sergio', 'contrasena' => '1234'),
        array('nombre' => 'victor', 'contrasena' => '1234'),
        array('nombre' => 'david', 'contrasena' => '1234')
    );
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['nombre'];
        $contrasena = $_POST['contrasena'];
        //Creamos una variable para verificar si el usuario con ese nombre y contraseña existe.
        $usuario_encontrado = false;
        foreach($usuarios as $item){
            //Si encuentra al usuario con ese nombre y contraseña a la variable $usuario_encontrado a true y rompe el bucle para no seguir buscando.
            if($nombre == $item['nombre'] and $contrasena == $item['contrasena']){
                $usuario_encontrado = true;
                break;
            }
        }
        //Verifica si dentro del bucle se ha encontrado el usuario.
        if($usuario_encontrado){
            $_SESSION['logueado'] = true;
            $_SESSION['nombre'] = $nombre;
            header('Location: usuario.php');
            exit;
        }else{
            $error_login = true;
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css"><script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
        <title> Logueo </title>
    </head>
    <body>
        <?php if(isset($error_login)): ?>
            <span style="color: #f00;"> El usuario o la contraseña son incorrectos. </span>
        <?php endif; ?>
        <!--<form method="post" action="index.php">
            <label for="nombre"> Nombre </label>
            <input type="text" name="nombre" id="nombre" required="required" />
            <label for="contrasena"> Contraseña </label>
            <input type="password" name="contrasena" id="contrasena" required="required" />
            <input type="submit" value="Enviar" />
        </form>-->
        <div class="container" onclick="onclick">
            <div class="top"></div>
            <div class="bottom"></div>
            <div class="center">
            <h2>Acceso</h2>
            <form method="post" action="index.php">
            <input type="text" name="nombre" id="nombre" placeholder="Usuario" required="required" >
            <input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" required="required" >
            <input type="submit" value="Enviar" />
                <h2>&nbsp;</h2>
            </form>
    </div>
  </div>


    </body>
</html>