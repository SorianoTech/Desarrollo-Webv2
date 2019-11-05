<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menu
 *
 * @author alfonso
 * @see Geneador de Menu
 */
class menu {
    public $datos;
    public $estilo;
       
    function __construct($estilo, $json){
        $this->estilo = $estilo;
        $contents = file_get_contents($json);
        //$contents = utf8_encode($contents);
        $this->datos = json_decode($contents, true);      
        $this->pintar();
    }
    
    
    function pintar(){
        echo '<nav class="'.$this->estilo.'"><ul>';
        foreach ($this->datos['links'] as $key => $value) {
            echo '<li id="link_'.$value['id'].'" ><a href="'.$value['link'].'">'.$value['name'].'</a></li>';
        }
        echo '</ul></nav>';
    }
    
}