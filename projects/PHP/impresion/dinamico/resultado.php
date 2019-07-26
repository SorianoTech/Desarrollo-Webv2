<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Resultados</title>

</head>
<body>
  <div class="book">
    <div class="page">
      <div class="subpage">
        <p>Nombre:____________________ Apellido:____________________</p>
        <?php
                    if ($opcion == 1) { //caso suma
                        echo '<h1>Sumas de ' . $number . ' Dígitos: </h1>';
                        echo '<div class="tablas">';
                        while ($contador < $columnas) {
                          $contador++;
                          echo '
                            <table> 
                                <tbody>
                                <tr>
                                  <td>' . $num1 . '</td>
                                  <td rowspan="2">+</td>
                                    <form action="ejercicios.php" method="post">
                                      <input type="hidden" name="num1[]" value="'.$num1.'">
                                    
                                </tr>
                                <tr>
                                  <td>' . $num2 . '</td>
                                  <input type="hidden" name="num2[]" value="'.$num2.'">
                                </tr>
                                <tr>
                                <!--TD para enviar los resultados en el input-->
                                  <td class="border" colspan="2">
                                      <input type="number" class="resultado" name="resultado" placeholder="" id="resul[]">
                                    </form>
                                  </td>
                                </tr>
                              </tbody>
                              </table>
                         ';
                        }
                        echo '</div>';
                    } else {
                        echo '<h1>Restas de ' . $number . ' Dígitos: </h1>';
                       
                        while ($contador < $columnas) {
                            $contador++;
                            echo '
                              <table> 
                                <tbody>
                              <tr>
                                  <td>' . randomNumber($number) . '</td>
                                  <form action="ejercicios.php" method="post">
                                  <td rowspan="2">-</td>
                                   <input type="hidden" name="num1[]" value="'.$num1.'">
                                </tr>
                                <tr>
                                  <td>' . randomNumber($number) . '</td>
                                  <input type="hidden" name="num2[]" value="'.$num2.'">
                                </tr>
                                <tr>
                                  <td class="border" colspan="2">
                                      <input type="number" class="resultado" name="resultado" placeholder="" id="resul[]">
                                    </form>
                                  </td>
                                </tr>
                              </tbody>
                              </table>
                            ';
                        }
                    }
                    ?>
        <form action="ejercicios.php" method="post">
          <input type="submit" value="Resolver">
        </form>
      </div>
      <div class="borrar"></div>

    </div>
    <!--div de maquetador de paginas-->
  </div>
</body>
</html>