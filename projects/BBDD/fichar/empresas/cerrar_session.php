<?php
session_start();
$_SESSION['id_empresa'] = '';
$_SESSION['nombre_empresa'] = '';
unset($_SESSION['id_empresa']);
unset($_SESSION['nombre_empresa']);

header('Location: index.php');
exit();
?>
