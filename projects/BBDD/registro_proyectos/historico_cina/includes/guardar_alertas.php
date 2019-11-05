<?php
include_once './datos.php';

function validateDate($date, $format = 'Y-m-d H:i:s') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

if(isset($_POST['alerta']) && isset($_POST['fecha']) && validateDate($_POST['fecha'], 'Y-m-d') && isset($_POST['proyecto'])){
    foreach ($_POST as $key => $value) {
        $$key = mysqli_real_escape_string($mysqli,  $value);
    }
    $sql = "INSERT INTO alertas_alertas (alerta, fecha, proyecto) VALUES ('" . $alerta . "', '" . $fecha . "', '" . $proyecto . "')";
    if($mysqli->query($sql)){
        $sql = "SELECT *, DATE_FORMAT(fecha,'%d-%m-%Y') AS fecha, alertas_proyectos.proyecto FROM alertas_alertas, alertas_proyectos WHERE alertas_proyectos.id = alertas_alertas.proyecto AND alertas_alertas.id = " . $mysqli->insert_id;
        $resultado = $mysqli->query($sql);
        $fila = $resultado->fetch_assoc();
        $mysqli->close();
        echo '<li onclick="abrir_botones_alertas(' . $fila['id'] . ')" class="li_alertas verde">' . $fila['fecha'] . " -> " . $fila['proyecto'] . ':';
        echo '<ul><li>' . $fila["alerta"] . '</li></ul></li>';
        echo '<div class="boton_borrar_posponer_' . $fila['id'] . ' oculto">';
        echo '<form method="POST" action="includes/borrar_alerta.php">';
        echo '<input type="hidden" name="id" value="' . $fila['id'] . '">';
        echo '<button class="boton_borrar">Borrar</button>';
        echo '</form>';
        echo '<form method="POST" action="includes/posponer_alerta.php">';
        echo '<input type="hidden" name="id" value="' . $fila['id'] . '">';
        echo '<input class="calendario_posponer" type="date" name="fecha" min=' . $hoy = date('Y-m-d');
        echo '<button class="boton_posponer">Posponer</button>';
        echo '</form>';
        echo '</div>';
    } 
}