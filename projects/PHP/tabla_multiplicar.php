<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Variables</title>
</head>
<body>
  
<?php
//Tabla de multiplicar en PHP
//http://localhost/desarrollo-web/desarrollo-web/proyecto_curso/projects/PHP/index.php?num=8
echo "Escribe index.php?num=8 al  final de la URL para que aparezca la tabla de multiplicar del 8";
echo '<p>Dato recibido por GET (variable num) es igual a: '.$_GET['num'].'</p>';
$number = $_GET['num'];
echo '<p>La variable number es igual a: '.$number. '</p>';
echo '<p>Tabla de multiplicar de: ' . $number. '</p>';

//Inicializamos el multiplicador
$multiplicador=1;

echo "<p>".$number." x ".$multiplicador." = ".$number * $multiplicador."</p>";
$multiplicador++;
echo "<p>".$number." x ".$multiplicador." = ".$number * $multiplicador."</p>";
$multiplicador++;
echo "<p>".$number." x ".$multiplicador." = ".$number * $multiplicador."</p>";
$multiplicador++;
echo "<p>".$number." x ".$multiplicador." = ".$number * $multiplicador."</p>";
$multiplicador++;
echo "<p>".$number." x ".$multiplicador." = ".$number * $multiplicador."</p>";
$multiplicador++;
echo "<p>".$number." x ".$multiplicador." = ".$number * $multiplicador."</p>";
$multiplicador++;
echo "<p>".$number." x ".$multiplicador." = ".$number * $multiplicador."</p>";
$multiplicador++;
echo "<p>".$number." x ".$multiplicador." = ".$number * $multiplicador."</p>";
$multiplicador++;
echo "<p>".$number." x ".$multiplicador." = ".$number * $multiplicador."</p>";
$multiplicador++;
echo "<p>".$number." x ".$multiplicador." = ".$number * $multiplicador."</p>";
$multiplicador++;

?>

<hr/>
<p>Cambiar valores de variables</p>

<?php
$a = 5;
$b = 8;
echo '<p>El valor de la variable A es :' .$a.' </p>';
echo '<p>El valor de la variable B es :' .$b.' </p>';
$a = $a+$b;
$b = $a-$b;
$a = $a-$b;
echo '<p>El valor de la variable A ahora es :'.$a.'</p>';
echo '<p>El valor de la variable B ahora es :' .$b.' </p>';
?>

</body>
</html>