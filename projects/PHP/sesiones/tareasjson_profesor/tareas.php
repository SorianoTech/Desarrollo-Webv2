<? 
require_once './prohibir.php'; 
require_once './libreria.php'; 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista de Tareas</title>
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">                        
        <style>
            body{
                font-family: 'Poppins', sans-serif;
                background-color: #ffc5e8;
            }
            
            ul{
                margin: 0px;
                padding: 0px;
                list-style: none;
                background-color: #ffc5e8;
            }
            li{
                box-sizing: border-box;
                width: 100%;
                padding: 4px;
                border: 2px solid #505050;
                border-bottom: 0px;
                width: 100%;
                background-color: #FFFFFF;
            }

            li:first-child{
                border-radius: 6px 6px 0px 0px;
            }
            li:last-child{
                border-radius: 0px 0px 6px 6px;
                border-bottom: 2px solid #505050;
            }
            li:nth-child(odd){
                background-color: #fff1f7;
            }
            li:hover{
                background-color: #ffcccc;
            }            
            li .tarea{
                width: 85%;
                display: inline-block;
            }
            .tachar{
                text-decoration:line-through;
            }
            i{
                margin: 4px;
            }
            a i {
                text-decoration: none;
                color: #990000;
            }            
            
            .rojo{
                color: #ff3333;
            }
            .gris{
                color: #505050;
            }
        </style>
    </head>
    <body>
        <? 
            if(!empty($_GET['error'])  &&  $_GET['error'] == 1){
                echo '<div class="error">No cometas locuras</div>';
            }
        ?>
        <form method="post" action="crear-tarea.php">
            <input name="tarea" type="text" placeholder="Nueva Tarea">
            <select name="asignar">
                <? 
                    $json = file_get_contents('usuarios.json');
                    $json = json_decode($json, true);  
                    foreach ($json['usuarios'] as $key => $value) {
                        echo "<option value='".$value['id']."'>".$value['nombre']."</option>";
                    }
                ?>
            </select>
            <button type="submit"><i class="fas fa-folder-plus"></i></button>
        </form>
        
        <?php
            echo '<ul>';
            $json = file_get_contents('tareas.json');
            $json = json_decode($json, true);  
            foreach ($json['tareas'] as $key => $value) {
                echo '<li> <div class="tarea ';
                if($value['estado'] == 0){
                    echo 'rojo';
                } else {
                    echo 'gris';
                }
                echo '">'. buscar_usuario($value['usuario']).' -> '.$value['tarea'] . ' -> ' . buscar_usuario($value['asignado']) . '</div>';
                if($value['asignado'] == $_SESSION['usuario'] && $value['estado'] == 0){
                    echo '<a href="empezar-tarea.php?id_tarea='.$value['id'].'"><i class="fas fa-play"></i></a>';
                }
                echo '</li>';
            }
            echo '</ul>';
            
        ?>
    </body>
</html>
