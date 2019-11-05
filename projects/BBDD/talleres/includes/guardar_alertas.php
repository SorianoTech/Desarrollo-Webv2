<?php
include './prohibir.php';
include './datos.php';
sleep(3);
if(isset($_POST['alerta']) && $_POST['vehiculo'] > 0){
    $query = "INSERT INTO alertas (alerta, vehiculo, fecha_alerta) VALUES ('" . $_POST['alerta'] . "','" . $_POST['vehiculo'] . "','" . $_POST['fecha_alerta'] . "')";
    //echo $query;
    if($mysqli->query($query)){
        $id_alerta = $mysqli->insert_id;
        $query = "select * from alertas where id = " . $id_alerta;
        $resultado = $mysqli->query($query);
        $fila = $resultado->fetch_assoc();
        echo "<li><h3>".$fila['fecha_alerta']."</h3>";
        echo "<p>".$fila['alerta']."</p></li>";        
    } else {
    
    }
} else {
    
}
