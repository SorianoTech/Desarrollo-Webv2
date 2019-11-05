<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            table{
                margin: auto;
                border: 6px #000000 double;
                border-spacing: 0px;
            }
            tr{
                border: 0px;
            }
            td{
                width: 50px; 
                height: 50px;
                text-align: center;
                vertical-align: central;
                background-color: #000000;
                color: #FFFFFF;
                border: 0px;
                padding: 0px;
                font-size: 1.7em;
            }
            table tr:nth-child(odd) td:nth-child(odd), table tr:nth-child(even) td:nth-child(even) {
                background-color: #FFFFFF;
                color: #000000;
            }
        </style>
    </head>
    <body>
        <?php

            set_time_limit(25);

            function pintar($tablero){
                $cantidad = count($tablero);                
                echo '<table>';
                for($filas = 0; $filas < $cantidad; $filas++){
                    echo '<tr>';
                    for($columnas = 0; $columnas< $cantidad; $columnas++){
                        echo '<td>';
                        if($tablero[$filas][$columnas] == -1){
                            echo '&#9813;';
                        } else {
                            //echo $tablero[$filas][$columnas];
                        }
                        echo '</td>';
                    }
                    echo '</tr>';
                }                
                echo '</table>';
            }
            
            function marcar(&$tablero,$fila,$columna){
                $cantidad = count($tablero);
                //HORIZONTALES Y VERTICALES
                for($i = 0; $i < $cantidad; $i++){
                    ++$tablero[$fila][$i];
                    ++$tablero[$i][$columna];
                }
                // ////
                if ($fila >= $columna) {
                    $col = 0;
                    for($i = ($fila - $columna); $i < $cantidad; $i++){
                        ++$tablero[$i][$col];
                        $col++;
                    }
                } elseif ($fila < $columna) {
                    $fil = 0;
                    for($i = ($columna - $fila); $i < $cantidad; $i++){
                        ++$tablero[$fil][$i];
                        $fil++;
                    }
                }


                // \\\\\\
                $fil = $fila - 1;
                $col = $columna + 1;
                while(($col < $cantidad) && ($fil >= 0)){
                    ++$tablero[$fil--][$col++];
                }
                
                $fil = $fila + 1;
                $col = $columna - 1;
                while(($col >= 0) && ($fil < $cantidad)){
                    ++$tablero[$fil++][$col--];
                }                
                $tablero[$fila][$columna] = -1;
                //pintar($tablero);
            }
            
            function buscar($tablero, $fila = 0, $columna = 0){
                static $resuelto = 0;
                static $reinas = 0;
                $cantidad = count($tablero);
                $tablero_copia = $tablero;
                
                for($filas = $fila; $filas < $cantidad; $filas++){
                    for($columnas = $columna; $columnas < $cantidad; $columnas++){
                        if($tablero[$filas][$columnas] == 0){
                            marcar($tablero,$filas,$columnas);  
                            //pintar($tablero);
                            ++$reinas;
                            $tablero = buscar($tablero);
                            if($reinas == $cantidad){
                                $resuelto++;
                                if($resuelto == 1){
                                    //pintar($tablero);
                                    return $tablero;
                                    //$GLOBALS['tablero'] = $tablero;

                                }
                            } else {
                                $tablero = $tablero_copia;
                                --$reinas;
                            }
                        }
                    }
                    $columna = 0;
                }
                return $tablero;             
            }



            $cantidad = 4;
            $tablero = [];
            
            
            for($filas = 0; $filas < $cantidad; $filas++){
                for($columnas= 0; $columnas< $cantidad; $columnas++){
                    $tablero[$filas][$columnas] = 0;
                }
            }

            $tablero = buscar($tablero);
            
            pintar($tablero);
                        
        ?>
    </body>
</html>
