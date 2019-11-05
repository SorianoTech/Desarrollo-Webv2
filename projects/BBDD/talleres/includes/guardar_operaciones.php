<?php
include './prohibir.php';
include './datos.php';
sleep(3);
if(isset($_POST['operaciones']) && $_POST['vehiculo'] > 0){
    $query = "INSERT INTO historial (operaciones, vehiculo) VALUES ('" . $_POST['operaciones'] . "','" . $_POST['vehiculo'] . "')";
    //echo $query;
    if($mysqli->query($query)){
        $id_historial = $mysqli->insert_id;
        $query = "select * from historial where id = " . $id_historial;
        $resultado = $mysqli->query($query);
        $fila = $resultado->fetch_assoc();
        echo "<li><h3>".$fila['fecha']."</h3>";
        echo "<p>".$fila['operaciones']."</p></li>";        
    } else {
    
    }
} else {
    
}
