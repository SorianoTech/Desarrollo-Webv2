<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calcular Día de la semana de una fecha dada</title>
    </head>
    <body>
        <form method="post" action="fecha-dia.php">
            <input type="number" maxlength="2" minlength="1" min="1" max="31" name="dia" placeholder="DIA">
            <input type="number" maxlength="2" minlength="1" min="1" max="12" name="mes" placeholder="MES">
            <input type="number" maxlength="4" minlength="1" min="1" name="ano" placeholder="AÑO">
            <input type="submit" value="CALCULAR DÍA">  
        </form>
        <?php
            if($_POST['ano'] >=1 && $_POST['mes'] >= 1 && $_POST['mes'] <= 12 && $_POST['dia'] >= 1 && $_POST['dia'] <= 31){
                $dia = $_POST['dia'];
                $mes = $_POST['mes'];
                $ano = $_POST['ano'];
                
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
                    $total %= 7;
                    ++$mes;


                    //Mostramos todo por pantalla
                    echo 'El '. $dia . '/' . $mes . '/' . $ano . ': ';
                    if($total == 0){
                        echo 'Domingo';
                    } elseif ($total == 1) {
                        echo 'Lunes';
                    } elseif ($total == 2) {
                        echo 'Martes';
                    } elseif ($total == 3) {
                        echo 'Miercoles';
                    } elseif ($total == 4) {
                        echo 'Jueves';
                    } elseif ($total == 5) {
                        echo 'Viernes';
                    } elseif ($total == 6) {
                        echo 'Sabado';
                    }                    
                } else {
                    echo 'Fecha NO VALIDA';
                }
                
                
            } else {
                echo 'Fecha fuera de rango, indique una fecha superior al 1/1/1';
            }
        ?>
    </body>
</html>