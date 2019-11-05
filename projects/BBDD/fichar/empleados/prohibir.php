<?php
session_start();
if(empty($_SESSION['id_empleado'])){
    header("Location: index.php");
    exit();
}