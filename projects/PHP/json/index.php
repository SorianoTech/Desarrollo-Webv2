<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Prueba JSON</title>
</head>
<body>
  Hola
  <?php
  $json = file_get_contents("usuarios.json");
  $json= json_decode($json, true);
  echo '<pre>';
  print_r($json);
  echo '</pre>';
  echo '<ul>';
  foreach ($json['usuarios'] as $clave => $valor) {
    
    echo '<li>'.$valor['nombre'].'</li>';
  }
  ?>
  </ul>
  </body>
</html>