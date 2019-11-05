<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Fideliza Talleres</title>
        <link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />
        <!--<link rel="stylesheet" href="css/fluid.css" type="text/css" media="screen" charset="utf-8" />-->
        <link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
        <link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
    </head>
    <body>
        <h1 id="head">Fideliza Talleres</h1>
        <ul id="navigation">

        </ul>
        <div id="content" class="container_16 clearfix">
            <form method="post" action="includes/entrada.php">
                <div class="grid_16">
                    <h2>Entrada Extranet Talleres</h2>
                    <?
                        if(isset($_GET['error']) and $_GET['error'] == 1){
                            echo '<p class="error">Datos incorrectos...</p>';
                        }
                    ?>
                </div>

                <div class="grid_5">
                    <p>
                        <label for="mail">Mail:</label>
                        <input type="mail" name="mail" required="" maxlength="150" />
                    </p>
                </div>

                <div class="grid_5">
                    <p>
                        <label for="pass">Pass</label>
                        <input type="pass" name="pass" required="" maxlength="20" />
                    </p>

                </div>


                <div class="grid_16">
                    <p class="submit">
                        <input type="submit" value="Entrar" />
                    </p>
                </div>
            </form>
        </div>

        <div id="foot">
            <a href="#">Contact Me</a>
        </div>
    </body>
</html>