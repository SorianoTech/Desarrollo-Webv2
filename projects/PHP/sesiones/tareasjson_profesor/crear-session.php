<?php
    session_start();
    //obtenemos el contenido del fichero json y lo decodificamos
    $json = file_get_contents('usuarios.json');
    $json = json_decode($json, true);
        
    //Creamos la sesion siempre que reciba datos por POST
    if(!empty($_POST['nombre']) && !empty($_POST['pass'])){
        $nombre = $_POST['nombre'];
        $pass = $_POST['pass'];
        //Recorremos los usuarios, comprobamos la contraseña y creamos una sesion con el valor del ID
        foreach ($json['usuarios'] as $key => $value) {
            if($value['nombre'] == $nombre && $value['pass'] == $pass){
                $_SESSION['usuario'] = $value['id'];
                header("Location: tareas.php");
                exit();            
            }                    
        }
    }
    
    header("Location: index.php");
    exit();
?>


