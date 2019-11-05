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
            $mitabla = new tabla(8,10);
            $mitabla->pintar();
            $mitabla2 = new tabla(15,100);
            $mitabla2->pintar();


            $objetoserialiado = serialize($mitabla2);
            file_put_contents('mitabla2.txt', $objetoserialiado);
            
            $sql = "INSERT INTO logs (log, proyecto) VALUES ('".$objetoserialiado."', 9)";
            $mysqli->query($sql);
        ?>
    </body>
</html>
