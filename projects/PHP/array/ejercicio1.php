<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Arrays</title>
</head>
<body>
  <h1>Ejercicio 1</h1>
  <h2>Crear un array que muestre por pantalla de 10 posiciones del 0 al 99.</h2>
  <?php
  echo '<p>Creo una array unidimensional con elementos clave=>valor</p>';
    $array = [
      "clave1" => 1,
      "clave2" => 2,
      "clave3" => 3,
      "clave4" => 4,
      "clave5" => 5,
      "clave6" => 6,
      "clave7" => 7,
      "clave8" => 8,
  ];


  echo '<pre>'; print_r($array); echo '</pre>';

  echo '<p>Creo una array unidimensional con elementos clave=>valor ALEATORIOS</p>';

  $vector;
  for($contador=0;$contador<10; $contador++){
    $vector[$contador] = rand(0,99); 
  }
  echo '<p>Imprimimo la array completa de forma legible:</p>';
  echo '<pre>'; print_r($vector); echo '</pre>';
  echo '<p>Imprimo la posición número 0</p>';
  echo $vector[0];
  ?>

<h2>Generar un array de 20 posiciones con números aleatorios, mostrándolo en pantalla sin utilizar funciones(que lo recorra con una array)</h2>

<?
  echo '<p>Creo una Array3 con valores de forma ordenada</p>';
  //Creando un array con 20 posiciones con valor 1,2,4 hasta 20
  for($i=0;$i<20; $i++){
    $array3[$i] = $i; 
  }

  echo '<p>Imprimo Array3 con un foreach</p>';
  foreach($array3 as $clave=>$valor){
    echo 'Elemento de la array['.$clave.']:'.$valor.'<br>';
  }

echo '<p>Creo una Array2 con valores de forma aleatoria</p>';
//Creando un array con 20 posiciones con valor de numero aleatorio
  for($contador=0;$contador<20; $contador++){
    $array2[$contador] = rand(0,9); 
  }

  echo '<p>Imprimo Array2 con un foreach</p>';
  foreach($array2 as $clave=>$valor){
    echo 'Elemento de la array['.$clave.']:'.$valor.'<br>';
  }

  $array4=burbuja($array2); //meto los valores ya ordenados en la array4
  echo '<p>Imprirmo la array 2 despues de pasarle la funcion burbuja para ordenar.</p>';
  echo '<pre>'; print_r($array4); echo '</pre>'; //imprimo la array4 con una funcion (debe de salir ordenado)

 



//Creamos una función llamada burbuja
echo '<p>Creamos una funcion burbuja</p>';
function burbuja($array)
{
    for($i=1;$i<count($array);$i++) //creamos un bucle que vaya hasta el final de la array
    {
        for($j=0;$j<count($array)-$i;$j++) //creamos otro bucle que vaya hasta el final de la array menos 1
        {
            if($array[$j]>$array[$j+1]) //preguntamos, si el valor de la array es mayor que el siguiente
            {
                $temp=$array[$j+1]; //en caso de que asi sea creo una variable temp(para guardar el valor menor)
                $array[$j+1]=$array[$j]; //asigno el valor menor al primer valor de la array
                $array[$j]=$temp; //asigno el valor superior a la variable temp, para comprobar en la siguiente vuelta.
            }
        }
    }
 
    return $array; //Devuelvo la array
}
echo '<p>Creamos una array con valores desordenados</p>'; 
$arrayA=array(5,9,4,7,3,8,2,1,6); //defino una array (arrayA) con valores desordenados
 
echo 'Valores iniciales<br>';
for($i=0;$i<count($arrayA);$i++) //imprimo los valores desordenadores
    echo $arrayA[$i]."\n";
echo '<p>Le pasamos la función burbuja</p>'; 
$arrayB=burbuja($arrayA); //Creo una nueva array (arrayB) pasándole la arrayA para ordenarlo
 
echo '<br>Valores ordenados<br>';
for($i=0;$i<count($arrayB);$i++) //imprimo los valores de la arrayB (ordenada)
    echo $arrayB[$i]."\n";
?>


<p>Array con la descripción de las webs y las URL para el index de nuestra web.</p>

<p>Selector de imágenes, en el que elijo el álbum y pueda ver la foto y la descripción.</p>

</body>
</html>