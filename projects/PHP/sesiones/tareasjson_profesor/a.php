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
            echo '<pre>';
            $json = file_get_contents('usuarios.json');
            $json = json_decode($json, true);
            
            print_r($json);
            
            foreach ($json['usuarios'] as $key => $value) {
                echo $key;
                echo '<br>';
                print_r($value);
                echo '<br>';
                echo $value['nombre'];
            }
        ?>
        </pre>
    </body>
</html>
