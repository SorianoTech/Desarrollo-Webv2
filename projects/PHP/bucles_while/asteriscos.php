<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Asteríscos</title>
</head>
<body>

  <div class="container">

  <h2>Diseñar una aplicación en PHP que me pinte en pantalla las columnas y filas que le pase en cuadro de texto</h2>

  <form method="post" action="asteriscos.php">
    <p>Introduce la cantidad de filas</p><input type="number" name="fila" placeholder="1">
    <p>Introduce la cantidad de columnas</p><input type="number" name="col" placeholder="1">
    <input type="submit" value="HAZLO!">
  </form>
  <?
  $fila = $_POST['fila'];
  $col = $_POST['col'];
  $caracter = '*';
  $contador_fila = 0;
  $contador_col = 0;
  ?>
  <div>
    <table>
    <?php
      while($contador_fila<=$fila){
        echo '<tr>'; //identificador de col 1 fila 1
        $contador_fila++;
        $contador_col=0; // reseteamos el contador de las columnas para que pinte las siguientes filas
        while($contador_col<=$col){
          $contador_col++;
          echo '<td>'.$caracter.'</td>'; //imprime tantas columnas 
        }  
      echo '</tr>';
    }

    ?>
    </table>
    </div>
  </div>
</section>

</body>
</html>