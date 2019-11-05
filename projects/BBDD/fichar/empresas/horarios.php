<?
    include_once './prohibir.php';
    include '../includes/datos.php';
    $id = $_GET['id'];
    $tipos[1] = 'Trabajando';
    $tipos[2] = 'Descansando';    
?>
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
                    <h2>Últimas entradas:</h2>
                    <ul>
                        <?php 
                            $query = "select fichas.* from fichas, empleados where fichas.empleado = " . $id . " and empleados.id = fichas.empleado and empleados.empresa = " . $_SESSION['id_empresa'] . " order by id desc";
                            $resultado = $mysqli->query($query);
                            while($fila = $resultado->fetch_assoc()){
                                echo "<li><strong>".$fila['fecha']."</strong> : " . $tipos[$fila['tipo']] . "</li>";
                            }
                        ?>
                    </ul>
    </body>
</html>
