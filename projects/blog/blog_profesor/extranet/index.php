<?
    if(isset($_COOKIE['usuario']) and $_COOKIE['usuario'] > 0){
        header("Location: posts.php");
        exit();
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Zona Privada</title>
        <link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />
        <link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
        <link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
        <!--[if IE]><![if gte IE 6]><![endif]-->
        <script src="js/glow/1.7.0/core/core.js" type="text/javascript"></script>
        <script src="js/glow/1.7.0/widgets/widgets.js" type="text/javascript"></script>
        <link href="js/glow/1.7.0/widgets/widgets.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript">
            glow.ready(function () {
                new glow.widgets.Sortable(
                        '#content .grid_5, #content .grid_6',
                        {
                            draggableOptions: {
                                handle: 'h2'
                            }
                        }
                );
            });
        </script>
        <!--[if IE]><![endif]><![endif]-->
    </head>
    <body>

        <h1 id="head">Zona Extranet</h1>



        <div id="content" class="container_16 clearfix">
            <div class="grid_5">


                <div class="box">
                    
                </div>
            </div>
            <div class="grid_6">

                <div class="box">
                    <h2>Entrar</h2>
                    <form action="abrir-sesion.php" method="post">
                        <p>
                            <label for="nombre">nombre</label>
                            <input type="text" name="nombre" />
                        </p>
                        <p>
                            <label for="pass">pass</label>
                            <input type="password" name="pass">
                        </p>
                        <p>
                            <input type="submit" value="Entrar" />
                        </p>
                    </form>
                </div>
            </div>
            <div class="grid_5">

                <div class="box">

                </div>
            </div>
        </div>
        <div id="foot">
            <div class="container_16 clearfix">
                <div class="grid_16">
                    <a href="#">Contact Me</a>
                </div>
            </div>
        </div>
    </body>
</html>