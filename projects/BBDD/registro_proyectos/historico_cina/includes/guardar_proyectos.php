<?php
include_once './datos.php';

if(isset($_POST['proyecto'])){
    $nombre = mysqli_real_escape_string($mysqli, $_POST['proyecto'] );
    
    $sql = "INSERT INTO alertas_proyectos (proyecto) VALUES ('" . $nombre . "')";
    if($mysqli->query($sql)){
        $sql = "select * from alertas_proyectos where id = " . $mysqli->insert_id;
        $resultado = $mysqli->query($sql);
        $fila = $resultado->fetch_assoc();
        $mysqli->close();
    } 
}     
echo '<li class = "amarillo">' . $fila["proyecto"] . '</li>';
