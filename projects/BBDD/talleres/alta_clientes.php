<?
include './includes/prohibir.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title><? echo $nombre_taller ?></title>
        <link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />
        <!--<link rel="stylesheet" href="css/fluid.css" type="text/css" media="screen" charset="utf-8" />-->
        <link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
        <link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
    </head>
    <body>
        <h1 id="head"><? echo $nombre_taller ?></h1>

        <ul id="navigation">
            <li><span class="active"><a href="home.php">Inicio</a></span></li>
            <li><span class="active"><a href="alta_clientes.php">Alta Clientes</a></span></li>
            <li><a href="includes/cerrar_session.php">Cerrar Sesión</a></li>
        </ul>
        <div id="content" class="container_16 clearfix">
            <div class="grid_16">
                <h2>Alta Clientes</h2>
                <?php if(isset($_GET['error']) && $_GET['error'] == 1){ ?>
                    <p class="error">Datos erróneos</p>
                <?php } ?>
                <?php if(isset($_GET['error']) && $_GET['error'] == 2){ ?>
                    <p class="error">Algo ha pasado y el usuario no se ha dado de alta, es posible que ya este en la base de datos</p>
                <?php } ?>                    
            </div>
            <form method="post" action="includes/alta_clientes_guardar.php">
                <div class="grid_5">
                    <p>
                        <label for="dni">DNI/CIF</label>
                        <input type="text" name="dni" maxlength="12" minlength="5" required="" />
                    </p>
                </div>

                <div class="grid_5">
                    <p>
                        <label for="nombre">Nombre <small>Completo</small></label>
                        <input type="text" name="nombre" minlength="4" maxlength="150" required="" />
                    </p>

                </div>
                <div class="grid_5">
                    <p>
                        <label for="telefono">Telefono</label>
                        <input type="text" name="telefono" minlength="9" maxlength="20" required="" />
                    </p>

                </div>
                <div class="grid_5">
                    <p>
                        <label for="mail">Email</label>
                        <input type="email" name="mail" maxlength="150" required="" />
                    </p>
                </div>
                <div class="grid_5">
                    <p>
                        <label for="fecha_nacimiento">Fecha Nacimiento</label>
                        <input type="date" name="fecha_nacimiento" required="" />
                    </p>
                </div>                
                <div class="grid_5">
                    <p>
                        <label for="sexo">Tipo de Persona: (Física o Jurídica)</label>
                        Mujer: <input type="radio" value="0" name="sexo" required="">
                        Hombre: <input type="radio" value="1" name="sexo">
                        Empresa: <input type="radio" value="2" name="sexo">
                        Administración: <input type="radio" value="3" name="sexo">
                    </p>

                </div>                            

                <div class="grid_16">

                    <p class="submit">

                        <input type="submit" value="Crear Usuario" />
                    </p>
                </div>
            </form>
        </div>

        <div id="foot">
            <a href="https://www.ciberweb.com">Desarrollo: www.ciberweb.com</a>
        </div>
    </body>
</html>