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
  if((count($_POST['equipo'])%2)!=0){
    //Añado descanso al final de la array de equipos
    $_POST['equipo'][]= 'Descanso';
  }

  $equipos=($_POST['equipo']);
  $num_equipos=count(($_POST['equipo']));
  $jornadas= count($equipos)-1;
  $partidos = count($equipos)/2;
   
  //Creo los grupos
  for ($i = 0; $i<(($num_equipos-1)/2); $i++) { // encaso de ser 6 irá hasta i=2,5 hará 0-1 y 2
    $g1[$i] = $equipos[$i];
    $g2[$i] = $equipos[$num_equipos-$i-1];//En este grupo mete la otra mitad empezando desde el final
  }
 
  for ($j = 1; $j<=$num_equipos-1; $j++) {//j son las jornadas, que serán el num_equipos -1

   //anuncia los grupos
    echo '<table><tr><td><b>Jornada '.$j.'</b></td></tr> ';
    echo '<tr><td>';
    $conta=0;
    
    foreach ($g1 as $equipo1) {
    echo 'EQUIPO: '.$equipo1.'<BR>'; //cogera el primer equipo del grupo 1
    echo 'EQUIPO: '.$g2[$conta].'<BR>'; //contre el primer equipo del grupo 2
 
    //-----------
    $conta=$conta+1; //sumo uno a contador para seleccionar la posicion 2 del grupo 2
    echo '<br>'; 
    }
    echo '</td></tr><tr><td>';
    echo '</td></tr>';
    // Calculamos la siguiente jornada
        $temp1 = $g2[0];
        $temp2 = $g1[($num_equipos/2)-1];

      for ($k = 0; $k<$num_equipos/2; $k++) {
          if ($k == ($num_equipos/2)-1) {
            $g1[1] = $temp1;
            $g2[($num_equipos/2)-1] = $temp2;
          } else {
            $g1[($num_equipos/2)-1-$k] = $g1[($num_equipos/2)-1-$k-1];
            $g2[$k] = $g2[$k+1];
          }
      }//-------------------
    echo '</table>';
    }
}
?>
      </div>
    </div>
  </div>
</body>
</html>