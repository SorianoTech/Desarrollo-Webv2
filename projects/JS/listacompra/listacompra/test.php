<?php
$numero = $_POST['numero'];
echo "<ul>";
for($i = 1; $i <= 10; $i++){
    $t = $numero * $i;
    echo "<li>".$numero." X " . $i . " = " . $t . "</li>";
}
echo "</ul>";
