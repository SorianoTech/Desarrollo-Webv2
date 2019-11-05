<?php
include_once './datos.php';

function validateDate($date, $format = 'Y-m-d H:i:s') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

if(isset($_POST['id']) && $_POST['id'] > 0 && isset($_POST['fecha']) && validateDate($_POST['fecha'], 'Y-m-d')){
    $sql = "UPDATE alertas_alertas SET fecha = '". $_POST['fecha'] ."' WHERE id = " . $_POST['id'];
    if($mysqli->query($sql)){
        $mysqli->close();
        header("Location: ../index.php?tab=0");
        exit();
    } 
}
header("Location: ../index.php?error=1");
exit();
