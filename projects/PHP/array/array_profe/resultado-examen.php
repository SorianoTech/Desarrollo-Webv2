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
            .error{
                background-color: #ff6666;
            }
            .ok{
                background-color: #009933;
            }
        </style>        
    </head>
    <body>
        
        <? 
            if(!empty($_POST['resultado'])){ 
                $cantidad = count($_POST['num1']);
        ?>
                
                <? 
                for($i = 0; $i < $cantidad; $i++){ 
                    $clase = 'error';
                    if(($_POST['num1'][$i] + $_POST['num2'][$i]) == $_POST['resultado'][$i]){
                        $clase = 'ok';
                    }
                ?>
                    <div class="operacion <? echo $clase; ?>">
                        <table>
                            <tr><td><? echo $_POST['num1'][$i]; ?></td></tr>
                            <tr><td><? echo $_POST['num2'][$i]; ?></td></tr>
                            <tr><td>_______</td></tr>
                            <tr><td><? echo $_POST['resultado'][$i]; ?></td></tr>
                            <? 
                             if($clase == 'error'){
                                 $res = $_POST['num1'][$i] + $_POST['num2'][$i];
                                 echo '<tr><td><strong>' . $res  . '</strong></td></tr>';
                             }
                            ?>
                        </table>

                    </div>
                <? } ?>
        <? } ?>        
        
        
        
        
        <pre>
        <?php
        print_r($_POST);
        ?>
        </pre>
    </body>
</html>
