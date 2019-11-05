<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Back en Quiz</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js"  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="  crossorigin="anonymous"></script>
    <script>



    $(document).ready(function(e){
    // Submit form data via Ajax
    $("#fupForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'guardar.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            /*beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#fupForm').css("opacity",".5");
            },*/
            success: function(response){ //console.log(response);
                $('.statusMsg').html('');
                if(response.status == 1){
                    $('#fupForm')[0].reset();
                    $('.statusMsg').html('<p class="alert alert-success">'+response.message+'</p>');
                    $( ".statusMsg" ).fadeOut( 2000, function() {
                        // Animation complete.
                    });
                }else{
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');

                }
                $('#fupForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
});

    </script>
    
  </head>
  <body>

    <div class="container">
    <div class="card-header">
        <h3>Guarda tus preguntas en la base de datos</h3>
    </div>
    <div class="card-body">
    <form id="fupForm" enctype="multipart/form-data">
        <div class="form-group">
            <h2><label for="pregunta">Pregunta</label></h2>
            <textarea type="text" class="form-control" id="pregunta" name="pregunta" placeholder="Introduce la pregunta" required ></textarea>
        </div>
        <div class="form-group">
            <label for="resp_1">Respuesta 1</label>
            <input type="text" class="form-control" id="resp_1" name="resp_1" placeholder="Introduce la respuesta 1" required />
            <input class="" type="radio" name="correcta" id="exampleRadios1" value="1" checked>
            <label class="form-check-label" for="exampleRadios1">
                Correcta
            </label>
        </div>
        <div class="form-group">
            <label for="resp_2">Respuesta 2</label>
            <input type="text" class="form-control" id="resp_2" name="resp_2" placeholder="Introduce la respuesta 2" required />
            
            <input class="" type="radio" name="correcta" id="exampleRadios2" value="2" >
            <label class="form-check-label" for="exampleRadios2">
                Correcta
            </label>

        </div>
        <div class="form-group">
            <label for="resp_3">Respuesta 3</label>
            <input type="text" class="form-control" id="resp_3" name="resp_3" placeholder="Introduce la respuesta 3" required />
            <input class="" type="radio" name="correcta" id="exampleRadios3" value="3" >
            <label class="form-check-label" for="exampleRadios3">
                Correcta
            </label>
        </div>
        <div class="form-group">
            <label for="file">Imagen</label>
            <input type="file" class="form-control" id="file" name="file" required />
        </div>
            <input type="submit" name="submit" class="btn btn-success submitBtn" value="Guardar"/>
        </form>
    <div class="statusMsg"></div>
    </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>