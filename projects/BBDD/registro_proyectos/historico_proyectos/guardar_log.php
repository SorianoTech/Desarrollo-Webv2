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
        $id_empresa = $_POST['id_empresa'];
    if($_POST['tipo']==0){
        //Insertamos el LOG
        $sql = "INSERT INTO proyectos_log (log, id_proyecto,id_empresa) VALUES ('".$texto."','".$id_proyecto."','".$id_empresa."')";
        echo $sql;
        if ($mysqli->query($sql)) {
            $mysqli->close();
            header("Location: index.php?dominio=$proyecto&ok=1");
            exit();
        }else{
            header("Location: index.php?dominio=$proyecto&ok=fallolog");
            exit();
        }
    }else{//tipo no es igual a 0
    //inserto una alerta
        if(!empty($_POST['fecha'])){
            $fecha=$_POST['fecha'];
            $sql = "INSERT INTO proyectos_alertas (alerta, fecha, id_proyecto, id_empresa) VALUES ('".$texto."','".$fecha."','".$id_proyecto."','".$id_empresa."')";
                if ($mysqli->query($sql)) {
                    $mysqli->close();
                    header("Location: index.php?dominio=$proyecto&ok=1");
                    exit();
                }else{
                    header("Location: index.php?dominio=$proyecto&ok=falloalinsertar");
                    exit();
                }
        }else{//no hay tengo en la fecha
            header("Location: index.php?dominio=$proyecto&ok=nofecha");
                    exit();
        }
    }
}else{
header("Location: index.php?dominio=$proyecto&ok=texto-dominio");
exit();
}
