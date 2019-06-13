<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible">
  <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> 
  <link href="main.css" rel="stylesheet" type="text/css" />

  <title>Cajero</title>
</head>
<body>
  <header>
    <?php 
          $cantidad = $_POST['cantidad'];
          $bill_500 = $cantidad / 500;
          $bill_200 = $cantidad / 200;
          $bill_100 = $cantidad / 100;
          $bill_50 = $cantidad / 50;
          $bill_20 = $cantidad / 20;
          $bill_10 = $cantidad / 10;
          $bill_5 = $cantidad / 5;
          $moneda_2 = $cantidad / 2;
          $moneda_1 = $cantidad / 1;
          $moneda_05 = $cantidad / 0.5;
          $moneda_02 = $cantidad / 0.2;
          $moneda_01 = $cantidad / 0.1;
          $moneda_005 = $cantidad / 0.05;
          $moneda_002 = $cantidad / 0.02;
          $moneda_001 = $cantidad / 0.01;

        ?>
    <nav></nav>
  </header>  
  <section>
    <p>Se pide generar un programa en el que al introducir una cantidad de dinero en una caja de un formulario, nos devuelva mediante php la menor cantidad de billetes y monedas posibles.</p>
    Solo es posible utilizar HTML, CSS y PHP, en php podemos utilizar variables, y condicionales simples(estructiras de control) unicamente.
    <div id="cajero">
      <form class="pure-form" action="index.php" method="post">
        <input type="number" class="pure-input-rounded" name="cantidad" place>
        <button type="submit" class="pure-button">Devolver Cambio</button>
        
      </form>
      <div id="caja_resultado">
        <img class="pure-img" src="">
        <i class="fas fa-euro-sign"></i>
        <?php 
        echo $cantidad;
        echo '<p>Billete 500: '.$bill_500.'</p>';
        echo '<p>Billete 200: '.$bill_200.'</p>';
        echo '<p>Billete 100: '.$bill_100.'</p>';
        echo '<p>Billete 50: '.$bill_50.'</p>';
        echo 'Resto de 500 es: '.$cantidad;

        if ($cantidad > 0){
          echo '<p>Bien, tenemos dinero!! Ahora veamos cuantos billetes y monedas puedo darte :)<p>';
            if($bill_500>0){ 
              echo '<p>Toma billetaco!</p>';
              echo '<p>Te corresponden '.$bill_500.' de 500</p>';
              $restante=($cantidad-(500*$bill_500));
              if($restante%500) == 0){

              }
              echo '<p>Cantidad despues de restar el billete: '.$cantidad.'</p>';
            }if($bill_200>0 && ($cantidad%200) == 0){
              echo '<p>Te corresponden '.$bill_200.' billetes de 200</p>';
            }
        } else{
          echo '<p>Mierda, no tenemos dinero!! Consigue un poco y dime la cantidad que tienes</p>';
          
        }
        
        ?>
      </div>
      
    </div>
  </section>
  <footer>
    
  </footer>
</body>
</html>