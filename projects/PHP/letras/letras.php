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
            span{
                width: 15px;
                height: 15px;
                text-align: center;
                display: inline-block;
                animation: blinker 1s linear infinite;
            }
            
            @keyframes blinker {
              50% {
                opacity: 0;
              }
            }            
        </style>
    </head>
    <body>
        <?php
            //$letras['A'] = array(' ','*','*','*','*',' ','*',' ',' ','*',' ','*','*','*','*',' ','*',' ',' ','*',' ','*',' ',' ','*');
        
            $letras['A'][0] = array(' ','*','*','*','*');
            $letras['A'][1] = array(' ','*',' ',' ','*');
            $letras['A'][2] = array(' ','*','*','*','*');
            $letras['A'][3] = array(' ','*',' ',' ','*');
            $letras['A'][4] = array(' ','*',' ',' ','*');
        
            $letras['B'][0] = array(' ','*','*','*',' ');
            $letras['B'][1] = array(' ','*',' ',' ','*');
            $letras['B'][2] = array(' ','*','*','*','*');
            $letras['B'][3] = array(' ','*',' ',' ','*');
            $letras['B'][4] = array(' ','*','*','*',' ');
            
            $letras['F'][0] = array(' ','*','*','*','*');
            $letras['F'][1] = array(' ','*',' ',' ',' ');
            $letras['F'][2] = array(' ','*','*','*',' ');
            $letras['F'][3] = array(' ','*',' ',' ',' ');
            $letras['F'][4] = array(' ','*',' ',' ',' ');            

            $letras['O'][0] = array(' ','*','*','*',' ');
            $letras['O'][1] = array(' ','*',' ','*',' ');
            $letras['O'][2] = array(' ','*',' ','*',' ');
            $letras['O'][3] = array(' ','*',' ','*',' ');
            $letras['O'][4] = array(' ','*','*','*',' ');   
            
            $letras['N'][0] = array('*',' ',' ',' ','*');
            $letras['N'][1] = array('*','*',' ',' ','*');
            $letras['N'][2] = array('*',' ','*',' ','*');
            $letras['N'][3] = array('*',' ',' ','*','*');
            $letras['N'][4] = array('*',' ',' ',' ','*');   
            
            $letras['S'][0] = array(' ','*','*','*',' ');
            $letras['S'][1] = array(' ','*',' ','',' ');
            $letras['S'][2] = array(' ','*','*','*',' ');
            $letras['S'][3] = array(' ',' ',' ','*',' ');
            $letras['S'][4] = array(' ','*','*','*',' ');            


            
            $letras['L'][0] = array(' ','*',' ',' ',' ');
            $letras['L'][1] = array(' ','*',' ',' ',' ');
            $letras['L'][2] = array(' ','*',' ',' ',' ');
            $letras['L'][3] = array(' ','*',' ',' ',' ');
            $letras['L'][4] = array(' ','*','*','*','*');

            $letras['U'][0] = array(' ','*',' ','*',' ');
            $letras['U'][1] = array(' ','*',' ','*',' ');
            $letras['U'][2] = array(' ','*',' ','*',' ');
            $letras['U'][3] = array(' ','*',' ','*',' ');
            $letras['U'][4] = array(' ','*','*','*',' ');

            $letras['E'][0] = array(' ','*','*','*',' ');
            $letras['E'][1] = array(' ','*',' ',' ',' ');
            $letras['E'][2] = array(' ','*','*','*',' ');
            $letras['E'][3] = array(' ','*',' ',' ',' ');
            $letras['E'][4] = array(' ','*','*','*',' ');
            $letras['E'][5] = 15;


            $redimensionar = 3;
            $letra = 'ALF';
            
            $letra[2] = 'L';
            $letra[3] = 'O';
            
            
            echo '<table><tr>';
            for($recorreletras = 0; $recorreletras < strlen($letra); ++$recorreletras){
                echo '<td>';
                for($index = 0; $index < 5; $index++){
                    for($filas = 0; $filas < $redimensionar; $filas++){
                        for($index_d = 0; $index_d < 5; $index_d++){
                            for($columnas = 0; $columnas < $redimensionar; $columnas++){
                                echo '<span>' . $letras[$letra[$recorreletras]][$index][$index_d] . '</span>';
                            }
                        }
                        echo '<br>';
                    }
                }
                echo '</td>';
            }
            echo '</tr></table>';





            /*
            $cadena = 'serafin pin pin';
            echo $cadena[4]; //f

            foreach ($cadena as $key => $value) {
                echo $key . ' : ' . $value . '<br>';
            }


            echo strlen($cadena);
            for($i = 0; $i < strlen($cadena); $i++) {
                echo $i . ' : ' . $cadena[$i] . '<br>';
            }
            */

            //echo $letras['L'][2][2];
        ?>


    </body>
</html>
