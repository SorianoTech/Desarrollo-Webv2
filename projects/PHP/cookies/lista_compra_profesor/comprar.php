<?php
    $key = $_GET['key'];
    $array = $_COOKIE['estados'];
    if($array[$key] == 0){
        setcookie("estados[". $_GET['key']."]", 1, time()+60*60*24*128);
    }
    
    header("Location: listadelacomprar.php");
    exit();    
?>
