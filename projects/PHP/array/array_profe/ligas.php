<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>GENERADOR DE LIGAS</title>
        
        <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
        
        <style>
            body{
                font-family: 'Oswald', sans-serif;
                background-color: #ff6666;
            }
            
            section{
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                width: 80%;
                margin: auto;
                background-color: #FFFFFF;
                margin-top: 25px;
                border-radius: 10px;
            }            
            .jornada{
                width: 18%;
                padding: 10px;
                margin: 10px;
                box-sizing: border-box;
                border: 1px solid #000000;
                border-radius: 3px;
                text-align: center;
            }
            .jornada h1{
                background-color: #ffcccc;
            }
        </style>
    </head>
    <body>
        <form method="post" action="ligas.php">
            <input type="number" name="cantidad">
            <input type="submit" value="ENVIAR">
        </form>
        
        <? if(!empty($_POST['cantidad']) && $_POST['cantidad'] >= 3){ ?>
        <form method="post" action="ligas.php">
            <? for($i = 0; $i < $_POST['cantidad']; $i++){ ?>
            <p><input type="text" name="equipos[<? echo $i; ?>]"></p>
            <? } ?>
            <input type="submit" value="ENVIAR">
        </form>        
        <? } ?>
        
        
        
        
        <section>
        <?php
        
        
            //seguimos el algoritmo expuesto en: http://foros.acb.com/viewtopic.php?t=64519
        
            function pintar_jornada($locales, $visitantes){
                static $jornada = 1;
                echo '<div class="jornada"><h1> JORNADA ' . $jornada . '</h1>';
                $cuantos = count($locales);
                
                for($i = 0; $i < $cuantos; $i++){
                    echo '<p>' . $locales[$i] . ' <---> ' . $visitantes[$i] . '</p>';
                }
                echo "</div>";
                $jornada++;
            }
            
            

            if(!empty($_POST['equipos']) && count($_POST['equipos']) >= 3){
                $equipos = $_POST['equipos'];
                
                //GENERAMOS UN EQUIPOS MÁS SI SON IMPARES
                if((count($equipos) % 2) != 0){
                    $equipos[count($equipos)] = 'DESCANSO';
                }                
                
                //GENERAMOS 2 ARRAYS DE LOCALES Y VISITANTES Y HACEMOS EL REPARTO DE LA PRIMERA JORNADA
                $locales;
                $visitantes;
                $locales_p;
                $visitantes_p;                
                $key = 0;
                for($i = 0; $i < count($equipos); $i+=2){
                    $locales[$key] = $equipos[$i];
                    $visitantes[$key] = $equipos[$i+1];
                    $locales_p[$key] = '';
                    $visitantes_p[$key] = '';
                    ++$key;
                }

                
                //GENERAR LAS JORNADAS
                pintar_jornada($locales, $visitantes);
                $cantidad_locales = count($locales);
                for($j = 2; $j < count($equipos) ; $j++){
                    if(($j % 2) == 0){
                        $locales_p[$cantidad_locales-1] = $visitantes[0];
                        $visitantes_p = $locales;
                        for($p = 1; $p < $cantidad_locales; $p++){
                            $locales_p[$p-1] = $visitantes[$p];
                        }                        
                    } else {
                        $visitantes_p[0] = $locales[$cantidad_locales-1];
                        for($p = 1; $p < $cantidad_locales - 1; $p++){
                            $visitantes_p[$p] = $locales[$p];
                        }
                        for($p = 0; $p < $cantidad_locales - 1; $p++){
                            $locales_p[$p+1] = $visitantes[$p];
                        }
                    }
                    
                    $locales = $locales_p;
                    $visitantes = $visitantes_p;
                    pintar_jornada($locales, $visitantes);   
                }
            }
        ?>
        </section>
    </body>
</html>
