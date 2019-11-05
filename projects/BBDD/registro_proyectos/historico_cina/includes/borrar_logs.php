<?php
include_once './datos.php';

//if(isset($_POST['id']) && $_POST['id'] > 0){
//    $sql = "DELETE FROM alertas_logs WHERE id = " . $_POST['id'];
//    if($mysqli->query($sql)){
//        $mysqli->close();
//        header("Location: ../index.php?tab=2");
//        exit();
//    } 
//}
//header("Location: ../index.php?error=1");
//exit();      



$id = $mysqli->real_escape_string($_POST['id']);
$resultado = $mysqli->prepare("delete from alertas_logs where id = ?");
$resultado->bind_param("i", $id);

if($resultado->execute()){
    echo "2";
} else {
    echo "1";
}
