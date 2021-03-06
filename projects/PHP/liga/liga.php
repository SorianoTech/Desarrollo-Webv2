<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <title>Liga</title>
</head>

<body style="background-color: #00a0af ;color:white">
  <div class="container" style="background: #0079c1">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h1>LIGA</h1>
        <!--FORMULARIO PARA SOLICITAR LOS EQUIPOS-->
        <h3>Introduzca el número de equipos</h3>
        <form action="liga.php" method="post">
          <input type="number" name="cantidad" placeholder="Cantidad de equipos">
          <input type="submit" value="Mostrar" class="btn btn-primary">
        </form>

        <?
        include_once './roundrobin.php';

        //Validamos que recibimos datos del formulario
        if(!empty($_POST['cantidad'])){ 
          $cantidad = $_POST['cantidad'];
          if ($cantidad%2==0) {
            echo 'Es par el número de equipos<br>';
          } else {
            echo 'El numero de equipos es impar<br>';
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
  //cuento los equipos para saber si tengo que añadir a descanso
  $equipos=$_POST['equipo'];
  $rounds = roundRobin($equipos);

  $table = "<table>\n";
  
  foreach($rounds as $round => $games){
      $table .= "<tr><th>Jornada: ".($round+1)."</th><th></th><th>Fuera de Casa</th></tr>\n";
      foreach($games as $play){
        $table .= "<tr><td>".$play["Home"]."</td><td>VS</td><td>".$play["Away"]."</td></tr>\n";
      }
  }
  $table .= "</table>\n";

  echo $table;
}
?>
      </div>
    </div>
  </div>
</body>
</html>