<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Creamos un Rombo</title>
        
        <style>
            #cuadrado{
                line-height: 0px;
            }
            span{
                display: inline-block;
                width: 10px;
                height: 10px;
                margin: 0px;
                padding: 0px;
            }
            .rojo{
                background-color: #990000;
            }

            table, tr, td{
                border: 1px solid #212931;  
            }
            table{
                width: 100%;
            }
            tr:nth-child(even){
                background-color: #ffcccc;
            }
            td{
                height: 30px;
            }
        </style>
    </head>
    <body>
        <form action="rombo.php" method="post" accept-charset="utf-8">
            <input type="number" placeholder="Numero" name="numero">
            <input type="submit" value="Enviar">
        </form>

        <?
        //rombo normal // mal 
        $can = $_POST['numero'];
        $filas = 1;
        $columnas = 1;
        while ($filas <= (($can * 2) - 1)) {
            while ($columnas <= $can) {
                if ($filas <= $can) {
                    if ($columnas <= ($can - $filas)) {
                        echo '&nbsp';
                    } else {
                        echo '*';
                    }
                }
                if ($filas > $can) {
                    if ($columnas <= ($filas - $can)) {
                        echo '&nbsp';
                    } else {
                        echo '*';
                    }
                }
                ++$columnas;
            }
            $columnas = 1;
            echo '<br>';
            ++$filas;
        }
        ?>

        <br><br>


        <?
        //rombo abajo vacio
        $can = $_POST['numero'];
        $filas = 1;
        $columnas = 1;
        while ($filas <= (($can * 2) - 1)) {
            while ($columnas <= $can) {
                if ($filas <= $can) {
                    if ($columnas <= ($can - $filas)) {
                        echo '<span></span>';
                    } else {
                        echo '<span class="rojo"></span><span></span>';
                    }
                }
                if ($filas > $can) {
                    if ($columnas <= ($filas - $can)) {
                        echo '<span></span>';
                    } else {
                        if ($columnas <= (($filas - $can)) + 1 || ($columnas == $can)) {
                            echo '<span class="rojo"></span><span></span>';
                        } else {
                            echo '<span></span><span></span>';
                        }
                    }
                }
                ++$columnas;
            }
            $columnas = 1;
            echo '<br>';
            ++$filas;
        }

        //cuadrado hueco
        echo '<div id="cuadrado">';
        $filas = 1;
        $columnas = 1;
        while ($filas <= $can) {
            while ($columnas <= $can) {
                if (($filas == 1) || ($filas == $can) || ($columnas == 1) || ($columnas == $can)) {
                    echo '<span class="rojo"></span>';
                } else {
                    echo '<span></span>';
                }

                $columnas++;
            }
            $filas++;
            $columnas = 1;
            echo '<br>';
        }
        echo '</div>';
?>

    </body>
</html>