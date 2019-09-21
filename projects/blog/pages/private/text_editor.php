<? include_once 'prohibir.php'; ?>
<? include_once 'funciones.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Panel de Administracion</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../node_modules/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../node_modules/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="../../node_modules/perfect-scrollbar/css/perfect-scrollbar.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../../node_modules/summernote/dist/summernote-bs4.css" rel="stylesheet">
  <link rel="stylesheet" href="../../node_modules/quill/dist/quill.snow.css">
  <link rel="stylesheet" href="../../node_modules/simplemde/dist/simplemde.min.css">

  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <? include './includes/_navbar.php';?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="row row-offcanvas row-offcanvas-right">
        
      <!-- partial:../../partials/_sidebar.html -->
        <? include './includes/_sidebar.php';?>
        <!-- partial -->

        <div class="content-wrapper">
          <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <!--FOrmulario-->
                <form class="forms-sample" method="POST" action="guardar-post.php">
                  <div class="card-body">
                    <h4 class="card-title">Introduce la información del Artículo</h4>
                    <p class="card-description">
                      Es obligatorio que rellenes todos los campos
                    </p>
                    <div class="form-group">
                      <label>Título</label>
                      <input type="text" class="form-control form-control-lg" placeholder="Introduce un título"
                        aria-label="Título" name="titulo">
                    </div>
                    <!--Selecion categoria opciones-->
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Categoria</label>
                      <select class="form-control" id="exampleFormControlSelect2" name="categoria">
                         <?
                            $json = file_get_contents('json/categorias.json');
                            $json = json_decode($json, true);                
                            foreach ($json['categorias'] as $key => $value) {
                                echo '<option value="'.$value['id'].'">'.$value['categoria'].'</option>';                    
                            }                    
                        ?>      
                      </select>
                    </div>
                    <!--Fin categoria opciones-->
                    <div class="form-group">
                      <label>Imagen</label>
                      <input type="text" class="form-control form-control-sm" placeholder="URL" aria-label="Imagen"
                        name="imagen">
                    </div>
                  </div>
              </div>
            </div>
            <!--termina formulario de datos-->

            <!--Editor de texto-->
            <div class="card-body">
              <h4 class="card-title">Editor de post</h4>
              <div id="summernoteExample">
                <h4>The standard Lorem Ipsum passage, used since the 1500s</h4>
                <img src="../../images/samples/300x300/1.jpg" class="ml-2 mb-2 w-25" align="right">
                <p class="text-justify">
                  "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                  Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                  pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum."
                </p>
                <p class="text-justify">
                  Texto........
                </p>
              </div>
              <!--Acaba editor-->
              <div class="card-body">
                <button type="submit" class="btn btn-success mr-2">Guardar</button>
                <button class="btn btn-light">Cancel</button>
                </form>
              </div>
              <!--Cierro Formulario-->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <? include './includes/_footer.php';?>
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
  <script src="../../node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="../../node_modules/summernote/dist/summernote-bs4.min.js"></script>
  <script src="../../node_modules/tinymce/tinymce.min.js"></script>
  <script src="../../node_modules/quill/dist/quill.min.js"></script>
  <script src="../../node_modules/simplemde/dist/simplemde.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/editorDemo.js"></script>
  <!-- End custom js for this page-->
</body>

</html>