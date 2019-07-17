      <?
      require_once '../funciones/funciones.php';
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
    