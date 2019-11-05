<?

$mysqli = new mysqli("localhost", "sergio", "ciberweb69", "bbdd_sergio");

if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Agenda</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
        
            <form method="POST" action="contactos.php">
                
                Nuevo Contact@:
                <div>
                    <input class="form-control" type="text" placeholder="Nombre" maxlength="60" name="nombre">
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email" name="mail">
                </div>
                
                <div>
                    <input class="form-control" type="text" maxlength="25" name="telefono" placeholder="Telefono">
                </div>  
                
                <div class="form-group">
                    <select class="form-control" id="exampleFormControlSelect1" name="categoria">
                        <?
                        $resultado = $mysqli->query("select * from categorias order by categoria asc");
                        while($fila = $resultado->fetch_assoc()){
                            echo "<option value='".$fila['id']."'>".$fila['categoria']."</option>";
                        }
                        ?>
                    </select>
                </div>
                            
                <input class="btn btn-primary mb-2" type="submit" value="GUARDAR">
                
            </form>

            
            
            <?
            //creo un query que inserta los valores den la base de datos
                if(isset($_POST['categoria'])){
                    $query = "INSERT INTO contactos (nombre, mail, telefono, categoria) VALUES ('" . $_POST['nombre'] . "','" . $_POST['mail'] . "','" . $_POST['telefono'] . "','" . $_POST['categoria'] . "')";
                    //echo $query;
                    $mysqli->query($query);
                }        
            ?>
            
            <h2>Contactos</h2>
            <ul>
            <?php
            //consulto los valores mediante un selecto y los imprimo recorriendo las filas con fetch_assoc
                $resultado = $mysqli->query("select * from contactos order by nombre asc");
                while($fila = $resultado->fetch_assoc()){
                    echo "<li>".$fila['nombre'];
                    echo "- <a href='tel:". $fila['telefono'] ."'>". $fila['telefono'] . "</a></li>";
                }
                //<a href="tel:+18475555555">1-847-555-5555</a>
            ?>
            </ul>
        </div>
    </body>
</html>
