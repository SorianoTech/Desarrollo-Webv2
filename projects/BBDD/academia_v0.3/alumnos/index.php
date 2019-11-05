<?php
include_once '../includes/datos.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>ALUMNOS</title>
        <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
        <script>
            var id_tuto;
            var id_mate;
            
            function verHoras() {
                var id_materia;
                id_materia = $("#materias option:selected").val();
                id_mate = id_materia;
                //alert('hola ' + id_materia);
                $.post("ver_horas.php", {materia: id_materia})
                        .done(function (data) {
                            $('#tutorias').html(data);
                        });
            }
            
            function pedir_tutoria(id_tutoria){
                id_tuto = id_tutoria;
                $("#comentarios").show();
            }
            
            function guardar_tutoria(){
                var comentarios = $("#comentarios_tutorias").val();
                //alert(id_mate + " " + id_tuto + " " + comentarios);
                
                $.post("solicitar_tutoria.php", {materia: id_mate, horario: id_tuto, comentarios: comentarios})
                    .done(function (data) {
                        $('#tutorias').html(data);
                    });                
                
            }
            
            function cerrar(){
                $("#comentarios").hide();
            }
        </script>
        
        <style>
            #comentarios{
                display: none;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);   
                background-color: antiquewhite;
                padding: 50px;
            }
            .fondo_0{
                
            }
            .fondo_1{
                background-color: cadetblue;
            }
            .fondo_2{
                background-color: tomato;
            }
        </style>
    </head>
    <body>
        <?php
        //print_r($_COOKIE);
        if (!isset($_COOKIE['id_alumno']) && !isset($_COOKIE['nombre'])) {
            ?>
            <form method = "post"  action = "validar_alumno.php" >
            <fieldset>
                <legend>LOG IN ALUMNO</legend>
                <input type="email" name="mail" required="" maxlength="150" placeholder="mail usuario" autofocus="">
                <input type="password" name="pass" required="" maxlength="25" placeholder="password">
                <input type="submit" value="ENTRAR">
            </fieldset>
        </form>

        <?php
    } else {
        $id_alumno = $_COOKIE['id_alumno'];
        $nombre = $_COOKIE['nombre'];
        ?>
        <!--HTML-->
        <h1>Hola, <?php echo $nombre; ?></h1>
        <h2>Selecciona la materia de la que quieres seleccionar la tutoria: </h2>
        <select onchange="verHoras()" id="materias">
            <option value="" selected=""></option>
            <?php
            $sql = "SELECT * from vista_materias";
            $resultado = $mysqli->query($sql);
            while ($fila = $resultado->fetch_assoc()) {
                ?>

                <option value="<?php echo $fila['id']; ?>"><?php echo $fila['materia']; ?> </option>
        <?php } ?>
        </select>
        <section id="tutorias"></section>
        <div id="comentarios">
            <textarea id="comentarios_tutorias"></textarea>
            <br>
            <button onclick="guardar_tutoria()">Solicitar</button>
            <button onclick="cerrar()"> X </button>
        </div>
        
        <section id="mistutorias">
            <table>
                <tr>
                    <th>Materia</th><th>Fecha</th><th>Hora</th><th>Estado</th><th>Comentarios</th><th>Profesor</th><th>Mail</th><th>telefono</th>
                </tr>    
            
            <?php
            
                $estados[0] = "En Espera";
                $estados[1] = "Aceptado";
                $estados[2] = "Rechazado";
            
                $sql = "SELECT horarios.fecha, horarios.hora, horarios_alumnos.estado, horarios_alumnos.comentario, materias.materia, profesores.nombre, profesores.mail, profesores.telefono FROM alumnos, horarios_alumnos, materias, profesores, horarios WHERE profesores.id = horarios.profesor AND horarios_alumnos.horario = horarios.id AND horarios_alumnos.materia = materias.id AND alumnos.id = horarios_alumnos.alumno AND horarios_alumnos.alumno = " . $_COOKIE['id_alumno'] . " and alumnos.clave = '" . $_COOKIE['clave_alumno'] . "'" ;
                //echo $sql;
                $resultado = $mysqli->query($sql);
                while ($fila = $resultado->fetch_assoc()) {            
                ?>
                <tr class="fondo_<?php echo $fila['estado'] ?>">
                    <td><?php echo $fila['materia'] ?></td>
                    <td><?php echo $fila['fecha'] ?></td>
                    <td><?php echo $fila['hora'] ?></td>
                    <td><?php echo $estados[$fila['estado']]; ?></td>
                    <td><?php echo $fila['comentario'] ?></td>
                    <td><?php echo $fila['nombre'] ?></td>
                    <td><?php echo $fila['mail'] ?></td>
                    <td><?php echo $fila['telefono'] ?></td>
                </tr>
                <?php
                }
            ?>
            </table>
        </section>
<?php } ?>
</body>
</html>
