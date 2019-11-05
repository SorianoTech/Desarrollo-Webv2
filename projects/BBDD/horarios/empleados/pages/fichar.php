<!DOCTYPE html>
<?php
include '../../includes/datos.php'; 
 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/fichar_style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $( function() {
                $( "#accordion").accordion({
                    heightStyle: "content"
                });
            } );
        </script>
        </script>
        <title>Bienvenido </title>
    </head>
    <body>
        <?php
        $id_empleado=$_COOKIE['id'];
        echo "<h3>ID Empleado: ".$id_empleado."</h3>";
        
        //obtener el estado en el qu$id_empleadoe se encuentra el trabajador
        $query_estado="SELECT horarios_historial.estado, horarios_empleados.id as id_empleado FROM horarios_historial, horarios_empleados WHERE horarios_historial.id_empleado = $id_empleado ORDER BY fecha_estado DESC LIMIT 1";
        $resultado_estado = $mysqli->query($query_estado);
        $fila_estado = $resultado_estado->fetch_assoc();
        echo "<h3>Estado: ".$fila_estado['estado']."</h3>";
        //echo $query_estado;
        
        //Obtener el historial de entradas y salidas del empleado
        $query_historial="SELECT DATE_FORMAT(horarios_historial.fecha_estado, '%T') as hora, horarios_empleados.nombre, horarios_historial.estado FROM horarios_historial, horarios_empleados WHERE horarios_historial.id_empleado = $id_empleado and horarios_empleados.id = $id_empleado and horarios_historial.fecha_estado >= CURDATE() ORDER BY horarios_historial.fecha_estado DESC";
        echo $query_historial;
        $resultado_historial = $mysqli->query($query_historial);
        

        if(isset($fila_estado['estado'])){
            if($fila_estado['estado']==1){
                $disabled_entrar="disabled";
                $disabled_descanso="";
            }elseif($fila_estado['estado']==0){
                $disabled_entrar="";
                $disabled_descanso="disabled";
            }
        }else{
            echo "<p id='day' style=text-align:center;>Bienvenido a tu primer día de trabajo!</p>";
            $disabled_entrar="";
            $disabled_descanso="";}
            ?>
       
        <div class="container mx-auto" >
            <?php
                $nombre = ucfirst($_COOKIE['empleado']);
                echo "<p id='bienvenida'> Hola " . $nombre."</p>";
                ?>
            <div id="accordion">
            <h3>Fichar</h3>
            <div>
            <form class="form"  method="post" action="../includes/fichar_guardar.php">
                
                <div class="row-fluid">
                    <input id="entrar" class="btn btn-lg btn-block btn-primary" type="submit" name="entrar" value="Entrar" <?echo $disabled_entrar ?> >
                </div>

                <div class="row-fluid">
                    <input id="descansar" class="btn btn-lg btn-block btn-primary" type="submit" name="descansar" value="Descansar" <?echo $disabled_descanso ?> >
                </div>
            </form> 
        </div>
        <h3>Historial</h3>
            <div>
                <?
                $estados[1] = 'Trabajando';
                $estados[0] = 'Descansando';
                ?>
                <table id="tabla_contenido">
                 <th>Fecha</th>
                 <th>Estado</th>   
                <?
                while ($fila_historial = $resultado_historial->fetch_assoc()){    
                echo "<tr>";
                echo "<td>".$fila_historial['hora']."</td>";
                echo "<td>".$estados[$fila_historial['estado']]."</td>";
                echo "</tr>";
                }?>
                
                </table>
            </div>              
        </div>   
        </div>
    </body>
</html>
