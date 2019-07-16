<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ajedrez</title>
   <link rel="stylesheet" href="main.css" type="text/css"/>
</head>
<body>
  <div id="container">
    <table class="centered-table">
      <?
      //Bucle for para crar una tabla de 8 por 8
      $col=8;
      $filas=8;
        for ($i=0; $i <$col ; $i++) { 
          echo '<tr>';
          for ($a=0; $a <$filas ; $a++) { 
            echo '<td>Fila'.$i.'</td>';
          }
          echo '</tr>';
        } 
        echo ' Por que este array se me crea con la posicion primera??';
        //Array para crear una tabla de 8 x 8
        for ($i=0; $i <=$col ; $i++) { 
          for ($a=0; $a <=$filas ; $a++) { 
            $tablero[$i][$a]=$a;
          }
        }
        
        echo '<pre>';
        print_r($tablero);
        echo '</pre>';
        
        echo 'Valores Tablero for each<br>';
        foreach ($tablero as $key => $value) {
          echo $key.'<br>';
        }

      ?>
      </table>
  </div>
</body>
</html>

