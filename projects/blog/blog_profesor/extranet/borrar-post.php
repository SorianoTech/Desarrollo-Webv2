<?
include_once './prohibir.php';

$json = file_get_contents('json/posts.json');
$json = json_decode($json, true);

$array = '';
if($json['posts'][$_GET['key']]['id'] == $_GET['id'] && $json['posts'][$_GET['key']]['usuario'] == $_COOKIE['usuario']){
    foreach ($json['posts'] as $key => $value) {
        if($value['id'] != $_GET['id']){
            $array['posts'][$key]['id'] = $value['id'];
            $array['posts'][$key]['titulo'] = $value['titulo'];
            $array['posts'][$key]['categoria'] = $value['categoria'];
            $array['posts'][$key]['imagen'] = $value['imagen'];
            $array['posts'][$key]['usuario'] = $value['usuario'];
        }
    }
}

$fichero = 'json/posts/' . $json['posts'][$_GET['key']]['id'] . '.html';
unlink($fichero);

$json = json_encode($array);
file_put_contents('json/posts.json', $json);

header("Location: posts.php");
exit();
?>
