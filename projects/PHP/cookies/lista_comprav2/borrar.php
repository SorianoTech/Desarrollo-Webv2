<?php
    $key = $_GET['key'];
    $array = $_COOKIE['estados'];
    if($array[$key] == 1){
        setcookie("estados[". $_GET['key']."]", '', time()-60);
    }
    
    header("Location: listadelacomprar.php");
    exit();    
?>
