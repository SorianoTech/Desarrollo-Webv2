<?
include_once './prohibir.php';

$json = file_get_contents('json/posts.json');
$json = json_decode($json, true);


if($json['posts'][$_POST['key']]['id'] == $_POST['id'] && $json['posts'][$_POST['key']]['usuario'] == $_COOKIE['usuario']){
    $key = $_POST['key'];
    $id = $_POST['id'];
    $fichero = 'json/posts/' . $id . '.html';
    file_put_contents($fichero , $_POST['articulo']);    
    $json['posts'][$key]['titulo'] = $_POST['titulo'];
    $json['posts'][$key]['categoria'] = $_POST['categoria'];
    $json['posts'][$key]['imagen'] = $_POST['imagen'];
    $json = json_encode($json);
    file_put_contents('json/posts.json', $json);
}
header("Location: posts.php");
exit();
?>
