<?php
include_once './datos.php';

if(isset($_POST['log']) &&  isset($_POST['proyecto'])){
    $log = mysqli_real_escape_string($mysqli, $_POST['log']);
    $sql = "INSERT INTO alertas_logs (log, proyecto) VALUES ('" . $log . "', " . $_POST['proyecto'] . ")";
    //echo $sql;
    if($mysqli->query($sql)){
        $sql = "SELECT alertas_logs.log, alertas_proyectos.proyecto,alertas_logs.id, DATE_FORMAT(fecha,'%d-%b-%Y %T') AS fecha
                FROM alertas_logs, alertas_proyectos
                WHERE alertas_logs.id = " . $mysqli->insert_id . " AND alertas_proyectos.id = alertas_logs.proyecto";
        $resultado = $mysqli->query($sql);
        $fila_logs = $resultado->fetch_assoc();
        $mysqli->close();
        echo '<li class="fucsia li_logs_borrados_' . $fila_logs['id'] . '"><div class="contenedor_li"><b>'
        . $fila_logs['proyecto'] .
        '&nbsp;</b><i class="fas fa-arrow-right" style="font-size:16px;color:#020f91"></i><b>&nbsp;'
        . $fila_logs['fecha'] . '</b>: ' . $fila_logs['log'] .
        '</div></li>';
        echo '<div class="papelera li_logs_borrados_' . $fila_logs['id'] . '"><i class="far fa-trash-alt" style="font-size:22px;color:#cc0000" onclick="borrar_logs('
        . $fila_logs['id'] . ')"></i></div>';
    }
}

