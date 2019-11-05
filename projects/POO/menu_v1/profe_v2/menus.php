<?php 
include_once './menu.php';
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
        
        <link href="css_menus.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        
        <?php
        $menu_principal = new menu('estilo_principal', "http://35.180.252.132/~alfonso/php/poo/json_menus/principal.json");
        //$menu_principal->pintar();
        
        $menu_pie = new menu('estilo', "http://35.180.252.132/~alfonso/php/poo/json_menus/pie.json");
        //$menu_pie->pintar();
        
        ?>
    </body>
</html>

