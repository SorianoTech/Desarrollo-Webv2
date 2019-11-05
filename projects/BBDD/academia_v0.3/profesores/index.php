<?php
session_start();
include_once '../includes/datos.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>PROFESORES</title>
    </head>
    <body>
        <?php
        //print_r($_SESSION);
        if (isset($_SESSION['idprofesor'])) {
            ?>
            <h1>Bienvenid@ <?php echo $fila['nombre']; ?>!</h1>
            <form method="post" action="tutorias_profesores.php">
                <fieldset>
                    <legend>NUEVA TUTORIAS</legend>
                    <input type="date" name="fecha" required="" placeholder="fecha" autofocus="">
                    <select name="hora">
                        <option value="8">8 am</option>
                        <option value="9">9 am</option>
                        <option value="10">10 am</option>
                        <option value="11">11 am</option>
                        <option value="12">12 am</option>
                        <option value="14">14 pm</option>
                        <option value="15">15 pm</option>
                        <option value="16">16 pm</option>
                        <option value="17">17 pm</option>
                        <option value="18">18 pm</option>
                    </select>
                    <input type="submit" value="Enviar">
                    <h2>LISTADO TUTORIAS</h2>
                    <ul>
                        <?php
                            $query = "SELECT DATE_FORMAT(fecha,'%d-%b-%Y') AS fecha, profesor, hora, id FROM horarios WHERE profesor = ". $_SESSION['idprofesor'] . " order by fecha";
                            //echo $query;
                            $resultado = $mysqli->query($query);
                            while($fila = $resultado->fetch_assoc()){
                                echo '<li>' . $fila['fecha'] . " " . $fila['hora'] . '</li>';
                                echo "<ul>";
                                $query = "SELECT alumnos.nombre, materias.materia, horarios_alumnos.comentario FROM horarios_alumnos, alumnos, materias WHERE horarios_alumnos.materia = materias.id AND alumnos.id = horarios_alumnos.alumno AND horarios_alumnos.horario = " . $fila['id'];
                                $resultado_alumnos = $mysqli->query($query);
                                while($fila_alumnos = $resultado_alumnos->fetch_assoc()){                                
                                    echo "<li>" . $fila_alumnos['nombre'] . " " . $fila_alumnos['materia'] . " " . $fila_alumnos['comentario'] . "</li>";
                                }
                                echo "</ul>";
                            }
                        ?>
                    </ul>
                </fieldset>
            </form>
            
            

            <?php
        } else {
            ?>
            <h1>Estás desconectado!</h1>
            <form method="post" action="validar_profesores.php">
                <fieldset>
                    <legend>LOG IN PROFES</legend>
                    <input type="email" name="mail" required="" maxlength="150" placeholder="mail usuario" autofocus="">
                    <input type="password" name="pass" required="" maxlength="25" placeholder="password">
                    <input type="submit" value="ENTRAR">
                </fieldset>
            </form>


            <?php
        }
        ?>

    </body>
</html>
