<?php

include 'includes/db.php'; 


$query = "SELECT id_pregunta, texto, resp_1, resp_2, resp_3 FROM preguntas, respuestas where preguntas.id = respuestas.id_pregunta";
$resultado = $mysqli->query($query);
/*
foreach ($fila as $key => $value) {
    $$key = mysqli_real_escape_string($mysqli, $value);    
}*/
echo '<form>';
while ($fila = $resultado->fetch_assoc()) {
    echo '<h2>Pregunta con id'. $fila["id_pregunta"].'</h2>';
    echo '<h3>'.$fila['texto'].'</h3>';
    echo '<input type="radio" name="'.$fila["id_pregunta"].'" value='.$fila["id_pregunta"].'">1) '.$fila["resp_1"].'<br>';
    echo '<input type="radio" name="'.$fila["id_pregunta"].'" value='.$fila["id_pregunta"].'">2) '.$fila["resp_2"].'<br>';
    echo '<input type="radio" name="'.$fila["id_pregunta"].'" value='.$fila["id_pregunta"].'">3) '.$fila["resp_3"].'<br>';
}
echo '<input type="submit" value="Corregir">';
echo '</form>';
// Cerrar la conexión
//mysql_close($mysqli);

?>
