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

        <form action="config.php" method="get">
            First name: <input type="text" name="fname"><br>
            Last name: <input type="text" name="lname"><br>
            <button type="submit">Enviar correo</button><br>
            <button type="submit" formaction="/action_page2.php">Submit to another page</button>
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
