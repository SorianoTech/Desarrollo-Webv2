<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Asterisco Rombo</title>
  <style>
    body{
      width:20%;
      margin:auto;
      margin-top:100px;
    }
    
    
  </style>
</head>
<body>
 <form action="asterisco_rombo.php" method="post" accept-charset="utf-8">
    <input type="number" placeholder="Numero" name="numero">
    <input type="submit" value="Enviar">
  </form>
<?php
  $can = $_POST['numero'];
        $filas = 1;
        $columnas = 1;
        echo '<div>';
        while ($filas <= (($can * 2) - 1)) { //recorro las filas y multiplico x2 para hacer la parte de arriba y la de abajo, al tener 5 filas y ser un rombo, debe tener 10 filas para ser simetrico, resto 1 por que empezamos desde 0.
            while ($columnas <= $can) { //mientras que las columnas sean menor que la cantidad de columnas que hemos introducido....
                if ($filas <= $can) {//preguntamos... si las filas son menor o igual que la cantidad de filas que queremos
                    if ($columnas <= ($can - $filas)) {//preguntamos... si las columnas es menor que la cantidad menos las filas. imprimimos espacio.
                        echo '&nbsp';
                    } else {
                        echo '*';
                    }
                }
                if ($filas > $can) {
                    if ($columnas <= ($filas - $can)) {
                        echo '&nbsp';
                    } else {
                        echo '*';
                    }
                }
                ++$columnas;
            }
            $columnas = 1; //vuelvo a inicializar las columnas
            echo '<br>';
            ++$filas;
        }
        echo '</div>';
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