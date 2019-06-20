<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<link href="main_imc.css" rel="stylesheet" type="text/css"/>
        <title>IMC</title>
    </head>
    <body>
        <?php
        if($_POST){
            $peso = $_POST['peso'];
            $talla = $_POST['talla'];

            $imc = $peso/($talla*$talla);

            if($imc < 18.5){
                $mensaje = "Tu peso se encuentra por debajo de lo saludable.";
                $img = "bajoPeso";
                $color = "red";
            }elseif(($imc >= 18.5) && ($imc <= 29.9)){
                $mensaje = "Te encuentra en el peso ideal.";
                $img = "pesoIdeal";
                $color = "green";
            }elseif(($imc > 29.9) && ($imc <= 34.9)){
                $mensaje = "Sufres de obesidad clase I.";
                $img = "obesidadC1";
                $color = "red";
            }elseif(($imc > 34.9) && ($imc <= 39.9)){
                $mensaje = "Sufres de obesidad clase II";
                $img = "obesidadC2";
                $color = "red";
            }else{
                $mensaje = "Sufres de obesidad clase III.";
                $img = "obesidadC3";
                $color = "red";
            }
        }
    ?>
            <style>
                #barra_color{
                    background-color: <?php echo $color; ?>;
                    
                }
            </style>
        <section>
        <div class="container">
            <form action="index.php" method="post">
                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Altura</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="talla" placeholder="1.40">
                </div>

                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">Peso</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="peso" placeholder="70">
                </div>
                <input type="submit" value="Calcular">  
            </form>
            <aside>
                <div id="barra_color">&nbsp;</div>
                <p>Tienes un Índice de Masa Corporal de <?php if($_POST){ echo $imc;} ?></p>
                <img src="img/<?php echo $img; ?>.jpg" alt="imc">
            </aside>    
        </div>
        </section>
    </body>
</html>
