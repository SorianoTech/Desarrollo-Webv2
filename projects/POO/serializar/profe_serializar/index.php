<?php
    include_once './tabla.php';
    include_once '../../../servidores/includes/datos.php';
?>
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
        <?php
            $datos = file_get_contents("mitabla2.txt");
            $mitablarecuperada = unserialize($datos);
            
            $mitablarecuperada->pintar();
            
            
            $datos = $mysqli->query("select * from logs where id = 15");
            $fila = $datos->fetch_assoc();
            $mitablarecuperada = unserialize($fila['log']);
            $mitablarecuperada->pintar();
        ?>
    </body>
</html>
