<?php
include_once './includes/datos.php';

$mime = image_type_to_mime_type(exif_imagetype($_FILES['fichero_usuario']['tmp_name']));
$dir_subida = '/home/alfonso/public_html/test/fotos/';

if($mime == 'image/jpeg' && $_FILES['fichero_usuario']['size'] < 30001 && strlen($_POST['pregunta']) < 500){
    $query = "INSERT INTO test_preguntas (pregunta) VALUES ('".$_POST['pregunta']."')";
    $mysqli->query($query);
    $id = $mysqli->insert_id;
    $fichero_subido = $dir_subida . $id.".jpg";
    
    if(move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)){
        echo "todo bien";
    } else {
        echo "algo ha salido muy mal";
    }    
} else {
    echo "Algo ha salido mal";
}
