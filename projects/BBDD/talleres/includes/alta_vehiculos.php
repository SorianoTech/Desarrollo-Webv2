<?php
include './prohibir.php';
include './datos.php';
if(isset($_POST['matricula'])){
    $query = "INSERT INTO vehiculos (matricula, modelo, descripcion, fecha_matriculacion, cliente) VALUES ('" . $_POST['matricula'] . "','" . $_POST['modelo'] . "','" . $_POST['descripcion'] . "','" . $_POST['fecha_matriculacion'] . "', '" . $_POST['cliente'] . "')";
    //echo $query;
    if($mysqli->query($query)){
        header("Location: ../clientes.php?ok=1&id=".$_POST['cliente']);
        exit();
    } else {
         header("Location: ../clientes.php?error=1&id=".$_POST['cliente']);
        exit();
    }
} else {
     header("Location: ../clientes.php?error=2&id=".$_POST['cliente']);
    exit();    
}
