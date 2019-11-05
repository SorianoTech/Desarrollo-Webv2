<?php 
include_once 'includes/db.php';
$uploadDir = './uploads/'; 
$response = array( 
    'status' => 0, 
    'message' => 'El envio del formulario fallo, intentalo de nuevo.' 
); 
 
// If form is submitted 
if(isset($_POST['pregunta']) || isset($_POST['resp_1']) || isset($_POST['file'])){ 
    // Obtenemos los datos del formulario

    $pregunta = $mysqli->real_escape_string($_POST['pregunta']);
    $resp_1= $mysqli->real_escape_string($_POST['resp_1']);
    $resp_2= $mysqli->real_escape_string($_POST['resp_2']);
    $resp_3= $mysqli->real_escape_string($_POST['resp_3']);
    $correcta = $_POST['correcta'];
    
    $mime_types = array(
        // images
        'png' => 'image/png',
        'jpe' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpeg',
        'gif' => 'image/gif',
        'bmp' => 'image/bmp',
        'ico' => 'image/vnd.microsoft.icon',
        'tiff' => 'image/tiff',
        'tif' => 'image/tiff',
        'svg' => 'image/svg+xml',
        'svgz' => 'image/svg+xml',
    );

    // Check whether submitted data is not empty 
    if(!empty($pregunta) && !empty($resp_1)){  
            $uploadStatus = 1; 
            // Upload file 
            $uploadedFile = ''; 
            if(!empty($_FILES["file"]["name"])){ 
                // Comprobamos la cabecera del fichero
                $mime = image_type_to_mime_type(exif_imagetype($_FILES['file']['tmp_name']));
                
                if (in_array($mime, $mime_types)){
                $response['mime'] = "Valido";
                
                

                // File path config
                $fileName = basename($_FILES["file"]["name"]); 
                $targetFilePath = $uploadDir . $fileName; 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                //ENPROGRESO añadir primero a la base de datos

                $insert = $mysqli->query("INSERT INTO preguntas (texto,img) VALUES ('".$pregunta."','".$fileName."')");
                $lastid = $mysqli->insert_id;
                $insert2 = $mysqli->query("INSERT INTO respuestas (id_pregunta,resp_1,resp_2,resp_3,correcta) VALUES ('".$lastid."','".$resp_1."','".$resp_2."','".$resp_3."','".$correcta."')");    
                
                $targetFilePath = $uploadDir . $lastid.".". $fileType;
                $response['file']=$targetFilePath;

                // Upload file to the server 
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
                    $uploadedFile = $fileName; 
                }else{ 
                    $uploadStatus = 0; 
                    $response['message'] = 'Lo siento, hubo un problema al subir su fichero.'; 
                } 
                
                }else{
                    $uploadStatus = 0; 
                    $response['mime'] = 'El fichero tiene un formato no valido.';
                }
            } 

             
            if($uploadStatus == 1){ 
                // Include the database config file 
                // Insert form data in the database   
                //$insert = $mysqli->query("INSERT INTO preguntas (texto,img) VALUES ('".$pregunta."','".$uploadedFile."')"); 
                //$lastid = $mysqli->insert_id;
                //$insert2 = $mysqli->query("INSERT INTO respuestas (id_pregunta,resp_1,resp_2,resp_3,correcta) VALUES ('".$lastid."','".$resp_1."','".$resp_2."','".$resp_3."','".$correcta."')"); 
        
                if($insert){ 
                    $response['status'] = 1; 
                    $response['message'] = 'Los datos del formulario han sido registrados correctamente!'; 
                } 
            }  
    }else{ 
         $response['message'] = 'Es necesario rellenar todos los campos).';  
    } 
} 
 
// Return response 
echo json_encode($response);
