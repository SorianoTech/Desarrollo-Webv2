<?php

include_once ('./prohibir.php');
include_once ('../includes/datos.php');

if ($_POST['materia'] && $_POST['materia'] > 0) {

    $resultado = $mysqli->prepare("SELECT  profesores.nombre, profesores.id, DATE_FORMAT(horarios.fecha, '%d-%b-%Y') as fecha, horarios.hora, horarios.id as id_tutoria FROM 	profesores, horarios, profesores_materias WHERE 	profesores.id = horarios.profesor    AND    profesores.id = profesores_materias.profesor     AND     profesores_materias.materia = ? ORDER by fecha ASC, horarios.hora ASC");
    $resultado->bind_param("i", $_POST['materia']);
    $resultado->execute();
    $resultado = $resultado->get_result();
    if ($resultado->num_rows >= 1) {
        echo "<table><tr><th>Profesor</th><th>Fecha</th><th>Hora</th><th></th></tr>";
        
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr><td>".$fila['nombre']."</td><td>".$fila['fecha']."</td><td>".$fila['hora']."</td><td><button onclick=\"pedir_tutoria(".$fila['id_tutoria'].")\">Pedir Tutoria</button></td></tr>";
            
        }
        echo "</table>";
    } else {
        echo "No tenemos tutorías disponibles";
    }
} else {
    echo "Error...";
    
}
?>


