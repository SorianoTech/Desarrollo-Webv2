<?php include_once '../includes/datos.php';  ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Extranet Academía</title>
    </head>
    <body>
        <header>
            
        </header>
        
        <section id="alta_profesor">
            <form method="post" action="guardar_profesor.php">
                <fieldset>
                    <legend>Nuevo Profesor/a</legend>
                    <input type="text" name="nombre" required="" maxlength="150" placeholder="Nombre completo profesor">
                    <input type="number" name="telefono" required="" maxlength="10" placeholder="Teléfono">
                    <input type="email" name="mail" required="" maxlength="150" placeholder="Correo / email">
                    <ul>
                        <?php
                            $sql = "SELECT * FROM materias order by materia";
                            $resultado = $mysqli->query($sql);
                            while($fila = $resultado->fetch_assoc()){
                                echo "<li><input type=\"checkbox\" value='".$fila['id']."' name=\"materia[".$fila['id']."]\">". $fila['materia'] ."</li>";
                            }
                        ?>                    
                    </ul>
                    <input type="submit" value="Guardar">
                </fieldset>
            </form>
        </section>
        
        <section id="alta_materia">
            <form method="post" action="guardar_materia.php">
                <fieldset>
                    <legend>Nueva materia</legend>
                    <input type="text" name="materia" required="" maxlength="100" placeholder="Materia">
                    <input type="submit" value="Guardar">
                    <h3>Listado Materias</h3>
                    <ul>
                        <?php
                            $resultado->data_seek(0);
                            while($fila = $resultado->fetch_assoc()){
                                echo "<li>". $fila['materia'] ."</li>";
                            }
                        ?>
                    </ul>                    
                </fieldset>
            </form>            
        </section>        
        
        <section id="alta_alumno">
            
        </section>
        
        <section id="listado_profesor">
            
        </section>        
        
        
        <section id="listado_alumnos">
            
        </section>
        
        <section id="horarios">
            
        </section>        
        <footer>
            
        </footer>
        <?php
         
        ?>
    </body>
</html>
