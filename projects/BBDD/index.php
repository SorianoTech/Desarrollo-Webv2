<form method="POST" action="index.php">
    Nueva Categoría:
    <br>
    <input type="text" maxlength="25" name="categoria">
    <input type="submit" value="GUARDAR">
</form>

<h2><a href="contactos.php">Ver Contactos</a></h2>

<?php
//Conexion a la base de datos
$mysqli = new mysqli("localhost", "alfonso", "ciberweb69", "alfonso");

//Comprobacion de fallo de conexion.
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
//Si se reciben datos por el formulario, realiza un insert de una categoria
if(isset($_POST['categoria'])){
    $mysqli->query("INSERT INTO categorias (categoria) VALUES ('" . $_POST['categoria'] . "')");
}

//Si recibimos por get borramos una categoria
if(isset($_GET['id'])){
    $mysqli->query("DELETE FROM categorias WHERE id = " . $_GET['id']);
}

//guardamos en la variable resultado la query
$resultado = $mysqli->query("select * from categorias");
//var_dump($resultado);

//Mientras que obtega filas en la array imprimo los resultados.
while($fila = $resultado->fetch_assoc()){
    echo $fila['id'] . ' ' . $fila['categoria'] . ' <a href="index.php?id='. $fila['id'] .'">X</a> ';
    echo '<br>';
}
?>