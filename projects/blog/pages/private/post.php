<? include_once 'funciones.php';
$titulo= "" ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><? echo $titulo;?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../node_modules/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../node_modules/flag-icon-css/css/flag-icon.min.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <? include './includes/_navbar.php'?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="row row-offcanvas row-offcanvas-right">
        

        <!-- partial:../../partials/_sidebar.html -->
        <? include './includes/_sidebar.php'?>



        <!-- partial -->
        <div class="content-wrapper">
          <div class="row">
            <!--tabla de post-->
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Listado de Post</h4>
                  <p class="page-description">Información sobre los post publicados</p>
                  <div class="row">
                    <div class="table-sorter-wrapper col-lg-12 table-responsive">
                      <table id="sortable-table-1" class="table">
                        <thead>
                          <tr>
                            
                            <th class="sortStyle">Titulo<i class="mdi mdi-chevron-down"></i></th>
                            <th class="sortStyle">Categoria<i class="mdi mdi-chevron-down"></i></th>
                            <th class="sortStyle">Fecha<i class="mdi mdi-chevron-down"></i></th>
                            <th class="sortStyle">Usuario<i class="mdi mdi-chevron-down"></i></th>
                            <th class="sortStyle">Editar<i class="mdi mdi-chevron-down"></i></th>
                            <th class="sortStyle">Borrar<i class="mdi mdi-chevron-down"></i></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?
                        $json = file_get_contents('json/posts.json');
                        $json = json_decode($json, true);                
                        foreach ($json['posts'] as $key => $value) {
                        ?>
                            <tr>
                                <td><? echo $value['titulo']; ?></td>
                                <td><? echo cat($value['categoria']); ?></td>
                                <td><? echo $value['fecha']; ?></td>
                                <td><? echo usuario($value['usuario']); ?></td>
                                <? if($value['usuario'] == $_COOKIE['usuario']){ ?>
                                    <td><a href="text_editor.php?key=<? echo $key?>&id=<? echo $value['id']; ?>" class="edit">Editar</a></td>
                                    <td><a onclick="borrar(<? echo $key ?>,<? echo $value['id']; ?>)" href="#" class="delete">Borrar</a></td>


                                <? } else {?>
                                    <td></td>
                                    <td></td>
                                <? }?>
                            </tr>
                        <?
                        }
                        ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <!--contenido-->
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?include './includes/_footer.php'?>
        <!-- partial -->
      </div>
      <!-- row-offcanvas ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>