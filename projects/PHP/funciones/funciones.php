<?
    function calcular_dias($dia, $mes, $ano) {
        
        if($ano >=1 && $mes >= 1 && $mes <= 12 && $dia >= 1 && $dia <= 31){
                // Vamos a ver si la fecha es válida
                $fecha_valida = FALSE;
                if($mes == 1 && $dia <= 31){
                    $fecha_valida = TRUE;
                }
                if($mes == 2){
                    if(($ano%4 == 0 && $ano%100 != 0) || $ano%400 == 0 ){
                        if($dia <= 29){
                            $fecha_valida = TRUE;
                        }
                    } else {
                        if($dia <= 28){
                            $fecha_valida = TRUE;
                        }                        
                    }
                }
                if($mes == 3 && $dia <= 31){
                    $fecha_valida = TRUE;
                }
                if($mes == 4 && $dia <= 30){
                    $fecha_valida = TRUE;
                }
                if($mes == 5 && $dia <= 31){
                    $fecha_valida = TRUE;
                }
                if($mes == 6 && $dia <= 30){
                    $fecha_valida = TRUE;
                }
                if($mes == 7 && $dia <= 31){
                    $fecha_valida = TRUE;
                }
                if($mes == 8 && $dia <= 31){
                    $fecha_valida = TRUE;
                }
                if($mes == 9 && $dia <= 30){
                    $fecha_valida = TRUE;
                }
                if($mes == 10 && $dia <= 31){
                    $fecha_valida = TRUE;
                }
                if($mes == 11 && $dia <= 30){
                    $fecha_valida = TRUE;
                }
                if($mes == 12 && $dia <= 31){
                    $fecha_valida = TRUE;
                }


                if($fecha_valida == TRUE){
                    $total = 0;

                    //El Papa Gregorio XIII indicó que los años bisiestos se producirían en múltiplo de 4 
                    //pero no lo serían aquellos que fueran múltiplos de 100 
                    //si no son divisibles por 400. Siendo 97 años bisiestos cada 400 años.                

                    //CALCULAMOS DÍAS TOTALES DE AÑOS COMPLETOS
                    --$ano;
                    if($ano > 0){
                        $anos_normales = 0;
                        $anos_bisiestos = 0;
                        $restos = 0;

                        $restos = $ano%4;
                        $anos_bisiestos = ($ano-$restos) / 4;
                        $restos = $ano%100;
                        $anos_bisiestos -= ($ano-$restos)/100;
                        $restos = $ano%400;
                        $anos_bisiestos += ($ano-$restos)/400;
                        $anos_normales = $ano - $anos_bisiestos;

                        $total = ($anos_normales * 365) + ($anos_bisiestos * 366);
                    }

                    //CALCULAMOS DÍAS TOTALES DE MESES COMPLETOS, teniendo en cuenta Febrero que es muuu tonto
                    // ($year%4 == 0 && $year%100 != 0) || $year%400 == 0 );
                    ++$ano;
                    $mes -=1;
                    if($mes > 0){
                        if($mes >= 1){
                            $total += 31;
                        }
                        if($mes >= 2){
                            if(($ano%4 == 0 && $ano%100 != 0) || $ano%400 == 0 ){
                                $total += 29;
                            } else {
                                $total += 28;
                            }
                        }
                        if($mes >= 3){
                            $total += 31;
                        }                
                        if($mes >= 4){
                            $total += 30;
                        }
                        if($mes >= 5){
                            $total += 31;
                        }
                        if($mes >= 6){
                            $total += 30;
                        }
                        if($mes >= 7){
                            $total += 31;
                        }
                        if($mes >= 8){
                            $total += 31;
                        }
                        if($mes >= 9){
                            $total += 30;
                        }
                        if($mes >= 10){
                            $total += 31;
                        }
                        if($mes >= 11){
                            $total += 30;
                        }
                        /*
                        if($mes >= 12){
                            $total += 31;
                        }
                         * 
                         */
                    }


                    //Por último sumanos los días sueltos
                    $total += $dia;
                    return $total;
                } else {
                    return -1;
                }
            } else {
                return -1;
            }
        
    }

    //Devuelve 0 si el numero es 0, 2 si es par y 1 si es impar
    function parimpar($num) {
        if($num == 0){
            return 0;
        }
        if(($num % 2) == 0){
            return 2;
        } else {
            return 1;
        }
    }

    //funcion rombo
    function rombo($altura = 3, $char = '*') {
    if ($altura % 2 === 0 || $altura < 2) return;
    $rombo = array();
    $n = ceil($altura / 2);
    do {
        $arr = array_pad(array(), $n, ' ');
        $arr[key($arr)] = $char;
        end($arr);
        $arr[key($arr)] = $char;
        $rombo[] = $arr;
    } while (--$n);
    $temp = array_reverse($rombo);
    array_pop($temp);
    $rombo = array_merge($temp, $rombo);
    return array_reduce($rombo, function($r, $v) use($altura) {
        return $r .= str_pad(implode(' ', $v), $altura , ' ', STR_PAD_BOTH) . "\n";
    });
}

//Devuelve una array numérica de forma ordenada
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

//devuelve x números aleatorios en función de la cantidad introducida.
//Ejemplo, randomNumber(8)-> 92838582
function randomNumber($digitos)
{
  $devuelvenum = mt_rand(1, 9);
  while (strlen($devuelvenum) < $digitos) {
    $devuelvenum .= mt_rand(0, 9);
  }

  
  return $devuelvenum;
}

// Función que ejecuta una función dentro de si misma guardando los valores
// Imprimirá los valores de ida y de vuelta.
// la variable estática ira arrastrando el valor y solo se ejecutara la primera vez que sea llamada, sin embargo la variable $valor cada vez que se ejecute tendra un valor que recorrerá a la inversa.
function tabla($num){
    static $contador = 1;
    $valor = $contador;
    $res = $contador * $num;
    echo $num . ' X ' . $contador . ' = ' . $res . '';
    ++$contador;
    if($contador < 4){
        tabla($num);
    }
    echo $valor . " " .  $contador ." la vida es muy bonita ";
}
        
?>
