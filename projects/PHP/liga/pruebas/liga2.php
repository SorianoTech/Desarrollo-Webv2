
<form method="post" action="liga2.php">
Seleccionar números de equipos: 
  <label for="num_equipos"></label>
  <input name="num_equipos" type="text" id="num_equipos" size="3" maxlength="2"><br /><br />
Nombre de la liga:  
    <input name="nombre_liga" type="text" id="nombre_liga"><br />
  <input type="submit" name="button" id="button" value="crear liga">
</form>
<?
$N = $_POST['num_equipos']; //ATENCIÓN!! "N" DEBE SER PAR! (2,4,8,12,20,...)

if ($N%2==0) {
	echo "Es par el número de equipos<br>";
} else {
	echo "El numero de equipos es impar<br>";
	$N = $N+1; // sumamos 1 al numero impar de equipos. A este equipo en un futuro lo podemos llamar descanso
}

//crea los grupos
for ($i = 0; $i<(($N-1)/2); $i++) { //Los partidos que jugaran seran la cantidad -1 porque el equipo no puede jugar contra si mismo y entre 2
//   g1.push([$i]);
   $g1[$i] = $i;
   //
//   g2.push([i]);
   $g2[$i] = $N-$i-1;
   }
//hace girar los grupos para el siguiente round
echo $_POST['nombre_liga']."<br>";
echo $_POST['num_equipos'],"<br>";

for ($j = 0; $j<$N-1; $j++) {//j son los rounds

   //anuncia los grupos
echo "<table><tr><td><b>Jornada ".$j."</b></td></tr> ";
echo "<tr><td>";
$conta=0;
foreach ($g1 as $equipo1) {
    
	echo "Valor actual de EQUIPO1: ".$equipo1."<BR>";
 	echo "Valor actual de EQUIPO2: ".$g2[$conta]."<BR>";
// crear registro de la jornada
echo "INSERT INTO liga (id, nombre_liga, jornada, equipo1, equipo2) VALUES ('', '".$_POST['nombre_liga']."', '".$j."','".$equipo1."','".$g2[$conta]."')";
 
 //-----------
$conta=$conta+1;
echo "<br><br><br>"; 
}
echo "</td></tr><tr><td>";
echo "</td></tr>";
// Calculamos la siguiente jornada
    $temp1 = $g2[0];
    $temp2 = $g1[($N/2)-1];

   for ($k = 0; $k<$N/2; $k++) {
      if ($k == ($N/2)-1) {
         $g1[1] = $temp1;
         $g2[($N/2)-1] = $temp2;
      } else {
         $g1[($N/2)-1-$k] = $g1[($N/2)-1-$k-1];
         $g2[$k] = $g2[$k+1];
      }
   }//-------------------
echo "</table>";
}
?>