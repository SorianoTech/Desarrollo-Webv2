<?php

if(isset($_COOKIE['id']) && isset($_COOKIE['empresa']) && $_COOKIE['id'] > 0 && isset($_COOKIE['clave'])) {
    $id = $_COOKIE['id'];
    $empresa = $_COOKIE['empresa'];
    $clave = $_COOKIE['clave'];
} else {
    header("Location: login.php");
    exit();
}

