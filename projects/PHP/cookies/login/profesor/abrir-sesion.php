<?php
//Página para realizar la validación de lo usuarios. Es llamada desde logearse.php
//base de datos de usuarios/as
$usuarios['alfonso'] = '123456';
$usuarios['david'] = '123456';
$usuarios['sergio'] = '123456';
$usuarios['raquel'] = '123456';
$usuarios['victor'] = '123456';

//Validamos que los input que vienen por $_POST no esten vacios
if(!empty($_POST['nombre']) && !empty($_POST['pass'])){
    //Validamos si los usuarios y las contraseñas son correctas
    if(isset($usuarios[$_POST['nombre']]) && ($usuarios[$_POST['nombre']] == $_POST['pass'])){
        //En caso de que sean correctas creamos cookies con el valor del nombre recibido por POST
        setcookie('usuario', $_POST['nombre'], time()+60*60*24*25);
        setcookie('contador', 1, time()+60*60*24*25);
        header('Location: logearse.php');
    } else {
        //En caso contrario redireccionamos con un codigo de error de 2
        header('Location: logearse.php?error=2');
    }
} else { //Si no recibo valor en los inputs,devuelvo otro valor de error (1). 
    header('Location: logearse.php?error=1');
}
exit();