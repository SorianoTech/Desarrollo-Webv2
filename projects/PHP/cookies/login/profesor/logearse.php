<? 
//Página de control de acceso, contiene un formulario para loguearse.
 if(isset($_COOKIE['usuario'])){
     $contador = $_COOKIE['contador'];
     ++$contador;
     setcookie('contador', $contador, time()+60*60*24*25);
 }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Logearse</title>
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">        
        <style>
            body{
                font-family: 'Poppins', sans-serif;
            }
            form fieldset{
                width: 50%;
                margin: auto;
                padding: 10px;
                background-color: beige;
                border-radius: 5px;
                border: 1px bisque solid;
                margin-top: 15px;
                margin-bottom: 20px;
            }
            form fieldset legend{
                background-color: beige;
                border-radius: 5px;
                border: 1px bisque solid;
                padding: 5px;
                background-color: burlywood;
            }
            input{
                display: block;
                margin: 6px;
                padding: 3px;
            }
            
            
            .alert{
                width: 80%;
                border: 1px solid #EF2400;
                border-radius: 3px;
                background-color: #ffcccc;
                font-size: 1.5em;
                margin: auto;
                padding: 6px;
                font-family: 'Poppins', sans-serif;
                text-align: center;
                margin-top: 15px;
            }            
            
        </style>
    </head>
    <body>
        <? 
            $errores[1] = 'Se ha producido un error... vuelva a intentar';
            $errores[2] = 'Usuario y contraseña NO VÁLIDOS';
         if(!isset($_COOKIE['usuario']) && isset($_GET['error']) && $_GET['error'] > 0){
        ?>        
        <div class="alert">
            <i class="fas fa-exclamation-triangle"></i> <br>
            <? echo $errores[$_GET['error']]; ?>
        </div>
         <? } ?>
        
        <? 
         if(!isset($_COOKIE['usuario'])){
        ?>
        <form method="post" action="abrir-sesion.php">
            <fieldset>
                <legend>Entrada de usuarios:</legend>
                <input type="text" name="nombre" placeholder="Nombre" required="" minlength="3" maxlength="15">
                <input type="password" name="pass" placeholder="Pass" required="" minlength="3" maxlength="15">
                <input type="submit" value="ENTRAR">
            </fieldset>
        </form>
         <? } ?>
        
        
        <? 
         if(isset($_COOKIE['usuario'])){
        ?>
        <div>
            <a href="cerrar-sesion.php">Cerrar Sesión</a>
            <h3>Hola de nuevo nuestro amada/o: <? echo $_COOKIE['usuario']; ?> es un <? echo $_COOKIE['contador']; ?> visita</h3>
            Contenido premiun de pago, si no tienes dinero no entres esto es solo para la clase suprema tocada por los polvos de diossContenido premiun de pago, si no tienes dinero no entres esto es solo para la clase suprema tocada por los polvos de dioss
            Contenido premiun de pago, si no tienes dinero no entres esto es solo para la clase suprema tocada por los polvos de dioss
            Contenido premiun de pago, si no tienes dinero no entres esto es solo para la clase suprema tocada por los polvos de dioss
            Contenido premiun de pago, si no tienes dinero no entres esto es solo para la clase suprema tocada por los polvos de dioss
            Contenido premiun de pago, si no tienes dinero no entres esto es solo para la clase suprema tocada por los polvos de diossContenido premiun de pago, si no tienes dinero no entres esto es solo para la clase suprema tocada por los polvos de diossContenido premiun de pago, si no tienes dinero no entres esto es solo para la clase suprema tocada por los polvos de dioss
        </div>
         <? } ?>
    </body>
</html>
