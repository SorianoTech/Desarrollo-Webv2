<?php 
include_once './datos.php';

if(isset($_POST['id']) && $_POST['id'] > 0){
    $sql = "DELETE FROM alertas_alertas, alertas_logs, alertas_proyectos WHERE alertas_alertas.proyecto = " . $_POST['id'] . " OR alertas_logs.proyecto = " . $_POST['id'] . " OR alertas_proyectos.id = " . $_POST['id'];
    if($mysqli->query($sql)){
        $mysqli->close();
        header("Location: ../index.php?tab=1");
        exit();
    } 
}
header("Location: ../index.php?error=1");
exit();      
