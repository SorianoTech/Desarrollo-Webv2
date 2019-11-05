<?php
if(isset($_COOKIE['id']) && isset($_COOKIE['taller']) && $_COOKIE['id'] > 0){
    $id_taller = $_COOKIE['id'];
    $nombre_taller = $_COOKIE['taller'];
} else {
    header("Location: index.php");
    exit();
}

