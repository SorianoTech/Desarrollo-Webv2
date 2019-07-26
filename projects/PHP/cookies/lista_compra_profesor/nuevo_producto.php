<?php
    $key = rand(0,152784578);
    if(strlen($_POST['producto']) > 0){
        setcookie("productos[".$key."]", $_POST['producto'], time()+60*60*24*128);
        setcookie("estados[".$key."]", 0, time()+60*60*24*128);
    }
    header("Location: listadelacomprar.php");
    exit();
?>