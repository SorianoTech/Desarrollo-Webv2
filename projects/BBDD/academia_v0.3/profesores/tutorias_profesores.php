<?php
session_start();

function validateDate($date, $format = 'Y-m-d H:i:s') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

if(isset($_SESSION['idprofesor'])){
    include_once '../includes/datos.php';
    if (isset($_POST['fecha']) && isset($_POST['hora']) && validateDate($_POST['fecha'], 'Y-m-d') && filter_var($_POST['hora'], FILTER_VALIDATE_INT)){  
        $sql = "INSERT INTO horarios (fecha, hora, profesor) VALUES ('" .$_POST['fecha']. "', " .$_POST['hora']. ", " .$_SESSION['idprofesor']. ")";
        echo $sql;
        if ($mysqli->query($sql)){
            header("Location: index.php");
            exit();
        } else {
            header("Location: index.php?error=2");
            exit();
        }
    }
    
} else {
    header("Location: index.php?error=3");
    exit();
}
    

