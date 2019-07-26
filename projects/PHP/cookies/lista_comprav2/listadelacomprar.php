<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mi lista de la compra</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">                
        <style>
            body{
                font-family: 'Poppins', sans-serif;
                background-color: #FEEE03;
            }
            form fieldset{
                width: 50%;
                margin: auto;
                padding: 10px;
                background-color: beige;
                border-radius: 5px;
                border: 1px bisque solid;
                margin-top: 15px;
                margin-bottom: 20px;
            }
            form fieldset legend{
                background-color: beige;
                border-radius: 5px;
                border: 1px bisque solid;
                padding: 5px;
                background-color: burlywood;
            }
            input{
                display: block;
                margin: 6px;
                padding: 3px;
            } 
            ul{
                margin: 0px;
                padding: 0px;
                list-style: none;
                background-color: #ffc5e8;
            }
            li{
                box-sizing: border-box;
                width: 100%;
                padding: 4px;
                border: 2px solid #505050;
                border-bottom: 0px;
                width: 100%;
                background-color: #FFFFFF;
            }

            li:first-child{
                border-radius: 6px 6px 0px 0px;
            }
            li:last-child{
                border-radius: 0px 0px 6px 6px;
                border-bottom: 2px solid #505050;
            }
            li:nth-child(odd){
                background-color: #fff1f7;
            }
            li:hover{
                background-color: #ffcccc;
            }            
            li .nombre{
                width: 85%;
                display: inline-block;
            }
            .tachar{
                text-decoration:line-through;
            }
            i{
                margin: 4px;
            }
            a i {
                text-decoration: none;
                color: #990000;
            }
            
        </style>
    </head>
    <body>
        <form action="nuevo_producto.php" method="POST">
            <fieldset>
                <legend>Añadir producto</legend>
                <input type="text" name="producto" value="" autofocus="" />
                <input type="submit" value="Añadir producto">
            </fieldset>
        </form>
        
        
        <ul>
            <? 
            
            if(!empty($_COOKIE['productos']) && count($_COOKIE['productos']) > 0){
                $array_p = $_COOKIE['productos']; 
                $array_e = $_COOKIE['estados'];
                asort($array_e);
                foreach ($array_e as $key => $value) {
                    echo "<li><div class='nombre ";
                    if($value == 1){
                        echo " tachar";
                    }
                    echo "'>".$array_p[$key]."</div>";
                    if($value == 0){
                        echo "<a href='comprar.php?key=".$key."'><i class='fas fa-shopping-basket'></i></a>";
                    }
                    
                    if($value == 1){
                        echo "<a href='activar.php?key=".$key."'><i class='fas fa-redo-alt'></i></a>";
                        echo "<a href='borrar.php?key=".$key."'><i class='fas fa-trash-alt'></i></a>";
                    }
                    echo "</li>";
                    
                }
            } else {
                echo '<li>Aún no ha incorporado nada a su lista de la comprar</li>';
            }
            ?>
        </ul>
        <center>
            <br>
            <small>Patrocinado por:</small>
            <br>
            <img src="https://maresmadrid.es/wp-content/uploads/2018/10/La-Osa-1280x720-1024x576.jpg" style= "width: 200px;
  height: 100px"> 
        </center>
    </body>
</html>
