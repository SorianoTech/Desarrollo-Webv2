

<?

include_once './roundrobin.php';

//$partido[$jornada][$partido][$equipo] = Real Madrid;
$equipos=['Real Madrid','Barcelona','Atletic'];

$rounds = roundRobin($equipos);

$table = "<table>\n";
foreach($rounds as $round => $games){
    $table .= "<tr><th>Round: ".($round+1)."</th><th></th><th>Fuera de Casa</th></tr>\n";
    foreach($games as $play){
       $table .= "<tr><td>".$play["Home"]."</td><td>-v-</td><td>".$play["Away"]."</td></tr>\n";
    }
}
$table .= "</table>\n";

echo $table;

/*
echo '<pre>';
print_r($equipos);
echo '</pre>';

for ($j=0; $j <$jornadas ; $j++) { 
   //meto el numero de las jornadas
  for ($p=0; $p <$partidos_jornada; $p++) { 
    //$partido[$j][$p]=$p; //guardo los partidos
    for ($i=0;$i<=1;$i++) { 
      echo $j;
      echo $p;
      echo $i;
      echo '<br>';
      $partido[$j][$p][$i]=$i;
    }
  }
}

echo 'Array Partido';
echo '<pre>';
print_r($partido);
echo '</pre>';
*/
?>
