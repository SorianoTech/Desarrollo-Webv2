<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bingo</title>
</head>
<body>
  
<p>Juego de bingo, crear cartones de boletos aleatorios, le pido por pantalla cuantos cartones quiero y me los pinta. 4x4 y nos números no se pueden repetir.</p>

<p>Crear 4 filas y 4 columnas</p>

<form action="bingo.php" method="post">
  Introduce la cantidad de boletos que quieres imprimir:<br>
  <input type="text" name="cantidad" placeholder="Cantidad">
</form>

<?
$vector; //Creo 10 arrays de 10 valores
for($filas=0;$filas<5;$filas++){
  for($columnas=0;$columnas<5;$columnas++){
    $vector[$filas][$columnas]=rand(0,25);
  }
}

echo '<pre>'; print_r($vector); echo '</pre>';
/*foreach($filas as $clave => $valor){
    echo 'Elemento de la array['.$clave.']:'.$valor.'<br>';
  }*/


for ($i=0; $i < count($vector); $i++) { 
  echo $vector[$i];
}

?>
</body>
</html>

