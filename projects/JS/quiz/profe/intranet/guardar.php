<?php
include_once '../includes/datos.php';
if(
    !empty($_POST['pregunta']) && strlen($_POST['pregunta']) < 500 
    && !empty($_POST['respuesta1']) && strlen($_POST['respuesta1']) < 500
    && !empty($_POST['respuesta2']) && strlen($_POST['respuesta2']) < 500
    && !empty($_POST['respuesta3']) && strlen($_POST['respuesta3']) < 500
) {
        $pregunta = $mysqli->real_escape_string($_POST['pregunta']);
        $respuesta1= $mysqli->real_escape_string($_POST['respuesta1']);
        $respuesta2= $mysqli->real_escape_string($_POST['respuesta2']);
        $respuesta3= $mysqli->real_escape_string($_POST['respuesta3']);
        
        $stmt = $mysqli->prepare("INSERT INTO test_preguntas (pregunta) VALUES (?)");
        $stmt->bind_param('s', $pregunta);        
        $stmt->execute();
        $id = $mysqli->insert_id;
        $stmt->close();
        $stmt = $mysqli->prepare("INSERT INTO test_respuestas (pregunta, respuesta1, respuesta2, respuesta3) VALUES (?,?,?,?)");
        $stmt->bind_param('dsss', $id,$respuesta1,$respuesta2,$respuesta3);        
        $stmt->execute();        
        $stmt->close();

        if(!empty($_FILES['imagen']['tmp_name'])){
            $mime = image_type_to_mime_type(exif_imagetype($_FILES['imagen']['tmp_name']));
            $dir_subida = '/home/alfonso/public_html/test/fotos/';  
            if($mime == 'image/jpeg' && $_FILES['imagen']['size'] < 300000){
                
                $rsr_org = imagecreatefromjpeg($_FILES['imagen']['tmp_name']);
                $tamano = getimagesize($_FILES['imagen']['tmp_name']);
                $fichero_subido = $dir_subida . $id.".jpg";
                if($tamano[0] > 400){
                    imagejpeg(imagescale($rsr_org, 400), $fichero_subido);
                } else {
                    imagejpeg($rsr_org, $fichero_subido);
                }
                imagedestroy($rsr_org);
            }
        }
        $mysqli->close();        
} else {
    //error
}