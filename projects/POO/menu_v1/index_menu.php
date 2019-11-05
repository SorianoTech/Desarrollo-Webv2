<?php
spl_autoload_register(function ($nombre_clase) {
    include $nombre_clase . '.php';
});
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu </title>
        <style>
        
        </style>
    </head>
    <body>
        <?php
        $activo=1;
        //obtengo la informacion del fichero json
            $json = file_get_contents("datos.json");
            $json= json_decode($json, true);


        $mimenu  = new menu($json, 'azul', $activo);
        $mimenu->pintar();
        
        ?>

</body>
</html>