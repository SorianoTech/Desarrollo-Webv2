<?php
session_start();
$_SESSION['id_empleado'] = '';
$_SESSION['nombre_empleado'] = '';
unset($_SESSION['id_empleado']);
unset($_SESSION['nombre_empleado']);

header('Location: index.php');
exit();
?>
