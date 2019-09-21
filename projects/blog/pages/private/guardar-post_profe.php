<?
include_once './prohibir.php';

$json = file_get_contents('json/posts.json');
$json = json_decode($json, true);

$total = count($json['posts']);

$json['posts'][$total]['id'] = rand(1,78979879879);
$json['posts'][$total]['titulo'] = $_POST['titulo'];
$json['posts'][$total]['categoria'] = $_POST['categoria'];
$json['posts'][$total]['imagen'] = $_POST['imagen'];
$json['posts'][$total]['usuario'] = $_COOKIE['usuario'];


$fichero = 'json/posts/' . $json['posts'][$total]['id'] . '.html';
file_put_contents($fichero , $_POST['articulo']);
$json = json_encode($json);
file_put_contents('json/posts.json', $json);

header("Location: post.php");
exit();

?>
