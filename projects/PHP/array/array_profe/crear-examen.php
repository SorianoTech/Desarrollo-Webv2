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
        
        
        
        
        <? 
            if(!empty($_POST['dificultad'])){ 
                $cantidad = $_POST['cantidad'];
                $dif = $_POST['dificultad'];
        ?>
                <form method="post" action="resultado-examen.php">
                    <? for($i = 0; $i < $cantidad; $i++){ ?>
                    <div class="operacion">
                        <? 
                            $num1 = rand(0, $dif);
                            $num2 = rand(0, $dif);
                        ?>
                        
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
