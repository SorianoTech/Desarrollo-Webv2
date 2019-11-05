<?php

header('Content-type: image/jpeg');

$imagen = new Imagick('protos_roble.jpg');

// Si se proporciona 0 como parámetro de ancho o alto,
// se mantiene la proporción de aspecto
//$imagen->thumbnailImage(200, 0);
$imagen->resizeImage( 100, 100 , Imagick::FILTER_LANCZOS, 1, TRUE); //just resize it
$imagen->writeImage("nueva.jpg", true); //save to destination folder

$image = new Imagick("protos_roble.jpg"); //image file
$image->resizeImage( 100, 100 , Imagick::FILTER_LANCZOS, 1, TRUE); //just resize it
$image->writeImage("./new_image.jpg", true); //save to destination folder

echo $image;
echo $imagen;
?>