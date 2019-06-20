<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Días entre dos fechas</title>

  <form method="post" action="fecha_funciones.php">
    <input type="number" maxlength="2" minlength="1" min="1" max="31" name="dia" placeholder="DIA">
    <input type="number" maxlength="2" minlength="1" min="1" max="12" name="mes" placeholder="MES">
    <input type="number" maxlength="4" minlength="1" min="1" name="ano" placeholder="AÑO">
    |
    <input type="number" maxlength="2" minlength="1" min="1" max="31" name="dia2" placeholder="DIA">
    <input type="number" maxlength="2" minlength="1" min="1" max="12" name="mes2" placeholder="MES">
    <input type="number" maxlength="4" minlength="1" min="1" name="ano2" placeholder="AÑO">
    <input type="submit" value="CALCULAR DÍA">  
  </form>
  <?php
    include_once '../funciones/funciones.php';
    $dias = calcular_dias($_POST['dia2'],$_POST['mes2'],$_POST['ano2']);
    $dias -= calcular_dias($_POST['dia'],$_POST['mes'],$_POST['ano']); //restamos el valor anterior al nuevo introducido
    echo '<h1>'.$dias.'</h1>';
  ?>
  
</head>
<body>
  
</body>
</html>