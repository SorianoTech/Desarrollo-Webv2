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
?>
