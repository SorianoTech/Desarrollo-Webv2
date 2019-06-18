<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cajero Mágico</title>
    </head>
    <body>
        
        <form method="post" action="cajero.php">
            <input type="number" name="cantidad" step="0.01" placeholder="Cantidad en €">
            <input type="submit" value="DAME DINERO">
        </form>
        <?
            $dinero = $_POST['cantidad'];
            echo "<h1>" . $dinero . "</h1>";
            $dinero *= 100;
            $resto = $dinero;
            
            //Billetes de 200;
            $moneda = 200 * 100;
            if($resto >= ($moneda)){
                $resto %= $moneda;
                $dinero -= $resto;
                echo ($dinero / $moneda) . " Billetes de 200€ <br>";                
            }

            //Billetes de 100;
            $moneda = 100 * 100;
            $dinero = $resto;
            if($resto >= ($moneda)){
                $resto %= $moneda;
                $dinero -= $resto;
                echo ($dinero / $moneda) . " Billetes de 100€ <br>";                
            }            

            //Billetes de 50;
            $moneda = 50 * 100;
            $dinero = $resto;
            if($resto >= ($moneda)){
                $resto %= $moneda;
                $dinero -= $resto;
                echo ($dinero / $moneda) . " Billetes de 50€ <br>";                
            }  
            

            //Billetes de 20;
            $moneda = 20 * 100;
            $dinero = $resto;
            if($resto >= ($moneda)){
                $resto %= $moneda;
                $dinero -= $resto;
                echo ($dinero / $moneda) . " Billetes de 20€ <br>";                
            }

            //Billetes de 10;
            $moneda = 10 * 100;
            $dinero = $resto;
            if($resto >= ($moneda)){
                $resto %= $moneda;
                $dinero -= $resto;
                echo ($dinero / $moneda) . " Billetes de 10€ <br>";                
            }

            //Billetes de 5;
            $moneda = 5 * 100;
            $dinero = $resto;
            if($resto >= ($moneda)){
                $resto %= $moneda;
                $dinero -= $resto;
                echo ($dinero / $moneda) . " Billetes de 5€ <br>";                
            }

            //Monedas de 2;
            $moneda = 2 * 100;
            $dinero = $resto;
            if($resto >= ($moneda)){
                $resto %= $moneda;
                $dinero -= $resto;
                echo ($dinero / $moneda) . " Monedas de 2€ <br>";                
            }

            //Monedas de 1;
            $moneda = 1 * 100;
            $dinero = $resto;
            if($resto >= ($moneda)){
                $resto %= $moneda;
                $dinero -= $resto;
                echo ($dinero / $moneda) . " Monedas de 1 <br>";                
            }

            //Monedas de 0.50;
            $moneda = 0.50* 100;
            $dinero = $resto;
            if($resto >= ($moneda)){
                $resto %= $moneda;
                $dinero -= $resto;
                echo ($dinero / $moneda) . " Monedas de 0.50<br>";                
            }

            //Monedas de 0.20;
            $moneda = 0.20 * 100;
            $dinero = $resto;
            if($resto >= ($moneda)){
                $resto %= $moneda;
                $dinero -= $resto;
                echo ($dinero / $moneda) . " Monedas de 0,20€ <br>";                
            }

            //Monedas de 0.10;
            $moneda = 0.10 * 100;
            $dinero = $resto;
            if($resto >= ($moneda)){
                $resto %= $moneda;
                $dinero -= $resto;
                echo ($dinero / $moneda) . " Monedas de 0.10€ <br>";                
            }

            //Monedas de 0.05;
            $moneda = 0.05 * 100;
            $dinero = $resto;
            if($resto >= ($moneda)){
                $resto %= $moneda;
                $dinero -= $resto;
                echo ($dinero / $moneda) . " Monedas de 0.05€ <br>";                
            }

            //Monedas de 0.02;
            $moneda = 0.02 * 100;
            $dinero = $resto;
            if($resto >= ($moneda)){
                $resto %= $moneda;
                $dinero -= $resto;
                echo ($dinero / $moneda) . " Monedas de 0.02€ <br>";                
            }

            //Monedas de 0.01;
            $moneda = 0.01 * 100;
            $dinero = $resto;
            if($resto >= ($moneda)){
                $resto %= $moneda;
                $dinero -= $resto;
                echo ($dinero / $moneda) . " Monedas de 0.01€ <br>";                
            }            

            
        ?>
    </body>
</html>
