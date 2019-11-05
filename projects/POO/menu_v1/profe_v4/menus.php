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
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>        
    </head>
    <body>

        <?php
        $menu_normal = new menu("http://35.180.252.132/~alfonso/php/poo/json_menus/principal.json");
        $menu_normal->pintar();
        
        $menu_cssmenu = new cssmenu("http://35.180.252.132/~alfonso/php/poo/json_menus/principal.json");
        $menu_cssmenu->pintar2();
        
        ?>
        <nav style="max-width: 150px">
        <?php
        $menu_jqueryui = new jqueryuimenu("http://35.180.252.132/~alfonso/php/poo/json_menus/principal.json");
        $menu_jqueryui->pintar2('menu');        
        
        $menu_jqueryui2 = new jqueryuimenu("http://35.180.252.132/~alfonso/php/poo/json_menus/pie.json");
        $menu_jqueryui2->pintar2('pepito');  
        ?>
        </nav>

    </body>
</html>

