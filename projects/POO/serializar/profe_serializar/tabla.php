<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tabla
 *
 * @author alfonso
 */
class tabla {
    public $numero;
    public $cantidad;
    
    function __construct($numero, $cantidad) {
        $this->cantidad = $cantidad;
        $this->numero = $numero;
    }
    
    function pintar(){
        echo "<h1>Tabla del: " . $this->numero  . "</h1>";
        for ($i = 0; $i < $this->cantidad; $i++) {
            $total = $i * $this->numero;
            echo "$this->numero X $i =  $total <br>";
        }
    }
}