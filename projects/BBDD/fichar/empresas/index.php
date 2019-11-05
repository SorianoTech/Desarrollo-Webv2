<?php
    session_start(); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gestión Empleados</title>
        <script>
            function registros(empleado){
              miVentana = window.open( "horarios.php?id=" + empleado, "Registros", "width=380,height=500, top=85,left=50");
            }            
        </script>
    </head>
    <body>
        <?php
            if(!empty($_SESSION['id_empresa'])){
                include '../includes/datos.php';
                echo "<h1>" .  $_SESSION['nombre_empresa'] . "</h1>";
        ?>
                <a href="cerrar_session.php">Cerrar</a>
                
                <div id="altas">
                    <form method="post" action="guardar_empleado.php">
                        <fieldset>
                            <legend>Nuevo Emplead@</legend>
                            <label>
                                <input type="text" placeholder="Nombre" name="nombre" maxlength="150" required="">
                            </label>
                            <label>
                                <input type="email" placeholder="email" name="mail" maxlength="150" required="">
                            </label>                            
                            <input type="submit" value="Crear Usuario">
                        </fieldset>
                    </form>
                </div>
                
                <div id='listado'>
                    <ul>
                        <?php 
                            $query = "select * from empleados where empresa = " . $_SESSION['id_empresa'] . " order by id desc";
                            $resultado = $mysqli->query($query);
                            while($fila = $resultado->fetch_assoc()){
                                echo "<li><strong>".$fila['nombre']."</strong> " . $fila['mail'] . " " . $fila['pass'] . " <button onclick='registros(".$fila['id'].")'>Ver Registros</button></li>";
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
