<? 
include './includes/prohibir.php';
include './includes/datos.php'; 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title><? echo $nombre_taller; ?></title>
        <link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />
        <!--<link rel="stylesheet" href="css/fluid.css" type="text/css" media="screen" charset="utf-8" />-->
        <link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
        <link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
    </head>
    <body>

        <h1 id="head"><? echo $nombre_taller; ?></h1>

        <ul id="navigation">
            <li><span class="active"><a href="home.php">Inicio</a></span></li>
            <li><a href="alta_clientes.php">Alta Clientes</a></li>
            <li><a href="includes/cerrar_session.php">Cerrar Sesión</a></li>
        </ul>

        <div id="content" class="container_16 clearfix">
            <div class="grid_4">
                <p>
                    <label>DNI</label>
                    <input type="text" />
                </p>
            </div>
            <div class="grid_5">
                <p>
                    <label>MATRÍCULA</label>
                    <input type="text" />
                </p>
            </div>
            <div class="grid_5">

            </div>
            <div class="grid_2">
                <p>
                    <label>&nbsp;</label>
                    <input type="submit" value="Buscar" />
                </p>
            </div>
            <div class="grid_16">
                <table>
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Modelo/Matrícula</th>
                            <th>Alerta</th>
                            <th>Teléfono</th>
                            <th>Mail</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="pagination">
                                <span class="active curved">1</span><a href="#" class="curved">2</a><a href="#" class="curved">3</a><a href="#" class="curved">4</a> ... <a href="#" class="curved">10 million</a>
                            </td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?
                        $query = "SELECT alertas.alerta, vehiculos.matricula, vehiculos.modelo, alertas.id, clientes.id as id_cliente, clientes.nombre, clientes.telefono, clientes.mail FROM alertas, vehiculos, clientes where alertas.vehiculo = vehiculos.id and clientes.id = vehiculos.cliente and clientes.taller = " . $id_taller . " and alertas.fecha_alerta > DATE_SUB(NOW(),INTERVAL 2 DAY)";
                        $resultado = $mysqli->query($query);
                        while($fila = $resultado->fetch_assoc()){
                        ?>
                            <tr>
                                <td><a href="clientes.php?id=<? echo $fila['id_cliente'] ?>"><? echo $fila['nombre']; ?></a></td>
                                <td><? echo $fila['modelo']; ?> / <? echo $fila['matricula']; ?></td>
                                <td><? echo $fila['alerta']; ?></td>
                                <td><? echo $fila['telefono']; ?></td>
                                <td><? echo $fila['mail']; ?></td>
                            </tr>
                        <?
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="foot">
            <a href="https://www.ciberweb.com">Desarrollo: www.ciberweb.com</a>
        </div>
    </body>
</html>