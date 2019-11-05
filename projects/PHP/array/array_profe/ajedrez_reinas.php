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
            table tr:nth-child(odd) td:nth-child(odd) {
                background-color: #FFFFFF;
                color: #000000;
            }
            table tr:nth-child(even) td:nth-child(even) {
                background-color: #FFFFFF;
                color: #000000;
            }            
        </style>
    </head>
    <body>
        <?php
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
            
            function desmarca($tablero){
                $cantidad = count($tablero);
                $fila = 0;
                $columna = 0;
                for($f = ($cantidad -1); $f>=0; $f--){
                    for($c = ($cantidad -1); $c>=0; $c--){
                        if($tablero[$f][$c] == -1){
                            $fila = $f;
                            $columna = $c;
                            break 2;
                        }
                    }
                }
                for($i = 0; $i < $cantidad; $i++){
                    --$tablero[$fila][$i];
                    --$tablero[$i][$columna];
                }
                if ($fila >= $columna) {
                    $col = 0;
                    for($i = ($fila - $columna); $i < $cantidad; $i++){
                        --$tablero[$i][$col];
                        $col++;
                    }
                } elseif ($fila < $columna) {
                    $fil = 0;
                    for($i = ($columna - $fila); $i < $cantidad; $i++){
                        --$tablero[$fil][$i];
                        $fil++;
                    }
                }
                
                
                $fil = $fila - 1;
                $col = $columna + 1;
                while(($col < $cantidad) && ($fil >= 0)){
                    --$tablero[$fil--][$col++];
                }
                
                $fil = $fila + 1;
                $col = $columna - 1;
                while(($col >= 0) && ($fil < $cantidad)){
                    --$tablero[$fil++][$col--];
                }                
                $tablero[$fila][$columna] = 0;    
                
                if($c == ($cantidad -1)){
                    ++$f;
                    $c = 0;
                } else {
                    ++$c;
                }
                //echo 'desmarca ' . $f . '-'. $c;
                
                buscar($tablero, $f, $c);                
            }            
            
            function buscar($tablero, $fila = 0, $columna = 0){
                $cantidad = count($tablero);
                for($filas = $fila; $filas < $cantidad; $filas++){
                    for($columnas = $columna; $columnas < $cantidad; $columnas++){
                        if($tablero[$filas][$columnas] == 0){
                            marcar($tablero,$filas,$columnas);                         
                            ++$GLOBALS['reinas'];
                            if($GLOBALS['reinas'] == $cantidad){
                                echo 'RESUELTO';
                                pintar($tablero);
                                return $tablero;
                            }
                            //echo $f . '-' . $c . '***' . ++$GLOBALS['reinas'];
                        }
                    }
                    $columna = 0;
                }
                if($GLOBALS['reinas'] < $cantidad){
                    --$GLOBALS['reinas'];
                    //echo $GLOBALS['reinas'];
                    //pintar($tablero);
                    //echo 'hola';
                    desmarca($tablero);
                }
            }

            
            $reinas = 0;

            $cantidad = 4;
            $tablero = [];
            
            
            for($filas = 0; $filas < $cantidad; $filas++){
                for($columnas= 0; $columnas< $cantidad; $columnas++){
                    $tablero[$filas][$columnas] = 0;
                }
            }

            buscar($tablero);
            //pintar($tablero);
            /*
            echo '<pre>';
            print_r($tablero);
             * 
             */
        ?>
    </body>
</html>
