<?php
include_once './datos.php';

if(isset($_POST['id']) && $_POST['id'] > 0){
    $sql = "DELETE FROM alertas_alertas WHERE id = " . $_POST['id'];
    if($mysqli->query($sql)){
        $mysqli->close();
        header("Location: ../index.php?tab=0");
        exit();
    } 
}
header("Location: ../index.php?error=1");
exit();      
