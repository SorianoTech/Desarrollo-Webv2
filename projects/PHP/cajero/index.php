<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> 
  <link href="main.css" rel="stylesheet" type="text/css" />

  <title>Cajero</title>
</head>
<body>
  <header>
    <?php 
          $cantidad = $_POST['cantidad'];
          $cantidad = $cantidad *100; //Convertimos la cantidad a un entero
          $cantidad_eu = $cantidad/100;
        ?>
    <nav></nav>
  </header>  
  <section>
    <p>Se pide generar un programa en el que al introducir una cantidad de dinero en una caja de un formulario, nos devuelva mediante php la menor cantidad de billetes y monedas posibles.</p>
    Solo es posible utilizar HTML, CSS y PHP, en php podemos utilizar variables, y condicionales simples(estructiras de control) unicamente.<br/><br/><br/>
    <div id="cajero">
      <form class="pure-form" action="index.php" method="post">
        <p>Introduce la cantidad con dos decimales(utilizando "." para separa la parte decimal</p>
        <input type="number" step=".01" class="pure-input-rounded" name="cantidad" place> <!--step para definir el numero de decimales-->
        <button type="submit" class="pure-button">Devolver Cambio</button>
        
      </form>
      <div id="caja_resultado">
        <img class="pure-img" src="">
        <i class="fas fa-euro-sign"></i>
        <?php 
        echo $cantidad_eu; //imprimimos la cantidad 

        //Billetes y monedas 5000-2000-1000-500-200-100-50
        //Monedas 200-100-50-10-5-2-1
        if (($cantidad%50000) > 0){ //Existe billete de 500
          $resto = $cantidad%50000; //Comprobamos el resto que tenemos que repartir
          $bill_500 = ($cantidad - $resto)/50000; //restamos el resto al importe para saber cuantos billetes exactos tenemos que dar
          echo '<p>'.$bill_500.' billetes de 500€ </p>';
          $cantidad = $resto;
          if($cantidad%20000>0){ //billetes de 200 no exactos
            $resto = $cantidad%20000; //Comprobamos el resto que tenemos que repartir
            $bill_200 = ($cantidad - $resto)/20000;
            echo '<p>'.$bill_200.' billetes de 200€ </p>';
            $cantidad = $resto;
            if($cantidad%10000>0){//cantidad de billete de 100 no exactos
              $resto = $cantidad%10000; //Comprobamos el resto que tenemos que repartir
              $bill_200 = ($cantidad - $resto)/10000; 
              echo '<p>'.$bill_200.' billetes de 100€ </p>';
              $cantidad = $resto;
                if($cantidad%5000>0){//cantidad de billete de 50 no exactos
                $resto = $cantidad%5000; //Comprobamos el resto que tenemos que repartir
                $bill_50 = ($cantidad - $resto)/5000; 
                echo '<p>'.$bill_50.' billetes de 50€ </p>';
                $cantidad = $resto;
                  if($cantidad%2000>0){//cantidad de billete de 20 no exactos
                  $resto = $cantidad%2000; //Comprobamos el resto que tenemos que repartir
                  $bill_20 = ($cantidad - $resto)/2000; 
                  echo '<p>'.$bill_20.' billetes de 20€ </p>';
                  $cantidad = $resto;
                    if($cantidad%1000>0){//cantidad de billete de 10 
                    $resto = $cantidad%1000; //Comprobamos el resto que tenemos que repartir
                    $bill_10 = ($cantidad - $resto)/1000; 
                    echo '<p>'.$bill_10.' billetes de 10€ </p>';
                    $cantidad = $resto;
                      if($cantidad%500>0){//cantidad de billete de 5 no exactos
                      $resto = $cantidad%500; //Comprobamos el resto que tenemos que repartir
                      $bill_5 = ($cantidad - $resto)/500; 
                      echo '<p>'.$bill_5.' billetes de 5€ </p>';
                      $cantidad = $resto;
                        if($cantidad%200>0){//cantidad de monedas de 2 no exactos
                        $resto = $cantidad%200; //Comprobamos el resto que tenemos que repartir
                        $mon_2 = ($cantidad - $resto)/200; 
                        echo '<p>'.$mon_2.' Monedas de 2€ </p>';
                        $cantidad = $resto;
                          if($cantidad%100>0){//cantidad de monedas de 1 no exactos
                          $resto = $cantidad%100; //Comprobamos el resto que tenemos que repartir
                          $mon_1 = ($cantidad - $resto)/100; 
                          echo '<p>'.$mon_1.' Monedas de 1€ </p>';
                          $cantidad = $resto;
                            if($cantidad%50>0){//cantidad de monedas de 1 no exactos
                            $resto = $cantidad%50; //Comprobamos el resto que tenemos que repartir
                            $mon_05 = ($cantidad - $resto)/50; 
                            echo '<p>'.$mon_05.' Monedas de 0.50€ </p>';
                            $cantidad = $resto;
                              if($cantidad%20>0){//cantidad de monedas de 0.20 no exactos
                              $resto = $cantidad%20; //Comprobamos el resto que tenemos que repartir
                              $mon_02 = ($cantidad - $resto)/20; 
                              echo '<p>'.$mon_02.' Monedas de 0.20€ </p>';
                              $cantidad = $resto;
                                if($cantidad%10>0){//cantidad de monedas de 0.10 no exactos
                                $resto = $cantidad%10; //Comprobamos el resto que tenemos que repartir
                                $mon_01 = ($cantidad - $resto)/10; 
                                echo '<p>'.$mon_01.' Monedas de 0.10€ </p>';
                                $cantidad = $resto;
                                  if($cantidad%5>0){//cantidad de monedas de 0.10 no exactos
                                  $resto = $cantidad%5; //Comprobamos el resto que tenemos que repartir
                                  $mon_005 = ($cantidad - $resto)/5; 
                                  echo '<p>'.$mon_005.' Monedas de 0.05€ </p>';
                                  $cantidad = $resto;
                                    if($cantidad%2>0){//cantidad de monedas de 0.10 no exactos
                                    $resto = $cantidad%2; //Comprobamos el resto que tenemos que repartir
                                    $mon_002 = ($cantidad - $resto)/2; 
                                    echo '<p>'.$mon_002.' Monedas de 0.02€ </p>';
                                    $cantidad = $resto;
                                      if($cantidad%1>0){//cantidad de monedas de 0.01 no exactos
                                      $resto = $cantidad%1; //Comprobamos el resto que tenemos que repartir
                                      $mon_001 = ($cantidad - $resto)/1; 
                                      echo '<p>'.$mon_001.' Monedas de 0.01€ </p>';
                                      $cantidad = $resto;
                                      }else{ //Monedas de 0.01 exactos
                                        $mon_001 = $cantidad / 1; //Calculo las monedas de 0.01 que tengo que dar
                                        echo '<p>'.$mon_001.' monedas de 0.01€ </p>';}
                                    }else{ //Monedas de 0.01 exactos
                                      $mon_002 = $cantidad / 2; //Calculo las monedas de 0.02 que tengo que dar
                                      echo '<p>'.$mon_002.' monedas de 0.02€ </p>';}
                                  }else{ //Monedas de 0.05 exactos
                                    $mon_005 = $cantidad / 5; //Calculo las monedas de 0.05 que tengo que dar
                                    echo '<p>'.$mon_005.' monedas de 0.05€ </p>';}
                                }else{ //Monedas de 0.10 exactos
                                  $mon_01 = $cantidad / 10; //Calculo las monedas de 0.10 que tengo que dar
                                  echo '<p>'.$mon_01.' monedas de 0.10€ </p>';}
                              }else{ //Monedas de 0.20 exactos
                                $mon_02 = $cantidad / 20; //Calculo las monedas de 0.20 que tengo que dar
                                echo '<p>'.$mon_02.' monedas de 0.20€ </p>';}
                            }else{ //Monedas de 0.50 exactos
                              $mon_05 = $cantidad / 50; //Calculo las monedas de 0.50 que tengo que dar
                              echo '<p>'.$mon_05.' monedas de 0.50€ </p>';}
                          }else{ //Monedas de 1 exactas
                            $mon_1 = $cantidad / 100; //Calculo las monedas de 1 que tengo que dar
                            echo '<p>'.$mon_1.' monedas de 1€ </p>';}
                        }else{ //Monedas de 2 exactas
                          $mon_2 = $cantidad / 200; //Calculo los monedas de 2 que tengo que dar
                          echo '<p>'.$mon_2.' monedas de 2€ </p>';}
                      }else{ //Billetes de 5 exactos
                        $bill_5 = $cantidad / 500; //Calculo los billetes de 5 que tengo que dar
                        echo '<p>'.$bill_5.' billetes de 5€ </p>';}
                    }else{ //Billetes de 10 exactos
                      $bill_10 = $cantidad / 1000; //Calculo los billetes de 10 que tengo que dar
                      echo '<p>'.$bill_10.' billetes de 10€ </p>';}
                  }else{ //Billetes de 20 exactos
                    $bill_20 = $cantidad / 2000; //Calculo los billetes de 20 que tengo que dar
                    echo '<p>'.$bill_20.' billetes de 20€ </p>';}
                }else{ //Billetes de 50 exactos
                  $bill_50 = $cantidad / 5000; //Calculo los billetes de 50 que tengo que dar
                  echo '<p>'.$bill_50.' billetes de 50€ </p>';}
            }else{ //Billetes de 100 exactos
              $bill_100 = $cantidad / 10000; //Calculo los billetes de 100 que tengo que dar
              echo '<p>'.$bill_100.' billetes de 100€ </p>';}
          }else{ //Billetes de 200 exactos
            $bill_200 = $cantidad / 20000; //Calculo los billetes de 200 que tengo que dar
            echo '<p>'.$bill_200.' billetes de 200€ </p>';}
        }else{ //En caso de que el resto me de 0 (500)(numero exacto de billetes)
          $bill_500 = $cantidad / 50000; //Calculo los billetes de 500 que tengo que dar
          echo '<p>'.$bill_500.' billetes de 500€ </p>';}
        

        ?>
      </div>
      
    </div>
  </section>
  <footer>
    
  </footer>
</body>
</html>
