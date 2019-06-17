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
          $cantidad = $cantidad *100; //Convertimos la cantidad a un entero

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
        echo $cantidad.' en céntimos'; //imprimimos la cantidad en centimos

        //Biiletes y monedas 5000-2000-1000-500-200-100-50
        //Monedas 200-100-50-10-5-2-1
        if (($cantidad/50000) > 0){ //Existe billete de 500
          $resto = $cantidad%50000; //Comprobamos el resto de los billetes de 500 para saber si necesitamos mas billetes
          
            if($resto>0){ //Quiere decir que tenemos que dar mas billetes NO EXACTO
              $entero = $cantidad - $resto; //restamos el resto al importe para saber cuantos billetes exactos tenemos que dar
              $bill_500 = $entero / 50000; //Calculo los billetes de 500 que tengo que dar
              echo '<p>Te corresponden '.$bill_500.' billetes de 500€ NO EXACTOS</p>';
              echo '<p>Te queda por repartir '.$resto.' céntimos de euro</p>';
              $cantidad = $resto;
              if($cantidad%2000>0){ //billetes de 200 no exactos
                $entero = $cantidad - $resto;
                $bill_200 = $entero / 20000;
                echo '<p>Te corresponden '.$bill_200.' billetes de 200€ NO EXACTOS</p>';
                 echo '<p>Te queda por repartir '.$resto.' céntimos de euro</p>';
                $cantidad = $resto;
              }else{ //Billetes de 200 exactos
                $bill_200 = $cantidad / 20000; //Calculo los billetes de 500 que tengo que dar
                echo '<p>Te corresponden '.$bill_200.' billetes de 200€ EXACTOS</p>';
              }
            }else{ //En caso de que el resto me de 0 (numero exacto de billetes)
              $bill_500 = $cantidad / 50000; //Calculo los billetes de 500 que tengo que dar
              echo '<p>Te corresponden '.$bill_500.' billetes de 500€ EXACTOS</p>';
            }
        }
        if(($cantidad/20000) > 0){ //Existe billete de 200)
          echo '<h1>Billete de 200</h1>';
        }
        if(($cantidad/10000) > 0){ //Existe billete de 100)
          echo 'Billete de 100';
        }
        if(($cantidad/5000) > 0){ //Existe billete de 50)
          echo 'Billete de 50';
        }
        if(($cantidad/2000) > 0){ //Existe billete de 20)
          echo 'Billete de 20';
        }
        if(($cantidad/1000) > 0){ //Existe billete de 10)
          echo 'Billete de 10';
        }
        if(($cantidad/500) > 0){ //Existe billete de 5)
          echo 'Moneda de 5';
        }
        if(($cantidad/200) > 0){ //Existe moneda de 2)
          echo 'Moneda de 2';
        }
        if(($cantidad/100) > 0){ //Existe moneda de 1)
          echo 'Moneda de 1';
        }
        if(($cantidad/50) > 0){ //Existe moneda de 50cent)
          echo 'Monedas de 50 cent';
        }
        if(($cantidad/20) > 0){ //Existe moneda de 20cent)
          echo 'Billete de 20 cent';
        }
        if(($cantidad/10) > 0){ //Existe moneda de 10cent)
          echo 'Billete de 10 cent';
        }
        if(($cantidad/5) > 0){ //Existe moneda de 5cent)
          echo 'Billete de 5 cent';
        }
        if(($cantidad/2) > 0){ //Existe moneda de 5cent)
          echo 'Billete de 2 cent';
        }
        if(($cantidad/1) > 0){ //Existe moneda de 5cent)
          echo 'Billete de 1 cent';
        }
        else{
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
