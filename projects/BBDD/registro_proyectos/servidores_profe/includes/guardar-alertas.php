<?php
/*
Recibir por post el nombre del proyecto y guardarlo, si lo guarda nos devuelve la nueva lista de proyectos y 
 * si no un mensaje de error
*/
include_once './datos.php';

$proyecto = $mysqli->real_escape_string($_POST['proyecto']);
$alerta = $mysqli->real_escape_string($_POST['alerta']);
$fecha = $mysqli->real_escape_string($_POST['fecha']);

$sql = "INSERT INTO alertas (alerta, proyecto, fecha) VALUES ('".$alerta."','".$proyecto."','".$fecha."')";

if($mysqli->query($sql)){
    echo "<tr id=\"alerta_proyectos_". $mysqli->insert_id ."\"><td>Ahora Mismo</td><td>".$alerta."</td><td><i class=\"fas fa-trash-alt dedo\" onclick=\"borraralerta(". $mysqli->insert_id .")\"></i></td></tr>";
} else {
    echo "1";
}
?>