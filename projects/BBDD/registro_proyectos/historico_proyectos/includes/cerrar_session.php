<?php
        setcookie('id', '', time()+60*60*24*30, '/');
        setcookie('empresa', '', time()+60*60*24*30, '/');
        header("Location: ../index.php");
        exit();
?>        
