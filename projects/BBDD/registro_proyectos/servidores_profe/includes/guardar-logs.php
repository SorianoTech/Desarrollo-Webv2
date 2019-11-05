<?php
/*
Recibir por post el nombre del proyecto y guardarlo, si lo guarda nos devuelve la nueva lista de proyectos y 
 * si no un mensaje de error
*/
include_once './datos.php';

$proyecto = $mysqli->real_escape_string($_POST['proyecto']);
$log = $mysqli->real_escape_string($_POST['log']);

$sql = "INSERT INTO logs (log, proyecto) VALUES ('".$log."','".$proyecto."')";

if($mysqli->query($sql)){
    echo "<tr><td>Ahora Mismo</td><td>".$log."</td></tr>";
} else {
    echo "1";
}
?>