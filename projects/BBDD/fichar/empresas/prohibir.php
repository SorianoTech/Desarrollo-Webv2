<?php
session_start();
if(empty($_SESSION['id_empresa'])){
    header("Location: index.php");
    exit();
}