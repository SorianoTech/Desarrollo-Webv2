<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link href="main.css" rel="stylesheet" type="text/css" />
    <title>Fotos</title>
</head>
<body>
    <header>
    <div class="jumbotron text-center">
        <h1>Slide de fotos con HTML + CSS + PHP</h1>
        <h3>Imágenes del mundo</h3> 
    </div>
        <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            Álbum</button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Tailandia</a>
              <a class="dropdown-item" href="#">México</a>
              <a class="dropdown-item" href="#">Irlanda</a>
            </div>
        </div>    
    </header>    
    <section id="main">
    <div class="container">
        <!-- Contenido aqui -->
        <?php
            $foto = $_GET['num'];
            echo '<img src="img/'.$foto.'.jpeg" height="20%" width="20%"><p>Imagen '.$foto.'</p>';
        ?>
        
        <ul>
            <li><button type="button" class="btn btn-outline-primary"><a href="fotos.php?num=<?php echo ($foto-1) ?>">Anterior</a></button></li>
            <li><button type="button" class="btn btn-outline-primary"><a href="fotos.php?num=<?php echo ($foto+1) ?>">Siguiente</a></button></li>
        </ul>
    </div>
</section>
<footer>

</footer>

   
</body>
</html>