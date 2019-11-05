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
    </head>
    <body>
        <?php
            class tabla
            {
                // Declaración de una propiedad
                public $var;
                public $color;

                
                function __construct($num = 10) {
                    $this->var = $num;
                }                
               
                

                // Declaración de un método
                public function mostrar() {
                    echo "<div";
                    if($this->color != ""){   
                        echo ' style="color: #'.$this->color.'"';
                    }
                    echo ">";
                    for ($index = 1; $index <= 10; $index++) {
                        $total = $this->var * $index;
                        echo $this->var . " X " . $index . " = " . $total . "<br>";
                    }
                    echo "</div>";
                }
            }  
            
            
            
            
            
            for($i = 1; $i <= 10; $i++ ){
                $mistablas[$i] = new tabla($i);
            }
            
            $mitabla = new tabla(69);
            $mitabla->mostrar();     
            
            $mitabla->color='901830';
            
            $mistablas[5]->color='901830';
            $mistablas[5]->mostrar();
            
            foreach ($mistablas as $key => $value) {
                echo "<h1>" .  $key . "</h1>";
                $value->color = $mitabla->color;
                $value->color = '901830';
                $value->mostrar();
            }
            
            
            

            
            echo $mitabla->var;
            $mitabla->var = $mitabla->var - $mistablas[8]->var;
            $mitabla->mostrar();
            
            
            
            
        ?>
    </body>
</html>
