<?php
setcookie('usuario', '0', time()-60);
header('Location: login.php');
?>