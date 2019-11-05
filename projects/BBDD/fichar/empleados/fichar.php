<?php
include_once './prohibir.php';
include '../includes/datos.php';

if(isset($_POST['tipo']) && ($_POST['tipo'] == 1 || $_POST['tipo'] == 2)){
    

    $query  = 'INSERT INTO fichas'
            . ' (tipo, empleado) '
            . 'VALUES '
            . '('.$_POST['tipo'].', '.$_SESSION['id_empleado'].')';
    if($mysqli->query($query)){
        header("Location: index.php");
        exit();           
    } else {
        header("Location: index.php?error=4");
        exit();           
    }
    
} else {
    header("Location: index.php?error=3");
    exit();    
}
