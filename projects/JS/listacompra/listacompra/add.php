<?php
include_once "./datos.php";
$producto = $_POST['producto'];
$query = "INSERT INTO listadelacomprar (producto) VALUES ('".$producto."')";
if($mysqli->query($query)){
    echo $mysqli->insert_id;
} else {
    echo -1; //json
}