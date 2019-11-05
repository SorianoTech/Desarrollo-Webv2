<?
include './includes/prohibir.php';
include "./includes/datos.php";
$id = 0;
$fila;
if (!empty($_GET['id']) && $_GET['id'] > 0) {
$id = $_GET['id'];
$query = "SELECT * FROM clientes WHERE taller = " . $id_taller . " and id = '" . $id . "'";
//echo $query;
$resultado = $mysqli->query($query);
if($resultado->num_rows == 1){
$fila = $resultado->fetch_assoc();
} else {
header("Location: alta_clientes.php?error=1");
exit();        
}    

} else {
header("Location: alta_clientes.php?error=1");
exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>FIDELIZA</title>
        <link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />
        <!--<link rel="stylesheet" href="css/fluid.css" type="text/css" media="screen" charset="utf-8" />-->
        <link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
        <link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
        <link rel="stylesheet" href="css/css.css" type="text/css" media="screen" charset="utf-8" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>     
        <script>
            var estado = 0;
            function abrir_altas() {
                if (estado == 0) {
                    estado = 1;
                    $("#alta_vehiculos").show("slow");
                } else {
                    estado = 0;
                    $("#alta_vehiculos").hide("slow");
                }

            }

            function guardar_operacion(vehiculo) {
                $("#cargando_historial_" + vehiculo).show();
                var operacion = $('#operaciones_' + vehiculo).val();
                $.post("includes/guardar_operaciones.php", {operaciones: operacion, vehiculo: vehiculo})
                        .done(function (data) {
                            $('#listado_historial_' + vehiculo).prepend(data);
                            $("#cargando_historial_" + vehiculo).hide();
                            $('#operaciones_' + vehiculo).val("");
                        });
            }


            function guardar_alertas(vehiculo) {
                $("#cargando_alertas_" + vehiculo).show();
                var alerta = $('#alertas_' + vehiculo).val();
                var fecha_alerta = $('#fecha_alertas_' + vehiculo).val();
                $.post("includes/guardar_alertas.php", {alerta: alerta, vehiculo: vehiculo, fecha_alerta: fecha_alerta})
                        .done(function (data) {
                            $('#listado_alertas_' + vehiculo).prepend(data);
                            $("#cargando_alertas_" + vehiculo).hide();
                            $('#alertas_' + vehiculo).val("");
                        });
            }


            $(function () {
                $("#accordion").accordion({
                    heightStyle: "content"
                });
            });



            $(function () {
                $(".tabs").tabs();
            });
        </script>
    </head>
    <body>

        <h1 id="head"><? echo $fila['nombre']; ?></h1>

        <ul id="navigation">
            <li><span class="active"><a href="home.php">Inicio</a></span></li>
            <li><span class="active"><a href="alta_clientes.php">Alta Clientes</a></span></li>
            <li><a href="includes/cerrar_session.php">Cerrar Sesión</a></li>                                  
        </ul>

        <div id="content" class="container_16 clearfix">
            <h2><? echo $fila['nombre']; ?> - <? echo $fila['dni']; ?> - <? echo $fila['telefono']; ?> - <? echo $fila['mail']; ?></h2>
            <?
            if (isset($_GET['error'])) {
            $texto = "";
            if ($_GET['error'] == 1) {
            $texto = "ERROR... muy posiblemente el vehículo ya esta en la Base de Datos";
            }
            if ($_GET['error'] == 2) {
            $texto = "ERROR... Algo ha fallado";
            }
            echo "<p class='error'>" . $texto . "</p>";
            } elseif (isset($_GET['ok']) && $_GET['ok'] == 1) {
            echo "<p class='success'>Alta Correcta</p>";
            }
            ?>
            <input type="button" value="Alta Nuevo Vehículo" onclick="abrir_altas()" />
            <br><br>
            <div id="alta_vehiculos">
                <form method="post" action="includes/alta_vehiculos.php">
                    <input type="hidden" name="cliente" value="<? echo $fila['id']; ?>" />
                    <div class="grid_5">
                        <p>
                            <label for="matricula">Matrícula</label>
                            <input type="text" name="matricula" maxlength="10" minlength="6" required="" />
                        </p>
                    </div>

                    <div class="grid_16">
                        <p>
                            <label for="modelo">Modelo</label>
                            <input type="text" name="modelo" minlength="6" maxlength="100" required="" />
                        </p>

                    </div>
                    <div class="grid_16">
                        <p>
                            <label for="descripcion">Detalles del Vehículo</label>
                            <textarea name="descripcion"></textarea>
                        </p>

                    </div>

                    <div class="grid_5">
                        <p>
                            <label for="fecha_matriculacion">Fecha Matriculación</label>
                            <input type="date" name="fecha_matriculacion" required="" />
                        </p>
                    </div>                


                    <div class="grid_16">

                        <p class="submit">

                            <input type="submit" value="Añadir Vehículo" />
                        </p>
                    </div>
                </form>
            </div>



            <div id="accordion">
                <?
                $query = "SELECT * FROM vehiculos WHERE cliente = " . $id;
                //echo $query;
                $resultado = $mysqli->query($query);
                while ($fila = $resultado->fetch_assoc()) {
                ?>
                <h3><? echo $fila['matricula'] ?> | <? echo $fila['modelo'] ?></h3>
                <div>
                    <p>
                        <? echo $fila['descripcion']; ?>
                    </p>
                    <div class="tabs">
                        <ul>
                            <li><a href="#tabs-<? echo $fila['id'] ?>-1">Historial</a></li>
                            <li><a href="#tabs-<? echo $fila['id'] ?>-2">Alertas</a></li>
                        </ul>
                        <div id="tabs-<? echo $fila['id'] ?>-1">
                            <textarea class="input_100" placeholder="Nueva Operación" id="operaciones_<? echo $fila['id'] ?>"></textarea>
                            <button onclick="guardar_operacion(<? echo $fila['id'] ?>)">Guardar</button>
                            <img src="imagenes/cargando.gif" class="invisible" id="cargando_historial_<? echo $fila['id']; ?>">
                            <ul id="listado_historial_<? echo $fila['id']; ?>">
                                <? 
                                $query = "select * from historial where vehiculo = " . $fila['id'] . " order by id desc";
                                //echo $query;
                                $resultado_historial = $mysqli->query($query);
                                while ($fila_historial = $resultado_historial->fetch_assoc()) {
                                echo "<li><h3>".$fila_historial['fecha']."</h3>";
                                echo "<p>".$fila_historial['operaciones']."</p></li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <div id="tabs-<? echo $fila['id'] ?>-2">
                            <textarea class="input_100" placeholder="Nueva Alerta" id="alertas_<? echo $fila['id'] ?>"></textarea>
                            <input type="date" id="fecha_alertas_<? echo $fila['id'] ?>">
                            <button onclick="guardar_alertas(<? echo $fila['id'] ?>)">Guardar</button>
                            <img src="imagenes/cargando.gif" class="invisible" id="cargando_alertas_<? echo $fila['id']; ?>">
                            <ul id="listado_alertas_<? echo $fila['id']; ?>">
                                <? 
                                $query = "select * from alertas where vehiculo = " . $fila['id'] . " order by id desc";
                                //echo $query;
                                $resultado_alertas = $mysqli->query($query);
                                while ($fila_alertas = $resultado_alertas->fetch_assoc()) {
                                echo "<li><h3>".$fila_alertas['fecha_alerta']."</h3>";
                                echo "<p>".$fila_alertas['alerta']."</p></li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>                            
                </div>
                <?
                }
                ?>
            </div>            

        </div>

        <div id="foot">
            <a href="https://www.ciberweb.com">Desarrollo: www.ciberweb.com</a>
        </div>
    </body>
</html>