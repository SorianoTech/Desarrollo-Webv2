<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Entrada por sessiones</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">                        
        <style>
            body{
                font-family: 'Poppins', sans-serif;
                background-color: #ffc5e8;
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
        </style>
        
    </head>
    <body>
        
        
        <form action="crear-session.php" method="POST">
            <fieldset>
                <legend>Entrada</legend>
                <input type="text" name="nombre" placeholder="nombre" value="" autofocus="" />
                <input type="password" name="pass" value="" placeholder="pass" />
                <input type="submit" value="Entrar">
            </fieldset>
        </form>

    </body>
</html>
