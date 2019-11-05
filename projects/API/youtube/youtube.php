<?php
error_reporting(0);

$search = "PHP"; // Search Query
$api = "AIzaSyAyOvDbuvS4dPf142ECthA61mFHgYqEIx4"; // YouTube Developer API Key
$link = "https://www.googleapis.com/youtube/v3/search?safeSearch=moderate&order=relevance&part=snippet&q=".urlencode($search). "&maxResults=10&key=". $api;
$video = file_get_contents($link);
$video = json_decode($video, true);

echo '<pre>';
print_r($video);
echo '</pre>';

foreach ($video['items'] as $data){
    $title = $data['snippet']['title'];
    $description = $data['snippet']['title'];
    $vid = $data['id']['videoId'];
    $image = "https://i.ytimg.com/vi/$vid/default.jpg";
    // Output Title/Description/Image URL If Video ID exist
    if($vid){
        echo "Title: $title<br />Description: $description<br />Video ID: $vid<br />Image URL: $image<hr>";
        echo "<iframe width='420' height='315' src='https://www.youtube.com/embed/$vid'></iframe>";
    }
}

?>