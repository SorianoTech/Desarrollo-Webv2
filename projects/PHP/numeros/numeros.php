<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Números</title>
  <style>
    .par{
      color: blue;
    }
    .impar{
      color: red;
    }
  </style>
</head>
<body>

  <div class="container">
  <h2>Diseñar una aplicación en PHP que me pinte en pantalla todos los números que le pase por un caja. Me tiene que pintar los pares en rojo y los impares en negro.</h2>

  <form method="post" action="numeros.php">
    <p>Introduce la cantidad de números que quieres que imprima</p><input type="number" name="numero" placeholder="1">
    <input type="submit" value="HAZLO!">
  </form>
  <?
  include_once '../funciones/funciones.php';
  $num = $_POST['numero'];
  $contador=1;

  while($contador<=$num){
      if(parimpar($contador)==2) //numero par
      {
        echo '<span class="par">'.$contador.'</span>-';
        $contador++;
      }else{ //par impar
        echo '<span class="impar">'.$contador.'</span>-';
        $contador++;
      }
    }
  ?>

  </div>
</section>

</body>
</html>