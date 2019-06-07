<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="main.css" rel="stylesheet" type="text/css" />
    <title>Fotos</title>
</head>
<body>
    <div class="jumbotron text-center">
        <h1>Slide de fotos con HTML + CSS + PHP</h1>
        <h3>Imágenes del mundo</h3> 
    </div>
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