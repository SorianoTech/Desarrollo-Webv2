<!DOCTYPE html>
<html lang="en">

    <head>
        <?php
        include_once './datos.php';
        $date = date('Y-m-d');
        ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="Sergio" content="">

        <title>Gestión de proyectos</title>


        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <style>
            @media (max-width:576px) {
                h3 {
                    font-size: 1rem
                }

                h1 {
                    font-size: 1.25rem;
                }
            }

            @media (min-width: 768px) {
                .sidebar.toggled {
                    overflow: visible;
                    width: 8.5rem !important
                }
            }

            #mySearch {
                border: none;
                text-align: center;
            }

            #fecha {
                color: black;
            }

            .cerrar {
                padding: 5px;

                /*top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                max-width: 50%;
                text-align: center*/
            }
        </style>
        <script>
            function borrarAlerta(alerta) {
                var confirmar = confirm("¿Estas seguro de que deseas eliminar la alerta?");
                if (confirmar === true) {
                    jQuery.ajax({
                        type: "POST",
                        url: "borrar_alerta.php",
                        data: {
                            id_alerta: alerta
                        },
                        cache: false,
                        success: function (response) {
                            alert("Registro eliminado correctamente");
                        }
                    });
                }

            }
            function borrarProyecto(proyecto) {
                var confirmar = confirm("¿Estas seguro de que deseas eliminar el proyecto?");
                if (confirmar === true) {
                    jQuery.ajax({
                        type: "POST",
                        url: "borrar_proyecto.php",
                        data: {
                            name_proyecto: proyecto
                        },
                        cache: false,
                        success: function (response) {
                            alert("Registro eliminado correctamente");
                        }
                    });
                }

            }
           
        </script>

    </head>

    <body id="page-top">
        <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
            <a class="navbar-brand mr-1" href="index.php">Gestión de proyectos</a>
            <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
                <i class="fas fa-bars"></i>
            </button>
           

            <!-- Navbar Search -->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"
                  action="guardar_proyecto.php" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Añadir dominio" name="proyecto">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-upload"></i>
                        </button>
                    </div>
                </div>
            </form>
        </nav>
        <!-- Navbar -->

        <div id="wrapper">

            <!-- Sidebar -->
            <!--buscador-->
            <ul class="sidebar navbar-nav toggled" id="myMenu">
                <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Buscar..." title="Escribe un dominio">
                <?php
                $query = "SELECT * FROM proyectos_proyecto";
                $resultado = $mysqli->query($query);
                while ($fila = $resultado->fetch_assoc()) {
                    ?>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?dominio=<? echo $fila['proyecto']; ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>

                        <span>
                            <? echo $fila['proyecto']; ?></span>
                    </a>
                </li>
                <?}?>
            </ul>
            <!--cierre del div del buscador 
            </div>
            -->

            <!--contenido-->
            <div id="content-wrapper">

                <div class="container-fluid">
                    <?
                    if(isset($_GET['dominio'])){
                    //Muestro el titulo del proyecto 
                    echo "<h1>".$_GET['dominio'] ."</h1>";
                    //echo '<a href=""><span class="badge badge-danger" id="cerrar_'.$_GET['dominio'].'" onclick="borrarProyecto('.$_GET['dominio'].')">Borrar</span></a>'; 
                    //Query para sacar las alertas del dominio
                    $query_result_alertas="SELECT COUNT(proyectos_alertas.id) as total FROM proyectos_alertas, proyectos_proyecto WHERE proyectos_alertas.id_proyecto=proyectos_proyecto.id and proyectos_proyecto.proyecto='".$_GET['dominio']."'";
                    $resul_alertas = $mysqli->query($query_result_alertas);
                    $resul_alertas = $resul_alertas->fetch_assoc();

                    }else{
                    echo "<h1>Alertas Globales</h1>";
                    //Query para sacar el número de todas las alertas
                    $query_result_alertas="SELECT COUNT(proyectos_alertas.id) as total FROM proyectos_alertas, proyectos_proyecto WHERE proyectos_alertas.id_proyecto=proyectos_proyecto.id";
                    $resul_alertas = $mysqli->query($query_result_alertas);
                    $resul_alertas = $resul_alertas->fetch_assoc();

                    }?>

                    <!--Botones con alertas y log-->
                    <div class="card card-body">
                        <nav>
                            <button class="btn btn-primary btn-lg btn-block" type="button" data-toggle="collapse"
                                    data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Ver Alertas <span class="badge badge-danger">
                                    <? echo $resul_alertas['total']; ?></span>
                            </button>
                            <?if (isset($_GET['dominio'])){ ?>
                            <button class="btn btn-primary btn-lg btn-block" type="button" data-toggle="collapse"
                                    data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                                Ver LOG's
                            </button>
                            <?}?>
                        </nav>
                    </div>
                    <!--Fin botones-->

                    <!--Histórico de registros de alerta o log - vista con botones-->
                    <!--Alertas-->
                    <?
                    // Select para sacar todas las alertas en lista
                    //SI no recibo datos por get estoy en global
                    if(!isset($_GET['dominio'])){?>
                    <div class="collapse show" id="collapseExample">
                        <div class="card card-body">Alertas
                            <? 
                            $query_global_alertas= "SELECT proyectos_alertas.id as id, proyectos_proyecto.proyecto as proyecto, proyectos_alertas.alerta as alerta, DATE_FORMAT(proyectos_alertas.fecha,'%d %b %Y') as fecha FROM proyectos_alertas,proyectos_proyecto WHERE proyectos_proyecto.id=proyectos_alertas.id_proyecto ORDER BY proyectos_alertas.fecha ASC";
                            $resultado_global_alerta = $mysqli->query($query_global_alertas);
                            if($resultado_global_alerta->num_rows >=1){


                            while($fila_global_alerta = $resultado_global_alerta->fetch_assoc()){
                            echo "<div class='card card-body flex-row'>";
                            //quitar el flex-row
                            
                            //echo '<a href=""><span class="badge badge-danger" id="cerrar'.$fila_global_alerta['id'].'" onclick="borrarAlerta('.$fila_global_alerta['id'].')">Borrar</span></a>';
                            
                            echo '<a href=""><i class="far fa-times-circle fa-2x cerrar" id="cerrar'.$fila_global_alerta['id'].'" onclick="borrarAlerta('.$fila_global_alerta['id'].')"></i></a>';
                            echo $fila_global_alerta['fecha']."<br>";
                            echo $fila_global_alerta['proyecto']."<br>";
                            echo $fila_global_alerta['alerta'];

                            echo "</div>";

                            }
                            }else{
                            echo "<div class='card card-body'>";
                            echo "No hay Alertas";
                            echo "</div>";
                            }
                            ?>
                        </div>
                    </div>
                    <?}else{//estoy en el dominio
                    ?>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <? 
                            //query para sacar las alertas del dominio
                            $query_alerta="SELECT proyectos_alertas.id as id, proyectos_proyecto.proyecto as proyecto, proyectos_alertas.alerta as alerta, DATE_FORMAT(proyectos_alertas.fecha,'%d-%b-%Y') as fecha FROM proyectos_alertas, proyectos_proyecto WHERE proyectos_proyecto.id =
                            proyectos_alertas.id_proyecto
                            and proyectos_proyecto.proyecto = '".$_GET['dominio']."' ORDER BY proyectos_alertas.fecha ASC";
                            $resultado_alerta = $mysqli->query($query_alerta);
                            if($resultado_alerta->num_rows >=1){
                            echo "Alertas";
                            while($fila_alerta = $resultado_alerta->fetch_assoc()){
                            echo "<div class='card card-body flex-row'>";

                            echo '<a href=""><i class="far fa-times-circle fa-2x cerrar" id="cerrar'.$fila_alerta['id'].'"
                            onclick="borrarAlerta('.$fila_alerta['id'].')"></i></a>';
                            echo $fila_alerta['fecha']."-";
                            echo $fila_alerta['alerta'];
                            echo "</div>";
                            }
                            }else{
                            echo "<div class='card card-body'>";
                            echo "No hay Alertas";
                            echo "</div>";
                            }
                            ?>
                        </div>
                    </div>

                    <!--COLLAPSE LOGS-->
                    <div class="collapse" id="collapseExample2">
                        <div class="card card-body">
                            <? 
                            //query para sacar los log de un dominio 
                            $query_log="SELECT * FROM proyectos_log, proyectos_proyecto WHERE proyectos_proyecto.id = proyectos_log.id_proyecto
                            and proyectos_proyecto.proyecto = '".$_GET['dominio']."' ORDER BY proyectos_log.fecha DESC ";
                            $resultado_log = $mysqli->query($query_log);
                            if($resultado_log->num_rows >=1){
                            echo "Log's";
                            while($fila_log = $resultado_log->fetch_assoc()){
                            echo "<div class='card card-body'>";
                            echo $fila_log['fecha']."-";
                            echo $fila_log['log'];
                            echo "</div>";
                            }
                            }else{
                            echo "<div class='card card-body'>";
                            echo "No hay LOG's";
                            echo "</div>";
                            }
                            ?>
                        </div>
                    </div>

                    <div class="card card-body" id="formulario">
                        <!--<div class='card card-body'>-->
                        <? 
                        //$_GET['ok']="";
                        if(isset($_GET['ok']) && $_GET['ok'] == 1){?>
                        <div class="alert alert-success" role="alert">
                            Información añadida correctamente!
                        </div>
                        <?}
                        elseif(isset($_GET['ok']) && $_GET['ok'] == 0){?>
                        <div class="alert alert-danger" role="alert">
                            Recuerda que debes rellenar el campo de fecha para añadir una alerta.
                        </div>
                        <?}?>
                        <!--FOrmulario para enviar alertas y logs
                            se podria hacer dos formularos con un boton cada uno y un campo hiden-->
                        <form method="POST" action="guardar_log.php">
                            <h3>Añadir registro</h3>

                            <input type="hidden" value="<? echo $_GET['dominio']; ?>" name="dominio">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required="" name="texto"
                                      placeholder="Para añadir un log no es necesario seleccionar una fecha. Por defecto será la de hoy."></textarea>
                            <input type="date" class="rounded btn btn-lg btn-block" name="fecha" id="fecha" min="<?echo $date;?>">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" value="0"
                                    name="tipo">LOG</button>
                            <button type="submit" class="btn btn-primary btn-lg btn-block" value="1"
                                    name="tipo">ALERTA</button>
                        </form>
                        
                        <!-- </div>-->
                    </div>
                    <?}?>
                    <!-- /.container-fluid -->

                    <!-- Sticky Footer -->
                    <footer class="sticky-footer">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright © Sergio Soriano 2019</span>
                            </div>
                        </div>
                    </footer>

                </div>
                <!-- /.content-wrapper -->

            </div>
            <!-- /#wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="js/demo/chart-area-demo.js"></script>
            <script src="js/demo/chart-pie-demo.js"></script>

            <!--JQuery-->
            <script src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
            <script>
                    //Funcion de busqueda la barra de dominio
                    function myFunction() {
                        var input, filter, ul, li, a, i;
                        input = document.getElementById("mySearch");
                        filter = input.value.toUpperCase();
                        ul = document.getElementById("myMenu");
                        li = ul.getElementsByTagName("li");
                        for (i = 0; i < li.length; i++) {
                            a = li[i].getElementsByTagName("a")[0];
                            if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                li[i].style.display = "";
                            } else {
                                li[i].style.display = "none";
                            }
                        }
                    }
            </script>

    </body>

</html>