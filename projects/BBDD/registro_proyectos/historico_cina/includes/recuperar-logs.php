<?php
include_once './datos.php';

$id = $mysqli->real_escape_string($_POST['id']);
$sql = "SELECT alertas_logs.log, alertas_proyectos.proyecto, alertas_logs.id, DATE_FORMAT(fecha,'%d-%b-%Y %T') AS fecha
FROM alertas_logs, alertas_proyectos
WHERE alertas_logs.proyecto = " . $id . " AND alertas_proyectos.id = " . $id . "
ORDER BY date (fecha) DESC, time (fecha) DESC";
$resultado = $mysqli->query($sql);
if($resultado->num_rows > 0) {
    while ($fila_logs = $resultado->fetch_assoc()) {
        echo '<li class="li_logs li_logs_borrados_' . $id . '"><div class="contenedor_li"><b>'
        . $fila_logs['proyecto'] .
        '&nbsp;</b><i class="fas fa-arrow-right" style="font-size:16px;color:#020f91"></i><b>&nbsp;'
        . $fila_logs["fecha"] . '</b>: ' . $fila_logs['log'] .
        '</div></li>';
        echo '<div class="papelera li_logs_borrados_' . $id . '"><i class="far fa-trash-alt" style="font-size:22px;color:#cc0000" onclick="borrar_logs('
        . $fila_logs['id'] . ')"></i></div>';
}
} else {
    echo '<li class="li_logs"><div class="contenedor_li"><b><center>No hay log\'s de momento...</center></b></div></li>';
}