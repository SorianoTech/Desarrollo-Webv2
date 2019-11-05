<?php include_once 'includes/datos.php'; ?>
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
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>

        <script>
            function abrir(dib) {
                $("#"+dib).css('display', 'block');
            }
        </script>

        <style>
            #profesores, #materias, #alumnos{
                display: none;
            }
            
            <?php
                if(isset($_GET['abrir'])){
                  echo "#" . $_GET['abrir'] . "{ display: block; }";
                }
            ?>
        </style>
    </head>
    <body>
        <header>

        </header>


        <section id="alta_profesor">
            <form method="post" action="guardar_profesor.php">
                <fieldset>
                    <legend>Nuevo Profesor/a <button onclick="abrir('profesores')">Abrir</button></legend>
                    <div id="profesores">
                        <input type="text" name="nombre" required="" maxlength="150" placeholder="Nombre completo profesor">
                        <input type="number" name="telefono" required="" maxlength="10" placeholder="Teléfono">
                        <input type="email" name="mail" required="" maxlength="150" placeholder="Correo / email">
                        <ul>
                            <?php
                            $sql = "SELECT * FROM materias order by materia";
                            $resultado = $mysqli->query($sql);
                            /* $fila = $resultado->fetch_assoc();
                              echo "<li><input required=\"\" type=\"checkbox\" value='".$fila['id']."' name=\"materia[".$fila['id']."]\">". $fila['materia'] ."</li>"; */
                            while ($fila = $resultado->fetch_assoc()) {
                                echo "<li><input type=\"checkbox\" value='" . $fila['id'] . "' name=\"materia[" . $fila['id'] . "]\">" . $fila['materia'] . "</li>";
                            }
                            ?>                    
                        </ul>
                        <input type="submit" value="Guardar">

                        <h3>Listado de Profesores</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>Nombre</th><th>Teléfono</th><th>Mail</th><th>Materias</th><th></th>
                                </tr>
                            </thead>
                            <?php
                            $sql = "select * from profesores order by nombre";
                            $resultado_profesores = $mysqli->query($sql);
                            while ($fila = $resultado_profesores->fetch_assoc()) {
                                echo "<tr><td>" . $fila['nombre'] . "</td><td>" . $fila['telefono'] . "</td><td>" . $fila['mail'] . "</td><td>";
                                $sql = "select materias.materia "
                                        . "from materias, profesores_materias "
                                        . "where materias.id = profesores_materias.materia and profesores_materias.profesor = " . $fila['id'];
                                $resultado_materias = $mysqli->query($sql);
                                while ($fila_materias = $resultado_materias->fetch_assoc()) {
                                    echo $fila_materias['materia'] . " ";
                                }
                                echo "</td><td>[ + ]</td></tr>";
                            }
                            ?>
                        </table>                    
                        </div>
                </fieldset>
            </form>
    </section>

    <section id="alta_materia">
        <form method="post" action="guardar_materia.php">
            <fieldset>
                <legend>Nueva materia <button onclick="abrir('materias')">Abrir</button></legend>
                <div id="materias">
                    <input type="text" name="materia" required="" maxlength="100" placeholder="Materia">
                    <input type="submit" value="Guardar">
                    <h3>Listado Materias</h3>
                    <ul>
                        <?php
                        $resultado->data_seek(0);
                        while ($fila = $resultado->fetch_assoc()) {
                            echo "<li>" . $fila['materia'] . "</li>";
                        }
                        ?>
                    </ul>     
                </div>
            </fieldset>
        </form>            
    </section>        

    <section id="alta_alumno">
            <form method="post" action="guardar_alumno.php">
                <fieldset>
                    <legend>Nuevo Alumno/a <button onclick="abrir('alumnos')">Abrir</button></legend>
                    <div id="alumnos">
                        <input type="text" name="nombre" required="" maxlength="150" placeholder="Nombre completo Alumno/a">
                        <input type="number" name="telefono" required="" maxlength="10" placeholder="Teléfono">
                        <input type="email" name="mail" required="" maxlength="150" placeholder="Correo / email">
                        <input type="submit" value="Guardar">

                        <h3>Listado de Alumnos/as</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>Nombre</th><th>Teléfono</th><th>Mail</th><th></th>
                                </tr>
                            </thead>
                            <?php
                            $sql = "select * from alumnos order by nombre";
                            $resultado_alumnos = $mysqli->query($sql);
                            while ($fila = $resultado_alumnos->fetch_assoc()) {
                                echo "<tr><td>" . $fila['nombre'] . "</td><td>" . $fila['telefono'] . "</td><td>" . $fila['mail'] . "</td><td>[ + ]</td></tr>";
                            }
                            ?>
                        </table>                    
                        </div>
                </fieldset>
            </form>        
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
