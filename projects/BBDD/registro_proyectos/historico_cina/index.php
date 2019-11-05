<?php
include_once './includes/datos.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="includes/css.css" rel="stylesheet" type="text/css"/>
        <title>Proyectos</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <?php
        include './includes/funciones/formulario_alertas.php';
        include './includes/funciones/formulario_proyectos.php';
        include './includes/funciones/formulario_logs.php';
        include './includes/funciones/tabs.php';
        include './includes/funciones/ocultar_borrar.php';
        ?>
        <style>
            input.text { margin-bottom:12px; width:95%; padding: .4em; }
            fieldset { padding:0; border:0; margin-top:25px; }
            .ui-dialog .ui-state-error { padding: .3em; }
            .validateTips { border: 1px solid transparent; padding: 0.3em; }
        </style>
    </head>
    <body>
        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Alertas</a></li>
                <li><a href="#tabs-2">Proyectos</a></li>
                <li><a href="#tabs-3">Log's</a></li>
            </ul>
            <div id="tabs-1">
                <!--------------------------------------ALERTAS------------------------------------------>
                <h1><a href="index.php?tab=0">ALERTAS &nbsp;<i class="fa fa-backward" style="font-size:20px;color:#67080c"></i></a></h1>
                <button id="crear_alerta" class="boton_alerta">Crear Nueva Alerta</button>
                <div id="formulario_alertas">
                    <p class="validateTips">Todos los campos son obligatorios!</p>
                    <form id="form_alertas">
                        <fieldset>
                            <input id="alerta" type="text" name="alerta" placeholder="Nueva Alerta" required="" class="text ui-widget-content ui-corner-all">
                            <input id="fecha" type="date" name="fecha" required="" min=<?php echo date('Y-m-d');?> class="text ui-widget-content ui-corner-all">
                            <select id="proyecto" name="proyecto" required="" class="text ui-widget-content ui-corner-all">
                                <option value="">----- Elige un Proyecto -----</option>>
                                <?php
                                    $sql_proyectos = "SELECT * FROM alertas_proyectos ORDER BY proyecto";
                                    $resultado_proyectos = $mysqli->query($sql_proyectos);
                                    while ($fila_proyectos = $resultado_proyectos->fetch_assoc()) {
                                        echo '<option value="' . $fila_proyectos["id"] . '">' . $fila_proyectos["proyecto"] . '</option>';
                                    }
                                ?>
                            </select>
                            <input type="submit" tabindex="-1" style="position:absolute; top:-1000px" onclick="guardar_alertas()">
                        </fieldset>
                    </form>
                </div>
                <div id="lista_alertas">
                    <ul id="ul_lista_alertas">
                        <?php
                            $sql_alertas = "SELECT DATE_FORMAT(fecha,'%d-%b-%Y') AS fecha, alertas_proyectos.proyecto, alertas_alertas.alerta, alertas_alertas.id 
                            FROM alertas_proyectos, alertas_alertas
                            WHERE alertas_proyectos.id = alertas_alertas.proyecto
                            ORDER BY date (fecha)";
                            $resultado_alertas = $mysqli->query($sql_alertas);
                            while ($fila_alertas = $resultado_alertas->fetch_assoc()) {
                                echo '<li onclick="abrir_botones_alertas(' . $fila_alertas['id'] . ')" class="li_alertas">' . $fila_alertas['fecha'] . ' <i class="fas fa-arrow-right" style="font-size:16px;color:#67080c"></i> ' . $fila_alertas['proyecto'] . ':';
                                echo '<ul><li>' . $fila_alertas["alerta"] . '</li></ul></li>';
                        ?>
                                <div class="boton_borrar_posponer_<?php echo $fila_alertas['id']; ?> oculto">
                                    <form method="POST" action="includes/borrar_alerta.php">
                                        <input type="hidden" name="id" value="<?php echo $fila_alertas['id']; ?>">
                                        <button class="boton_borrar">Borrar</button>
                                    </form>
                                    <form method="POST" action="includes/posponer_alerta.php">
                                        <input type="hidden" name="id" value="<?php echo $fila_alertas['id']; ?>">
                                        <input class="calendario_posponer" type="date" name="fecha" min=<?php echo date('Y-m-d');?> >
                                        <button class="boton_posponer">Posponer</button>
                                    </form>
                                </div>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <div id="tabs-2">
                <!--------------------------------------PROYECTOS------------------------------------------> 
                <h1><a href="index.php?tab=1">PROYECTOS &nbsp;<i class="fa fa-backward" style="font-size:20px;color:#27553a"></i></a></h1>
                <button id="crear_proyecto" class="boton_proyecto">Añadir Nuevo Proyecto</button>
                <div id="formulario_proyectos">
                    <form id="form_proyectos">
                        <fieldset>
                            <input id="nombre" type="text" name="proyecto" placeholder="Nombre Proyecto" required="" maxlength="150" class="text ui-widget-content ui-corner-all">
                            <input type="submit" tabindex="-1" style="position:absolute; top:-1000px" onclick="guardar_proyectos()">
                        </fieldset>
                    </form>
                </div>
                <form id="buscador" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>"> 
                    <input class="sitio_buscar" type="search" name="buscar" placeholder="Buscar Proyecto..." autofocus="" >
                    <input class="boton_buscar"type="submit" value="Buscar">
                </form>
                <div id="lista_proyectos">
                    <ul id="ul_lista_proyectos">
                        <?php
                            if ($_POST) {
                                if (isset($_POST['buscar'])) {
                                    $buscar = mysqli_real_escape_string($mysqli, $_POST['buscar']);
                                    //Contulta para la base de datos, se utiliza un comparador LIKE para acceder a todo lo que contenga la cadena a buscar
                                    $sql_proyectos = "SELECT * FROM alertas_proyectos WHERE proyecto LIKE '%" . $buscar . "%' ORDER BY proyecto";
                                    $resultado_proyectos = $mysqli->query($sql_proyectos); //Ejecución de la consulta
                                    //Si hay resultados...
                                    if ($resultado_proyectos->num_rows > 0) {
                                        while ($fila_proyectos = $resultado_proyectos->fetch_assoc()) {
                                            echo '<li class="li_proyect" onclick="abrir_botones_alertas(' . $fila_proyectos['id'] . ')">' . $fila_proyectos["proyecto"] . '</li>';
                                            include './includes/botones_proyectos.php';
                                        }
                                    } else {
                                        echo "NO HAY RESULTADOS EN LA BBDD";
                                    }
                                } else {
                                    echo "NO HAY RESULTADOS...";
                                    mysqli_close($mysqli);
                                }
                            } else {
                                $sql_proyectos = "SELECT * FROM alertas_proyectos ORDER BY proyecto";
                                $resultado_proyectos = $mysqli->query($sql_proyectos);
                                while ($fila_proyectos = $resultado_proyectos->fetch_assoc()) {
                                    echo '<li class="li_proyect" onclick="abrir_botones_alertas(' . $fila_proyectos['id'] . ')" >' . $fila_proyectos["proyecto"] . '</li>';
                                    include './includes/botones_proyectos.php';
                                }
                            }
                    ?>
                    </ul>
                </div>
            </div>
            <div id="tabs-3">
                <!--------------------------------------LOG'S------------------------------------------> 
                <h1><a href="index.php?tab=2">LOG'S &nbsp;<i class="fa fa-backward" style="font-size:20px;color:#020f91"></i></a></h1>
                <button id="crear_log" class="boton_log">Crear Nuevo Log</button>
                <div id="formulario_logs">
                    <p class="validateTips">Todos los campos son obligatorios!</p>
                    <form id="form_logs">
                        <fieldset>
                            <input id="log" type="text" name="log" placeholder="Nuevo Log" required="" maxlength="250" class="text ui-widget-content ui-corner-all">
                            <select id="proyecto_log" name="proyecto" required="">
                                <option value="">----- Elige un Proyecto -----</option>
                                <?php
                                    $sql_proyectos = "SELECT * FROM alertas_proyectos ORDER BY proyecto";
                                    $resultado_proyectos = $mysqli->query($sql_proyectos);
                                    while ($fila_proyectos = $resultado_proyectos->fetch_assoc()) {
                                        echo '<option value="' . $fila_proyectos["id"] . '">' . $fila_proyectos["proyecto"] . '</option>';
                                    }
                                ?>
                            </select>
                            <input type="submit" tabindex="-1" style="position:absolute; top:-1000px" onclick="guardar_logs()">
                        </fieldset>
                    </form>
                </div>
                <select id="select_logs" onchange="verproyecto();">
                    <option value="">----- Elige un Proyecto -----</option>
                    <?php
                    $sql = "select * from alertas_proyectos order by proyecto";
                    $resultado = $mysqli->query($sql);
                    while($fila = $resultado->fetch_assoc()){
                    ?>
                        <option value="<?php echo $fila['id']; ?>"><?php echo $fila['proyecto']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <div id="lista_logs">
                    <ul id="ul_lista_logs">
                        <?php
                            $sql_logs = "SELECT alertas_logs.log, alertas_proyectos.proyecto,alertas_logs.id, DATE_FORMAT(fecha,'%d-%b-%Y %T') AS fecha
                                        FROM alertas_logs, alertas_proyectos
                                        WHERE alertas_proyectos.id = alertas_logs.proyecto
                                        ORDER BY date (fecha) DESC, time (fecha) DESC";
                            $resultado_logs = $mysqli->query($sql_logs);
                            while ($fila_logs = $resultado_logs->fetch_assoc()) {
                                echo '<li class="li_logs li_logs_borrados_' . $fila_logs['id'] . '"><div class="contenedor_li"><b>'
                                . $fila_logs['proyecto'] .
                                '&nbsp;</b><i class="fas fa-arrow-right" style="font-size:16px;color:#020f91"></i><b>&nbsp;'
                                . $fila_logs["fecha"] . '</b>: ' . $fila_logs['log'] .
                                '</div></li>';
                                echo '<div class="papelera li_logs_borrados_' . $fila_logs['id'] . '"><i class="far fa-trash-alt" style="font-size:22px;color:#cc0000" onclick="borrar_logs('
                                . $fila_logs['id'] . ')"></i></div>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div id="foot">
            <a id="a" href="#">Copyright © Crina 2019</a>
        </div>
    </body>
</html>
