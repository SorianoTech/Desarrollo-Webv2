<?php
if(!empty($_POST['tarea'])) {
  $titulo = $_POST['tarea'];
  $fichero = fopen("listado.txt", "a+");
  fwrite($fichero, $titulo.PHP_EOL);
  fclose($fichero);
  header('Location: usuario.php');
  exit;
}else{
  header('Location: usuario.php');
  exit;
}
?>