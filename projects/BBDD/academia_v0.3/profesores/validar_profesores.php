<?php

session_start();

include_once '../includes/datos.php';
//print_r($_POST);
//echo '<pre>';
//print_r($_SERVER);

if (isset($_POST['mail']) && isset($_POST['pass']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) && $_SERVER['HTTP_REFERER'] == "https://alfonsoylaura.com/profesores/index.php") {
    $pass = mysqli_real_escape_string($mysqli, $_POST['pass']);
    $mail = mysqli_real_escape_string($mysqli, $_POST['mail']);

    $query = "SELECT * FROM profesores WHERE mail = '" . $mail . "' AND pass = '" . $pass . "'";
    //echo $query;
    $resultado = $mysqli->query($query); //ejecuta la query y devuelve otro objeto de tipo result

    if ($resultado->num_rows == 1) {
        $fila = $resultado->fetch_assoc(); //fetch_assoc() trae una fila por vez y recorre el resultado
        $mysqli->close(); //cerramos bases de datos
        $_SESSION['idprofesor'] = $fila['id']; //creamos la variable de sesión
        $_SESSION['nombre_profesor'] = $fila['nombre'];

        header("Location: index.php"); //header es imcompatible con los echos y print_r's
        exit();
    } else {

        header("Location: index.php?error=1"); // error 1 es porque recibe datos buenos pero no está en la BBDD
        exit();
    }
} else {
    header("Location: index.php?error=2"); // error 2 los datos no son de calidad, no es un email, etc...
    exit();
}
?>