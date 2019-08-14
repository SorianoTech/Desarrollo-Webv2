<?php
require_once './prohibir.php';
$tarea = $_POST['tarea'];
$asignar = 0;

$json = file_get_contents('usuarios.json');
$json = json_decode($json, true);  
foreach ($json['usuarios'] as $key => $value) {
    if($_POST['asignar'] == $value['id']){
        $asignar = $value['id'];
    }
}

$id = rand(0,100000000);



if($asignar > 0 && strlen($tarea) < 300){
    $json = file_get_contents('tareas.json');
    $json = json_decode($json, true);
    
    $total = count($json['tareas']);
    $json['tareas'][$total]['id'] = $id;
    $json['tareas'][$total]['tarea'] = $tarea;
    $json['tareas'][$total]['usuario'] = $_SESSION['usuario'];
    $json['tareas'][$total]['asignado'] = $asignar;
    $json['tareas'][$total]['estado'] = 0;
    
    $json = json_encode($json);
    
    file_put_contents('tareas.json', $json, LOCK_EX);
    
    header('Location: tareas.php');
    exit();
    
} else {
    header('Location: tareas.php?error=1');
    exit();
}
