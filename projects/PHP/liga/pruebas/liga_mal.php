<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Liga</title>
</head>

<body style="background-color: #00a0af ;color:white">
  <div class="container" style="background: #0079c1">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h1>LIGA</h1>
        <!--FORMULARIO PARA SOLICITAR LOS EQUIPOS-->
        <h3>Introduzca el número de equipos</h3>
        <form action=" liga.php" method="post">
          <input type="number" name="cantidad" placeholder="Cantidad de equipos">
          <input type="submit" value="Mostrar" class="btn btn-primary">
        </form>

        <?
        //Validamos que recibimos datos del formulario
        if(!empty($_POST['cantidad'])){ 
          $cantidad = $_POST['cantidad'];
          if ($cantidad%2==0) {
            echo "Es par el número de equipos<br>";
          } else {
            echo "El numero de equipos es impar<br>";
            $cantidad = $cantidad+1;} // sumamos 1 al numero impar de equipos. A este equipo loa llamaremos descanso
          echo '<p>Introduzca el nombre de los participantes</p>';
          echo '<form action="liga.php" method="post">';
            //Generamos tantos input como cantidad introducida de participantes
            for ($i=1; $i <=$_POST['cantidad'] ; $i++) {
                echo '<input type="text" name="equipo[]" placeholder="Equipo '.$i.'"><br>'; 
            }
            echo '<input type="submit" value="Mostrar Partidos">';
          echo '</form>';
        }

//$_POST es una array. Puedo recorrer cada array llamando a la array concreta array['nombres']
if(!empty($_POST['equipo'])){ 
  //Guardo los equipos en la array nombres
  $nombres=($_POST['equipo']);

  $partidos = array();

//Recorro la array de nombres con cada equipo
foreach($nombres as $equipo){
  //Recorro de nuevo nombres con contrincante
	foreach($nombres as $contrincante){
    //Si el valor de equipo es igual al de contrincante sigue, sino saldrá del foreach
		/*if($equipo == $contrincante){
			continue;
    }*/
    //Crea una array con el equipo y el contrincante.
		$z = array($equipo,$contrincante);
    sort($z);
    //Creo la array match con los valores ordenados de z con los equipos y los contrincantes
		if(!in_array($z,$partidos)){
			$partidos[] = $z;
		}
	}
}

//Muestro la array $partidos para ver si están correctamente guardados los valores
echo '<pre>';
print_r($partidos);
echo '</pre>';

//Ejemplo de imprimir los elemenos de la array con un for y un for each.
echo '<h2>Imprime con for + for each</h2>';
for ($i=0; $i <count($partidos) ; $i++) {
  foreach ($partidos[$i] as $key => $value) {
    echo $value;
  }
   echo '<br>';
}

//Ejemplo de muestra todos los partidos utilizando foreach
// Recorro los partidos y las claves de cada uno de ellos
echo '<h2>Imprime con for each</h2>';
 foreach($partidos as $key=>$part)
 	{
     //Imprimo los partidos y añado uno a key para que no se muestre el partido 0
   echo 'Partido '.++$key.': ';
   //recorro la array part que contiene los equipos e imprimo los equipos y luego un salto de línea
 	foreach($part as $equip)
 		{
 		echo $equip ." ";
 		}
 	echo "<br>";
   }
  }
?>
      </div>
    </div>
  </div>
</body>
</html>