<?php
    session_start(); 
    $tipos[1] = 'Trabajando';
    $tipos[2] = 'Descansando';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gestión Empleados</title>
    </head>
    <body>
        <?php
            if(!empty($_SESSION['id_empleado'])){
                include '../includes/datos.php';
                echo "<h1>" .  $_SESSION['nombre_empleado'] . "</h1>";
        ?>
                <a href="cerrar_session.php">Cerrar</a>
                
                <div id="altas">
                    <form method="post" action="fichar.php">
                        <input type="hidden" name="tipo" value="1">
                        <input type="submit" value=" TRABAJANDO ">
                    </form>
                    <form method="post" action="fichar.php">
                        <input type="hidden" name="tipo" value="2">
                        <input type="submit" value=" DESCANSANDO ">
                    </form>                    
                </div>
                
                <div id='listado'>
                    <h2>Últimas entradas:</h2>
                    <ul>
                        <?php 
                            $query = "select * from fichas where empleado = " . $_SESSION['id_empleado'] . " order by id desc";
                            $resultado = $mysqli->query($query);
                            while($fila = $resultado->fetch_assoc()){
                                echo "<li><strong>".$fila['fecha']."</strong> : " . $tipos[$fila['tipo']] . "</li>";
                            }
                        ?>
                    </ul>
                </div>
        <?php
            } else {
        ?>
                <form method="post" action="conectar.php">
                    <fieldset>
                        <legend>Conectar:</legend>
                        <label>
                            <input type="email" placeholder="mail" required="" maxlength="150" name="mail">
                        </label>
                        <label>
                            <input type="password" required="" maxlength="25" placeholder="pass" name="pass">
                        </label>
                        <input type="submit" value="Enviar">
                    </fieldset>
                </form>
        <?
            }
        ?>
        
        
        
        <?php
        // put your code here
        ?>
    </body>
</html>
