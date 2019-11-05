<? 
include '../includes/prohibir.php';
include '../includes/datos.php'; 
?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Gestion de empleados</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="../node_modules/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="../node_modules/simple-line-icons/css/simple-line-icons.css">
        <link rel="stylesheet" href="../node_modules/flag-icon-css/css/flag-icon.min.css">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="../css/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="../images/favicon.png" />
    </head>

    <body>
        <div class="container-scroller">
            <!-- partial:../../partials/_navbar.html -->
            <?include_once('../includes/_navbar.php')?>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <div class="row row-offcanvas row-offcanvas-right">
                    <!-- partial:../../partials/_sidebar.html -->
                    <?include_once('../includes/_sidebar.php')?>
                    <!-- partial -->
                    <div class="content-wrapper">
                        <!--Formulario alta empleados -->
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Alta de empleado</h4>
                                    <form method="post" action="../includes/alta_empleado_guardar.php" class="form-sample">
                                        <p class="card-description">
                                            Información Personal
                                        </p>
                                        <!-- control de errores -->
                                        <?
                                        if (isset($_GET['error'])) {
                                        $texto = "";
                                        if ($_GET['error'] == 1) {
                                        $texto = "ERROR... muy posiblemente el empleado ya esta en la Base de Datos";
                                        }
                                        if ($_GET['error'] == 2) {
                                        $texto = "ERROR... Algo ha fallado";
                                        }
                                        echo "<p class='badge badge-danger'>" . $texto . "</p>";
                                        } elseif (isset($_GET['ok']) && $_GET['ok'] == 1) {
                                        echo "<p class='badge badge-success'>Alta Correcta</p>";
                                        }
                                        ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Nombre</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="nombre" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Apellido</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="apellido"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Teléfono</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" name="telefono" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Email</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control" name="mail"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Género</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="genero">
                                                            <option>Hombre</option>
                                                            <option>Mujer</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Fecha de Nacimiento</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="fecha_nacimiento"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">DNI</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="dni" maxlength="9" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="pass"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <button type="submit" class="btn btn-success mr-2">Guardar</button>
                                        <button class="btn btn-light">Cancelar</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--Fin formulario alta empleado-->

                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:../../partials/_footer.html -->
                    <?include_once('../includes/_footer.php')?>
                    <!-- partial -->
                </div>
                <!-- row-offcanvas ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="../node_modules/jquery/dist/jquery.min.js"></script>
        <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="../js/off-canvas.js"></script>
        <script src="../js/misc.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <!-- End custom js for this page-->
    </body>

</html>
