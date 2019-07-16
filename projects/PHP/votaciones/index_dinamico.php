<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Votaciones</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link href="main_votaciones.css" rel="stylesheet" type="text/css"/>
        <?
        //$cantidad = $_POST['cantidad'];
        $partido = $_POST['partido'];
        $votos = $_POST['votos'];
        $totales = 0;
        ?>
    </head>
    <body>
        <header>
        </header>
        <h2>Por acabar:</h2>
        - Eliminar errores de las variables no definidas antes de empezar.
        
        <section id="partidos" class="container">
            <div class="row">
                    <div class="col" id="recuento_votos">
                        <h2>Recuento Votos</h2>
                        <!--FORMULARIO PARA CAPTAR LA CANTIDAD DE PARTIDOS-->
                        <form action="index_dinamico.php" method="post">
                            Introduce el número de partidos políticos:
                            <input type="number" name="cantidad" placeholder="Cantidad Partidos">
                            <p><input type="submit" value="Mostrar" class="btn btn-primary"></p>
                            <br>
                        </form>  

                        <?
                        //Formulario dinámico par introducir los partidos, solo si tengo un valor en cantidad
                        if(!empty($_POST['cantidad'])){ 
                            //if ($cantidad!=0) {
                            echo '<br><p>Introduce el nombre de los partidos:</p>';?>
                            <form action="index_dinamico.php" method="post">
                                <input type="hidden" name="cantidad" value="<? echo $_POST ['cantidad']; ?>">
                                <table>
                                    <?
                                    for ($i=1; $i <=$_POST['cantidad'] ; $i++) {
                                        echo '<tr>';
                                        echo '<td><input type="text" name="partido[]" placeholder="Partido '.$i.'"></td>';
                                        echo '<td><input type="number" name="votos[]" placeholder="Votos '.$i.'"></td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </table>
                                <p><input type="submit" value="Calcular" class="btn btn-primary"></p>
                                <?}?>
                            </form>
                    </div>

                    <!--RESULTADOS-->
                    <div class="col" id="resultado_votos">
                        <h2>Resultados de votos</h2> <br/> 
                        <? //imprimo los partidos y calculo los porcentajes
                        if(isset($partido)){
                            //Calculo de totales
                            for ($i=0; $i <count($partido); $i++) { 
                                $totales+=$votos[$i];
                                echo $partido[$i];
                                echo '<br>';
                            }
                            //Porcentajes
                            for ($i=0; $i <count($partido) ; $i++) { 
                                $porcentaje[$i]=round(($votos[$i]*100)/$totales);
                            }
                        ?>
                    </div>   
                    <div class="col" id="porcentaje_votos">
                        <h2>Porcentajes Visual:</h2> <br/>
                        <?
                        for ($i=0; $i <count($partido) ; $i++) { 
                            echo '<div id="'.$partido[$i].'" style="width:'.$porcentaje[$i].'%;background-color:rgb('.mt_rand(0,255).','.mt_rand(0,255).','.mt_rand(0,255).')">'.$porcentaje[$i].'%</div>';
                        }
                        }
                        ?>
                    </div>
            </div>

            <h2 id="pie">Votos totales <?php echo $totales; ?>
        </section>
    </body>
</html>
