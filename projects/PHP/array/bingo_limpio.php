<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="main.css">
  <title>Bingo</title>
  <style>
    .celdas {
      width: 20%;
      float: left;
      text-align: center;
      margin-top: 6px;
      margin-bottom: 6px;
    }

    .carton {
      width: 35%;
      margin: auto;
      border: 4px #000000 double;
      margin-top: 15px;
    }

    .borrar {
      float: none;
      clear: both;
    }

    .betun {
      color: #EF2400;
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  <script>
    function marcar(carton, celda) {
      //alert(id);
      $('#celda_' + carton + '_' + celda).addClass('betun');
    }
  </script>


</head>

<body>

  <p>Juego de bingo, crear cartones de boletos aleatorios, le pido por pantalla cuantos cartones quiero y me los pinta. 5x5 y nos números no se pueden repetir.</p>

  <p>Crear 5 filas y 5 columnas</p>

  <form action="bingo_limpio.php" method="post">
    Introduce la cantidad de boletos que quieres imprimir:<br>
    <input type="text" name="cantidad" placeholder="Cantidad">
    <input type="submit" value="Imprimir">
  </form>

  <?
  include_once('../funciones/funciones.php');


  function crearArray_norep($cantidad, $a, $b) //crea x arrays con números no repetidos
  { //funcion para crear una array de valores aleatorios entre $a y 4b
    $array; //Creo una array con una cantidad de números aleatorios $cantidad y de números entre $a y $b.
    $numeros_sacados; //array espejo para quitar los números sacados
    $key = 0;
    for ($i = $a; $i <= $b; $i++) {
      $numeros_sacados[$key++] = $i;
    }
    for ($i = 0; $i < $cantidad; $i++) {
      $indice = rand(0, count($numeros_sacados) - $i - 1); //indice es igual a numero aletorio entre 0 y contador del array espejo menos el indice menos
      $array[$i] = $numeros_sacados[$indice];
      $numeros_sacados[$indice] = $numeros_sacados[count($numeros_sacados) - $i - 1];
      $numeros_sacados[count($numeros_sacados) - $i] = $array[$i];
    }
    return $array;
  }

  //CARTONES PROFESOR
  $cantidad_cartones = $_POST['cantidad'];
  for ($i = 0; $i < $cantidad_cartones; $i++) {
    echo '<div class="carton">';
    $carton = (burbuja(crearArray_norep(25, 1, 99)));
    for ($index = 0; $index < count($carton); $index++) {
      echo '<div  onclick="marcar(' . $i . ',' . $index . ')" id="celda_' . $i . '_' . $index . '"  class="celdas">' . $carton[$index] . '</div>';
    }
    echo '<div class="borrar"></div></div>';
  }
  ?>
</body>

</html>