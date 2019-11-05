<?

$amigos = [
    'crina' => 'https://cristinabanica.com/wp-json/wp/v2/posts/',
    'david' => 'https://bodegaestebaranz.es/wp-json/wp/v2/posts/'
];

foreach ($amigos as $key => $value) {
    $url = file_get_contents($value);
    $data = json_decode($url, true);
    foreach ($data as $key => $value) {
        echo $value['title']['rendered']."<br>";
        echo $value['link']."<br>";
    }
}


//url es un fichero json con el contenido de los post
/*$url[] = file_get_contents('https://bodegaestebaranz.es/wp-json/wp/v2/posts/');
$url[] = file_get_contents('https://cristinabanica.com/wp-json/wp/v2/posts/');
//Data es una array númerico que contiene todos los post
$data = json_decode($url[0], true);


foreach ($data as $key => $value) {
    echo $value['title']['rendered']."<br>";
    echo $value['link']."<br>";
}


//$url = 'https://'.$https_server;
//$result = file_get_contents($url, false, $context, -1, 40000);
/*
echo "<pre>";
print_r($data);
echo "</pre>";
*/
?>