<?php
if(isset($_POST['enviar'])) {
  $titulo = $_POST['tarea'];
  $fichero = fopen("listado.txt", "a+");
  fwrite($fichero, $titulo.PHP_EOL);
  fclose($fichero);
  header('Location: usuario.php');
  exit;
}
?>