<?php
include_once ('./prohibir.php');
include_once ('../includes/datos.php');

if (isset($_POST['materia']) && isset($_POST['horario']) && isset($_POST['comentarios'])) {
    $resultado = $mysqli->prepare("SELECT id from alumnos where id = ? and clave = ?" );
    $resultado->bind_param("is", $id_alumno, $_COOKIE['clave_alumno']);
    $resultado->execute();
    $resultado = $resultado->get_result();
    if ($resultado->num_rows == 1) {    
        $resultado = $mysqli->prepare("INSERT INTO horarios_alumnos (horario, alumno, materia, comentario) VALUES (?,?,?,?)" );
        $resultado->bind_param("iiis", $_POST['horario'], $_COOKIE['id_alumno'], $_POST['materia'], $_POST['comentarios']);
        if($resultado->execute()){
            echo 'OK';
        } else {
            echo 'Se ha producido un error';
        }
    } else {
        echo "No eres quien dices ser...";
    }
} else {
    echo "Error...";
}
?>


