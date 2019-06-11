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
    <?php
    $country = $_GET['country'];  // Guardamos el pais en la variable opcion
    $foto = $_GET['im']; // Guardamos en la variable la imagen
    ?>
    <header id="main_cabecera">
    <div class="jumbotron text-center" id="cabecera">
        <h1>Slide de fotos con HTML + CSS + PHP</h1>
        <h3>Imágenes del mundo</h3> 
    </div>
        <nav id="menu">
            <form action="fotos.php" method="get">
                <select id="custom_select" name="country">
                    <option value="0">Selecciona el Álbum</option>
                    <option value="1">México</option>
                    <option value="2">Tailandia</option>
                    <option value="3">Irlanda</option>
                </select>
            <input type="hidden" name="im" value="0" />   
            <input type="submit" value="Seleccionar el Pais" />
            </form>
        </nav>    
    </header>    
    <section id="main_contaier">
        <div class="container">
            <!-- Contenido aquí -->
            <?php        
                    echo '<img src="img/'.$country.'/'.$foto.'.jpeg" height="20%" width="20%"><p>Imagen '.$foto.'</p>';
                    echo '<ul>';
                        echo '<li><button type="button" class="btn btn-outline-primary"><a href="fotos.php?im='.($foto+-1).'&country='.$country.'">Anterior</a></button></li>';
                        echo '<li><button type="button" class="btn btn-outline-primary"><a href="fotos.php?im='.($foto+1).'&country='.$country.'">Siguiente</a></button></li>';
                    echo '</ul>';
                ?>
        </div>
    </section>
<footer>

</footer>

   
</body>
</html>