<?php
  $key = $_GET['key'];
  $lista = file("listado.txt");
  
  //Elimino el valor pasado por GET
  unset($lista[$key]);
  
  $fichero = fopen("listado.txt", "w");

  foreach ($lista as $key => $value) {
    fwrite($fichero, $value);
  }
  fclose($fichero);
  header('Location: usuario.php');
  exit;
  
  
  //$fichero = fopen("listado.txt", "w+");
 


  /*foreach ($resultado as $n => $line) {
    //Si encuetro la key
    if($key=$n){
      echo 'Paso';
    }else{
      
      echo  $line; 
      //fwrite($fichero, $line.PHP_EOL);
    }
  }*/

  //fclose($fichero);

  //fwrite($fichero, $titulo.PHP_EOL);
  //fclose($fichero);
  //header('Location: usuario.php');
  //exit;

?>