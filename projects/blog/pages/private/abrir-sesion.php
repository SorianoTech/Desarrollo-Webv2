<?php
$json = file_get_contents('json/usuarios.json');
$json = json_decode($json, true);


if(!empty($_POST['nombre']) && !empty($_POST['pass'])){
    $nombre = $_POST['nombre'];
    $pass = $_POST['pass'];
    foreach ($json['usuarios'] as $key => $value) {
        if($value['nombre'] == $nombre && $value['pass'] == $pass){
            setcookie('usuario', $value['id'], time()+60*60*24*25);
            header("Location: text_editor.php");
            exit();            
        }                    
    }
}
header('Location: index.php');
exit();