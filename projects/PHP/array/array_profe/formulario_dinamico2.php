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
        if(!empty($_POST['equipos'])){
            foreach ($_POST['equipos'] as $key => $value) {
                if($value != ''){
                    echo $key . ' --- ' . $value . '<br>';
                }
            }
            
            for ($i = 0; $i < count($_POST['equipos']); $i++){
                if($_POST['equipos'][$i] != ''){
                    echo $i . ' --- ' . $_POST['equipos'][$i] . '<br>';
                }                
            }
            
            
            
        }
        
        if($_POST['categoria'] == 1){
            echo 'somos niños infantiles';
        } else if($_POST['categoria'] == 2){
            echo 'somos niños infantiles';
        }
        
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        ?>
    </body>
</html>
