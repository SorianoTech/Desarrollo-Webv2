<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Encriptado</title>
</head>

<body>
  <?php
  $texto = 'La tecnología informática está a punto de proveer a los individuos y grupos la habilidad de comunicarse e interactuar entre ellos de una manera totalmente anónima. Dos personas podrán intercambiar mensajes, gestionar negocios y negociar contratos electrónicos sin tan siquiera saber el nombre real, identidad legal, u otra, del otro. Las interacciones a través de las redes serán ilocalizables, a través de extensivos re-ruteos de paquetes encriptados y a prueba de alteraciones de terceros que implementarán protocolos criptográficos que aseguren casi perfectamente contra interferencias. La reputación será de una importancia primordial, mucho más importante en los tratos que incluso los índices de crédito de hoy en día. Estos desarrollos alterarán por completo la naturaleza del la regulación gubernamental, la habilidad para añadir impuestos y controlar las interacciones económicas, la habilidad para mantener la información en secreto, e incluso alterará la naturaleza de la confianza y reputación.';
  //$text = utf8_encode($texto);
  $long = strlen($texto);
  echo $long . '<br>';
  $array;
  $key = 0;

  //Intercambiamos las a por las b
  /*for ($i = 0; $i < $long; $i++) {
    if ($texto[$i] == 'a') {
      $texto[$i] = 'b';
      //echo $texto[$i];
    }
    echo $texto[$i];
  }
  echo '<hr>';/*/

  //Intercambiamos las letras desdes la ultima posición a la primera.
  ?>
   <form action="encriptado.php" method="post" accept-charset="utf-8">
    <input type="text" placeholder="Texto" name="texto" style="width:50%;height:55px">
    <input type="submit" value="Enviar">
  </form>
  <?
 
  for ($i = $long - 1; $i >= 0; $i--) { //tenemos que dar long -1 por que la array empieza por 0 y tiene un número menos, contariamos 130 letras, pero la array tiene desde la posicion 0 a la 129.
    $array[$key++] = $texto[$i];
    echo $array[$key - 1]; //como la array empieza por 0 y le sumamos uno a key arriba tenemos que imprimir el valor anterior sino estara descompensado.
  }
  echo '<br>';
  echo '<h1>Desencriptar</h1>';
  $desencriptar= $_POST['texto'];
  $long2 = strlen($desencriptar);
  $clave=0;
  for ($i = 0; $i <= $long2; $i++) {
    $array2[$clave++] = $texto[$i];
    echo $array[$clave - 1];
  }
  ?>


</body>

</html>