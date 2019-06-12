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
        <?php
                $psoe= $_POST['psoe'];
                $pp = $_POST['pp'];
                $ciu= $_POST['ciu'];
                $up= $_POST['up'];
                $total = $psoe+$pp+$ciu+$up;
                
                //Calculos
                $psoe_perc= ($psoe*100)/$total;
                $pp_perc= ($pp*100)/$total;
                $ciu_perc= ($ciu*100)/$total;
                $up_perc= ($up*100)/$total;
    ?>
        <style>
            #porcentaje_votos #pp{
                width:<?php echo round($pp_perc);?>%;
            }
            #porcentaje_votos #psoe{
                width:<?php echo round($psoe_perc);?>%;
            }
            #porcentaje_votos #up{
                width:<?php echo round($up_perc);?>%;
            }
            #porcentaje_votos #ciu{
                width:<?php echo round($ciu_perc);?>%;
            }
        </style>
    </head>
    <body>
    
        
        <header>
            <h1> Recuento de votos
        </header>
        <section id="partidos" class="container">
            <div class="row">
                <div class="col" id="recuento_votos">
                <h2>Recuento Votos</h2>
                    <form action="index.php" method="post">
                        <input type="number" name="psoe" placeholder="PSOE">
                        <input type="number" name="ciu" placeholder="Ciudadanos">
                        <input type="number" name="pp" placeholder="PP">
                        <input type="number" name="up" placeholder="Unidas Podemos">
                        <p><input type="submit" value="Calcular" class="btn btn-primary"></p>
                    </form>
                </div>
                <div class="col" id="resultado_votos">
                    <h2>Resultados de votos:</h2> <br/>    
                    <p>Porcentaje PSOE: <?php echo round($psoe_perc);?>%
                    <p>Porcentaje PP: <?php echo round($pp_perc);?>%   
                    <p>Porcentaje Ciudadanos: <?php echo round($ciu_perc);?>% 
                    <p>Porcentaje Unidas Podemos: <?php echo round($up_perc);?>%   
                 </div>
                 <div class="col" id="porcentaje_votos">
                    <h2>Porcentajes Visual:</h2> <br/>    
                    <p id="psoe"><?php echo round($psoe_perc);?>%</p>
                    <p id="pp"> <?php echo round($pp_perc);?>%</p>   
                    <p id="ciu"><?php echo round($ciu_perc);?>%</p> 
                    <p id="up"><?php echo round($up_perc);?>%</p>   
                 </div>
            </div>
            
            <hr/>
            <h2 id="pie">Votos totales <?php echo $total;?>
                
        </section>
    </body>
</html>
