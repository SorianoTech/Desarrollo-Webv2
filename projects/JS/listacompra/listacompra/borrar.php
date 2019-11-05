<?php
include_once "./datos.php";
$id = $_POST['claveId'];
$query = "delete from listadelacomprar where id = " . $id;
if($mysqli->query($query)){
    echo 1;
} else {
    echo 2; //json
}