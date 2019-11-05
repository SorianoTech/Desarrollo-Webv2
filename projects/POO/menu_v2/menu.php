<?php

class menu {

    public $json;
    public $css;

    function __construct($datos, $estilo, $estoy) {
        $this->json = $datos;
        $this->css = $estilo;
    }

    function pintar() {
        echo '<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">';
        echo '<link rel="stylesheet" href="/resources/demos/style.css">';
        echo '<script src="https://code.jquery.com/jquery-1.12.4.js"></script>';
        echo '<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>';
        echo '<script>
            $( function() {
              $( "#menu" ).menu();
            } );
            </script>
            <style>
            .ui-menu { width: 150px; }
            </style>';
        $campos = $this->json['menu'];
        echo "<pre>";
        print_r($campos);
        echo "</pre>";
        //nos pintara el menu
        echo '<div>';
        echo '<nav><ul id="menu">';
        foreach ($campos as $key => $valor) {
            echo '<li><a href="#">' . $valor['categoria'] . '</a>';

            if (isset($valor['subcategoria'])) {
                echo '<ul>';
                foreach ($valor['subcategoria'] as $key2 => $valor2) {

                    echo '<li><a href="#">' . $valor2['categoria'] . '</a>';
                }
                echo "</li></ul>";
            }
            echo "</li>";
        }
        echo "</ul></nav></div>";
    }

}

?>