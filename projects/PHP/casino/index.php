<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Casinp</title>


</head>
<body>
<header>< 
  <h1>Casino</h1>  
    Desarrollar un programa que juegue 500 veces utilizando la estrategia de martingala.
    <?
    include_once('../funciones/funciones.php');
    $dinero = 300;
    $apuesta_inicial = 1;
    $jugadas_totales = 500;
    $estado = 2;//1 cuando pierdo 2 cuando gano (empiezo ganando)
    $apuesta_anterior = 0;

    //Blucle para saber si puedo jugar
    //while(($jugadas <= $jugadas_totales) && ($dinero < 0)){
    while(
      ($dinero > 0)
      && 
      (
      ($dinero>=$apuesta_inicial) && $estado == 2)
      ||
      ($dinero >= $apuesta_anterior && $estado == 1)
      ){  
      
        //Apuestas
      if ($estado == 1){ //pierdo
        $dinero -= ($apuesta_anterior * 2);
        $apuesta_anterior *= 2 ;
      }else{ //gano (entra directamente aquí)
        $dinero -= 1;
        $apuesta_anterior = 1;
      }

      $casilla = rand(0,30); 
      //apostamos a par - impar: Siempre a PAR
      if (parimpar($casilla) ==2) {
        $dinero += $apuesta_anterior * 2;
        $apuesta_anterior = 1;
        $estado = 2; 
        echo 'GANAS';

      } else{
        $estado = 1;
        echo 'PIERDES';
      }
      $jugadas++;
      //pregunto si llevo 500 partidas y si he ganado
      if(($jugadas>500) && ($estado ==2)){
        break;
      }

      echo 'Hemos jugado: '.$jugadas. 'y tenemos '.$dinero.'€ en el bolsillo';
    }
    

    ?>
  </header>
  
  
</body>
</html>

