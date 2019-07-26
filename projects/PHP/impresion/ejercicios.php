<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible">
        <link rel="stylesheet" type="text/css" href="a4media.css">
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
        <title>Ejercicios</title>
    </head>
    <?//Definicion de variables
    $number = $_POST['number']; 
    $opcion = $_POST['opcion']; 
    $contador= "";
    $columnas= 20;
    //$randomNumber = mt_rand(); 
    include_once('funcion.php');
    ?>

    <body>
        <div class="book">
            <div class="page">
                <div class="subpage">
                    <p>Nombre:____________________     Apellido:____________________</p>

                    <?php
                    if ($opcion == 1) { //caso suma
                        echo '<h1>Sumas de ' . $number . ' Dígitos: </h1>';
                        echo '<div class="1">
                                <div class="2">';
                        while ($contador < $columnas) {
                            $contador++;
                            echo '
            <div class="3">
              
              <table> 
                <tbody>
                  <tr>
                    <td>' . randomNumber($number) . '</td>
                  </tr>
                  <tr>
                    <td>' . randomNumber($number) . '+</td>
                  </tr>
                  <tr>
                    <td>-------- </td>
                  </tr>
                </tbody>
              </table>
            </div>';
                        }
                    } else {
                        echo '<h1>Restas de ' . $number . ' Dígitos: </h1>';
                        echo '<div class="1">
                                <div class="2">';
                        while ($contador < $columnas) {
                            $contador++;
                            echo '
            <div class="3">
              
              <table> 
                <tbody>
                  <tr>
                    <td>' . randomNumber($number) . '</td>
                  </tr>
                  <tr>
                    <td>' . randomNumber($number) . '-</td>
                  </tr>
                  <tr>
                    <td>-------- </td>
                  </tr>
                </tbody>
              </table>
            </div>';
                        }
                    }
                    ?>
                </div>
            </div>
            <!--div de maquetador de paginas-->
        </div>    
    </div>
</div>

<!--Meter en un bucle para que autogenere páginas>
<div class="page">
    <div class="subpage">Page 2/2</div>    
</div>
-->

</body>
</html>