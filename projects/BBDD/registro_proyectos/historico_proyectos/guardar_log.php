<?php

include_once './datos.php';
$proyecto=$_POST['dominio'];


if ( !empty($_POST['texto']) && isset($_POST['dominio']) ){
    //si recibo los datos del formularios
    //obtenemos el id del proyecto
        $query_proyecto_id = "SELECT id FROM proyectos_proyecto WHERE proyecto ='$proyecto'";
        $resultado = $mysqli->query($query_proyecto_id);
        $fila = $resultado->fetch_assoc();
        $id_proyecto = $fila['id'];
        $texto= $_POST['texto'];
    if($_POST['tipo']==0){
        //Insertamos el LOG
        $sql = "INSERT INTO proyectos_log (log, id_proyecto) VALUES ('".$texto."','".$id_proyecto."')";
        if ($mysqli->query($sql)) {
            $mysqli->close();
            header("Location: index.php?dominio=$proyecto&ok=1");
            exit();
        }else{
            header("Location: index.php?dominio=$proyecto&ok=0");
            exit();
        }
    }else{
    //inserto una alerta
        if(!empty($_POST['fecha'])){
            $fecha=$_POST['fecha'];
            $sql = "INSERT INTO proyectos_alertas (alerta, fecha, id_proyecto) VALUES ('".$texto."','".$fecha."','".$id_proyecto."')";
                if ($mysqli->query($sql)) {
                    $mysqli->close();
                    header("Location: index.php?dominio=$proyecto&ok=1");
                    exit();
                }else{
                    header("Location: index.php?dominio=$proyecto&ok=0");
                    exit();
        }}else{
            header("Location: index.php?dominio=$proyecto&ok=0");
                    exit();
        }
    }
}
header("Location: index.php?dominio=$proyecto&ok=0");
exit();
