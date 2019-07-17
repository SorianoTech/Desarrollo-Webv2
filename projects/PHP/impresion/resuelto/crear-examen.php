<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <style>
            .operacion{
                width: 22%;
                float: left;
                background-color: #e1e1e1;
                border: 1px solid #212931;
                padding: 10px;
            }
        </style>
    </head>
    <body>
    <!--Creamos un formulario con option para indicar la cantidad de frigras que queremos que tengas las operaciones-->
        <form method="post" action="crear-examen.php">
            <select name="dificultad">
                <option value="9">1 Cifra</option>
                <option value="99">2 Cifra</option>
                <option value="999">3 Cifra</option>
                <option value="9999">4 Cifra</option>
            </select>
            <input type="number" placeholder="Cantidad" name="cantidad">
            <input type="submit" value="CREAR EXAMEN">
        </form>
        
        
        
        
        <? //Primero comprobamos que tenemos un valor recibido por el método POST, sino no pintamos los ejercicios
            if(!empty($_POST['dificultad'])){ 
                //Guardamos los valores en variables
                $cantidad = $_POST['cantidad'];
                $dif = $_POST['dificultad'];
        ?>
        <!--Creamos otro formulario en que vamos a pasar los valores y tendremos un botón que llamara al fichero resultado, tambien nos servirá para pintar los valores de las sumas creando un bucle for-->
                <form method="post" action="resultado-examen.php">
                    <? for($i = 0; $i < $cantidad; $i++){ ?>
                    <div class="operacion">
                        <? 
                            $num1 = rand(0, $dif);
                            $num2 = rand(0, $dif);
                        ?>
                        <!--Pasamos los valores en una array hiden para poder comprobar los reulstados-->
                        <input type="hidden" name="num1[]" value="<? echo $num1; ?>">
                        <input type="hidden" name="num2[]" value="<? echo $num2; ?>">
                        <table>
                            <tr><td><? echo $num1; ?></td></tr>
                            <tr><td><? echo $num2; ?></td></tr>
                            <tr><td>_______</td></tr>
                            <tr><td><input type="number" name="resultado[]"></td></tr>
                        </table>
                        
                    </div>
                    <? } ?>
                    <input type="submit" value="VER NOTA">
                </form>
        <? } ?>
        
    </body>
</html>
