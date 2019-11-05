<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>        
        <title>Intranet</title>
        <style>
        </style>
        
        <script>
            $( document ).ready(function() {
                $("#formulario").submit(function(e) {

                    e.preventDefault(); // avoid to execute the actual submit of the form.

                    var form = $(this);
                    var url = form.attr('action');

                    $.ajax({
                           type: "POST",
                           url: url,
                           data: form.serialize(), // serializes the form's elements.
                           success: function(data)
                           {
                               alert(data); // show response from the php script.
                           }
                         });
                });                 
            });
           
        </script>
    </head>
    <body>
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">GenTest</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Añadir<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Listado</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Generador</a>
                    </li>                    
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </div>
        </nav>        

        <div class="container mt-4">
            <div id="contenedor-formulario">
                <h2>Añadir Nueva Pregunta</h2>
                <form enctype="multipart/form-data" method="post" action="guardar.php" id="formulario">
                    <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
                    <div class="form-group">
                        <label for="pregunta">Pregunta</label>
                        <textarea required="" id="pregunta" name="pregunta" class="form-control form-control-lg" aria-describedby="pregunta" placeholder="Nueva Pregunta"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Imagen">Imagen</label>
                        <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Imagen" accept=".jpg,.jpeg">
                        <small id="imagenHelp" class="form-text text-muted">Suba una imagen JPEG si la pregunta la precisa</small>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="respuesta1" class="text-success">Respuesta CORRECTA</label>
                            <textarea required="" id="pregunta1" name="respuesta1" rows="6" class="form-control form-control-lg" aria-describedby="respuesta" placeholder="Nueva Pregunta"></textarea>
                            <small id="respuesta1Help" class="form-text text-muted">Escriba aquí la respuesta CORRECTA</small>
                        </div>
                        <div class="form-group col-md">
                            <label for="respuesta2">Respuesta</label>
                            <textarea required="" id="pregunta2" name="respuesta2" rows="6" class="form-control form-control-lg" aria-describedby="respuesta" placeholder="Nueva Pregunta"></textarea>
                        </div>
                        <div class="form-group col-md">
                            <label for="respuesta3">Respuesta</label>
                            <textarea required="" id="pregunta3" name="respuesta3" rows="6" class="form-control form-control-lg" aria-describedby="respuesta" placeholder="Nueva Pregunta"></textarea>
                        </div> 
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>                
            </div>
        </div>
    </body>
</html>
