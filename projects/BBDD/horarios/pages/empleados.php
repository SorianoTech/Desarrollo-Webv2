<? 
include '../includes/prohibir.php';
include '../includes/datos.php'; 

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Alta de empleados</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="../node_modules/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="../node_modules/simple-line-icons/css/simple-line-icons.css">
        <link rel="stylesheet" href="../node_modules/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="../node_modules/perfect-scrollbar/css/perfect-scrollbar.css">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <link rel="stylesheet" href="../node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css" />
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="../css/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="../../images/favicon.png" />
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

                    <!-- partial content-->
                    <div class="content-wrapper">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Lista de empleados</h4>
                                <div class="row">
                                    <div class="col-12">
                                        <table id="order-listing" class="table" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nombre</th>
                                                    <th>Apellido</th>
                                                    <th>Mail</th>
                                                    <th>Fecha Nacimiento</th>
                                                    <th>DNI</th>
                                                    <th>Genero</th>
                                                    <!--<th>Estado</th>-->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?
                                                include '../includes/querys.php'; 
                                                while($fila = $resultado_empleados->fetch_assoc()){
                                                ?>
                                                <tr>
                                                    <td><? echo $fila['id']; ?></td>
                                                    <td><? echo $fila['nombre']; ?></td>
                                                    <td><? echo $fila['apellido']; ?></td>
                                                    <td><? echo $fila['mail']; ?></td>
                                                    <td><? echo $fila['fecha_nacimiento']; ?></td>
                                                    <td><? echo $fila['dni']; ?></td>
                                                    <td><label class="badge badge-danger"><? echo $fila['genero']; ?></label></td>
                                                    <!--<td><button class="btn btn-outline-primary"><? echo $fila['estado']; ?></button></td>-->
                                                </tr>
                                                <?
                                                }?>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        <script src="../node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <script src="../node_modules/datatables.net/js/jquery.dataTables.js"></script>
        <script src="../node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="../js/off-canvas.js"></script>
        <script src="../js/hoverable-collapse.js"></script>
        <script src="../js/misc.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="../js/data-table.js"></script>
        <!-- End custom js for this page-->
    </body>

</html>
