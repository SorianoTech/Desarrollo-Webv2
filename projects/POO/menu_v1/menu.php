<?php
class menu{
    public $json;
    public $css;

    function __construct($datos, $estilo, $estoy) {
       $this->json = $datos;
       $this->css = $estilo;
    }

    function pintar(){
        echo "<link href=\"css/".$this->css.".css\" rel=\"stylesheet\" type=\"text/css\"/>";
        $campos = $this->json['menu'];
        echo "<pre>";
        print_r($campos);
        echo "</pre>";
    //nos pintara el menu
        echo '<nav><ul>';
        foreach ($campos as $key => $valor) {
            echo '<li><a href="#" class="myButton">'.$valor['categoria'].'</a>';
            
            if(isset($valor['subcategoria'])){
                echo "<ul>";
                foreach ($valor['subcategoria'] as $key2 => $valor2){
                    
                    echo '<li><a href="#" class="myButton">'.$valor2['categoria'].'</a>';
                }
                echo "</li></ul>";
            }
            echo "</li></ul>";
        }
        echo "</nav>";
    }
}

?>