<?php
require_once './prohibir.php';
//recibimos el id de tarea por le método GET
$id_tarea = $_GET['id_tarea'];
$cambiar = false;
$id = -1;

$json = file_get_contents('tareas.json');
$json = json_decode($json, true);

echo '<pre>';
print_r($json);

//Por cada tarea, si el identificador es correcto.
//Asignación del estado de la tarea a 1
foreach ($json['tareas'] as $key => $value) {
    if($value['asignado'] == $_SESSION['usuario'] && $id_tarea == $value['id'] && $value['estado'] == 0){
        $cambiar = true;
        $id = $key;
        break;
    }
}
//Si se ha asignado la tarea, entonces modificamos el estado en la array y volcamos el la información al fichero json
if($cambiar == true){
    $json['tareas'][$id]['estado'] = 1;
    $json = json_encode($json);
    file_put_contents('tareas.json', $json, LOCK_EX);    
}



$json = file_get_contents('tareas.json');
$json = json_decode($json, true);  

/*    
header('Location: tareas.php');
exit();
  */  