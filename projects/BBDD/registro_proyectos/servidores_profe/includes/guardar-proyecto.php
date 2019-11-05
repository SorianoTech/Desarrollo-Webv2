<?php
/*
Recibir por post el nombre del proyecto y guardarlo, si lo guarda nos devuelve la nueva lista de proyectos y 
 * si no un mensaje de error
*/
include_once './datos.php';

$proyecto = $mysqli->real_escape_string($_POST['nombre']);

$sql = "INSERT INTO proyectos (proyecto) VALUES ('".$proyecto."')";

if($mysqli->query($sql)){
    echo "<option value='".$mysqli->insert_id."'>".$proyecto."</option>";
} else {
    echo "1";
}



?>