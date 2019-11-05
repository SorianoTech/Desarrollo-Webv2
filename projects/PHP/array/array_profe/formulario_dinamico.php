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
    </head>
    <body>
        <form method="post" action="formulario_dinamico2.php">
            <input name="liga" placeholder="Nombre Liga" type="text">
            <br>
            <br>
            <?
                $cantidad_equipos = 15;
                for ($i = 0; $i < $cantidad_equipos; $i++){
                    echo '<input type="text" placeholder="Nombre Equipo" name="equipos[]"><br>';
                }
            ?>
            <br>
            <br>
            <select name="categoria">
                <option value="1">Infantil</option>
                <option value="2">Adultos Feminas</option>
                <option value="3">Adultos Chicos</option>
                <option value="4">Alevín</option>
                <option value="5">Ninis</option>
            </select>
            
            <input type="submit" value="ENVIAR">
        </form>
    </body>
</html>

