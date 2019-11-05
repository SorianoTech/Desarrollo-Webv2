<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        
        echo password_hash("botella", PASSWORD_DEFAULT)."<br>";
        // Ver el ejemplo de password_hash() para ver de dónde viene este hash.
        //Guardamos el password recibido por post haseado en una variable
        $password = password_hash('botella',PASSWORD_DEFAULT);
        echo $password;
        $hash = '$2y$10$dJOtz1Ka4i2JOG2ppVQw2OdML3.AXrHfZGas9IU6t8a5.4ke4shfC';

        
        //Podemos comprobar sin ver los datos cambiado botella por $_POST
        //Comprobamos el password metido por post con el hash que tenemos guardado en nuestr base de datos.
        //COnsulta para extrar el hash de la base de datos $fila['hash'];
        if (password_verify('botella', $hash)) {
            echo '¡La contraseña es válida!';
        } else {
            echo 'La contraseña no es válida.';
        }
        
        
        //Modo con bases de datos
        /*
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        //De este modo nunca vemos el password del usuario y podemos comprobarlo con los valores de la base de datos.
        if (password_verify($_POST['password'], $fila['hash'])) {
            echo '¡La contraseña es válida!';
        } else {
            echo 'La contraseña no es válida.';
        }
        test(cambia)*/
        
        ?>
        
    </body>
</html>
