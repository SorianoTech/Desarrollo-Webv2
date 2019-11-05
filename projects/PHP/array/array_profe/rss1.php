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
        <?
        $all_api_call = simplexml_load_file('https://as.com/rss/ciclismo/portada.xml'); 
        echo '<pre>';
        var_dump($all_api_call);
        echo '</pre>';
        ?>
    </body>
</html>
