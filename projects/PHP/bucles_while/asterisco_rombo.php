<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Asterisco Rombo</title>
</head>
<body>
<?php



  $filas=20; //numero de filas que quiero imprimir
  $con_filas=0;//Contador de filas
  $con_col=0; //contador de columnas
  /*while($con_filas<=$n){
    $con_filas++;
    $con_col=0;
    while($con_col<=$con_filas){
      $con_col++;
      echo ' &nbsp ';
    }
    echo '<br/>';
    }*/


  while($con_filas<=$filas){
    $con_col=0; //reseteamos el contador para que imprima columnas hasta que con_filas sea igual 
    
    while($con_col<=$con_filas){
      if((($con_col==($con_filas/2)) || ($con_filas==$filas))){
      echo '*';
      $con_col++;
      }else{
        echo '&nbsp';
    }
    $con_filas++;
    echo '<br/>';
  }

    //Inversa desde con_filas hasta 0
    while($con_filas>=0){
      $con_col=0; //reseteamos el contador
      while($con_col<=$con_filas){
        $con_col++;
        echo '*';
      }
      $con_filas--; //las filas se van restando
      echo '<br/>';
    }
?>

  <?
  //Con bucles for
  /*
  for($i=1; $i<=$n; $i++) (while $i <=$n echo $++)
  {
    for($j=1; $j<=$i; $j++)
    {
      echo ' * ';
    }
    echo '\n';
  }
  for($i=$n; $i>=1; $i--)
  {
    for($j=1; $j<=$i; $j++)
    {
      echo ' * ';
    }
    echo '\n ';
  }*/
  ?>


</body>
</html>