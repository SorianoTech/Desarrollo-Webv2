<?php
//Creo una cookie que se llama aceptar con valor 1.
sleep(2);
//nombre cookie, valor, tiempo de expiracion
setcookie('aceptar', 1,time()+60);
header('Location: aviso.php');
exit;

?>