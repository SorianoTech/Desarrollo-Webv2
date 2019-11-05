<div class="boton_borrar_posponer_<?php echo $fila_proyectos['id']; ?> oculto">
    <form method="POST" action="includes/borrar_proyectos.php">
        <input type="hidden" name="id" value="<?php echo $fila_proyectos['id']; ?>">
        <button class="boton_borrar_proyecto">Borrar</button>
    </form>
    <button onclick="abrir_botones_proyectos_alertas(<?php echo $fila_proyectos['id']; ?>)" type="submit">Alertas</button>
    <button onclick="abrir_botones_proyectos_logs(<?php echo $fila_proyectos['id']; ?>)" type="submit">Log's</button>
</div>
<div class="lista_alertas_dentro_proyectos_<?php echo $fila_proyectos['id']; ?>  oculto">
    <ul class="ul_lista_alertas_dentro_proyectos">
        <?php
        $sql_alertas = "SELECT DATE_FORMAT(fecha,'%d-%b-%Y') AS fecha, alertas_alertas.alerta
                FROM alertas_alertas
                WHERE alertas_alertas.proyecto = " . $fila_proyectos['id'] . "
                ORDER BY date (fecha)";
            $resultado_alertas = $mysqli->query($sql_alertas);
            while ($fila_alertas = $resultado_alertas->fetch_assoc()) {
                echo '<li class="li_alertas">' . $fila_alertas['fecha'] . ' <i class="fas fa-arrow-right" style="font-size:16px;color:#67080c"></i> ' . $fila_alertas['alerta'];
            }
        ?>
    </ul>
</div>
<div class="lista_logs_dentro_proyectos_<?php echo $fila_proyectos['id']; ?>  oculto">
    <ul class="ul_lista_logs_dentro_proyectos">
        <?php
            $sql_logs = "SELECT alertas_logs.log, DATE_FORMAT(fecha,'%d-%b-%Y %T') AS fecha
                        FROM alertas_logs
                        WHERE alertas_logs.proyecto = " . $fila_proyectos['id'] . "
                        ORDER BY date (fecha) DESC, time (fecha) DESC";
            $resultado_logs = $mysqli->query($sql_logs);
            while ($fila_logs = $resultado_logs->fetch_assoc()) {
                echo '<li class="li_logs"><div class="contenedor_li"><b>'
                . $fila_logs['fecha'] . '&nbsp;</b><i class="fas fa-arrow-right" style="font-size:16px;color:#020f91"></i>&nbsp;'
                . $fila_logs['log'] .
                '</div></li>';
                echo '<div class="papelera"><i class="far fa-trash-alt" style="font-size:22px;color:#cc0000" onclick="borrar_logs('
                . $fila_logs['id'] . ')"></i></div>';
            }
        ?>
    </ul>
</div>