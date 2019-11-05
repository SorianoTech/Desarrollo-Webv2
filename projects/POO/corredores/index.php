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
        include ('../datos.php');
        $datos = file_get_contents("corredores.txt");
        $datos = unserialize($datos);
        //gettype($datos);
        $mitabla = new tabla ($datos);
        $mitabla ->pintar();
        
        ?>
    </body>
</html>
