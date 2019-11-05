<?php
    $porcentajes;
    if(!empty($_POST['partidos'])){ 

        $total = 0;
        for($i = 0; $i < $_POST['cantidad']; $i++){
            $total += $_POST['votos'][$i];
        }
        for($i = 0; $i < $_POST['cantidad']; $i++){
            $porcentajes[$i] = ($_POST['votos'][$i] * 100) / $total;
        }                    
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio Votos</title>
        <link href="css/votos.css" rel="stylesheet" type="text/css"/>
        <style>
            <? 
                if(!empty($_POST['partidos'])){ 
                    for($i = 0; $i < $_POST['cantidad']; $i++){
            ?>
                        #partido_<? echo $i; ?>{
                            height: <? echo $porcentajes[$i] * 10; ?>px;
                            background-color: rgba(<? echo rand(0,255); ?>, <? echo rand(0,255); ?>, <? echo rand(0,255); ?>);
                        }
                        #resultados .barras{
                            width: <? 
                                $por = 90 / $_POST['cantidad'];
                                echo  $por;
                            ?>%;
                        }
            <? 
                    }
                }
            ?>
        </style>
    </head>
    <body>
        <h1>Resultados Electorales</h1>

        <div id="formulario_necesidades">
            <form method="post" action="votos.php">
                <input type="number" name="cantidad" placeholder="Cantidad de Partidos">
                <input type="submit" value="Enviar">
            </form>
        </div>



        <? if(!empty($_POST['cantidad'])){ ?>
            <div id="formulario">
                <form method="post" action="votos.php">
                    <input type="hidden" name="cantidad" value="<? echo $_POST ['cantidad']; ?>">
                    <?
                    for($i = 0; $i < $_POST['cantidad']; $i++){
                        if(!empty($_POST['partidos'])){
                            echo '<input type="text" name="partidos['.$i.']" value="'.$_POST['partidos'][$i].'" placeholder="Nombre Partido">';
                            echo '<input type="number" name="votos['.$i.']" value="'.$_POST['votos'][$i].'" placeholder="Votos"><br>';
                        } else {
                            echo '<input type="text" name="partidos['.$i.']" placeholder="Nombre Partido">';
                            echo '<input type="number" name="votos['.$i.']" placeholder="Votos"><br>';
                        }
                    }
                    ?>
                    <input type="submit" value="Enviar">
                </form>
            </div>
            <? 
                if(!empty($_POST['partidos'])){      
            ?>
                    <div id="resultados">
                        <? for($i = 0; $i < $_POST['cantidad']; $i++){ ?>
                            <div class='barras' id="partido_<? echo $i; ?>">
                                <? echo round($porcentajes[$i],1); ?>%
                                <br>
                                <strong>
                                    <? echo $_POST['partidos'][$i]; ?>
                                </strong>
                            </div>
                            <div class="borrar"></div>
                        <? } ?>
                    </div>
            <? 
                } 
            }
            ?>
    </body>
</html>