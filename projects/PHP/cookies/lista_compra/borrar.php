<?
//print_r($_GET['key']);
//print_r($_GET['value']);
$key=$_GET['key'];
$value=$_GET['value'];
//print_r($_GET);
setcookie($key, $value, time() - 1000 * 24 );
header('Location: lista.php');
exit;
?>