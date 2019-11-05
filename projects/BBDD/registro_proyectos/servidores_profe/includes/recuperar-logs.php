<?php
/*
Recibir por post el nombre del proyecto y guardarlo, si lo guarda nos devuelve la nueva lista de proyectos y 
 * si no un mensaje de error
*/
include_once './datos.php';

$id = $mysqli->real_escape_string($_POST['id']);
$sql = "select *, date_format(fecha, '%d-%m-%Y') as fechaesp from logs where proyecto = " . $id . " order by fecha desc";
$resultado = $mysqli->query($sql);
if($resultado->num_rows > 0) {
?>
    <table class="paleBlueRows">
        <thead>
            <tr>
                <th>
                    <i class="fas fa-calendar-day"></i>
                </th>
                <th>
                    Logs
                </th>
            </tr>
        </thead>
        <?php
        while($fila = $resultado->fetch_assoc()){
        ?>
            <tr id="log_<?php echo $fila['id'] ?>">
                <td><?php echo $fila['fechaesp'] ?></td>
                <td><?php echo $fila['log'] ?></td>
            </tr>
        <?php
        }
        ?>                
    </table>
<? 

    } else {
?>
    <table class="paleBlueRows">
        <thead>
            <tr>
                <th>
                    <i class="fas fa-calendar-day"></i>
                </th>
                <th>
                    Logs
                </th>
            </tr>
        </thead>
            <tr id="log_<?php echo $id; ?>_0">
                <td><i class="fas fa-tired"></i></td>
                <td>No hay Logs de momento...</td>
            </tr>               
    </table>
<?php
    }
?>