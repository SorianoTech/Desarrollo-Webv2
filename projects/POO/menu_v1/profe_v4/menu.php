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
       
    public function __construct($json){
        $contents = file_get_contents($json);
        //$contents = utf8_encode($contents);
        $this->datos = json_decode($contents, true);      
    }

    public function pintar(){
        //echo "<pre>";
        //var_dump($this->datos);
        echo '<ul>';
        foreach ($this->datos['links'] as $key => $value) {
            echo '<li><a href="'.$value['link'].'">'.$value['name'].'</a>';
            if(isset($value['categorias'])){   
                echo '<ul>';
                foreach ($value['categorias'] as $key2 => $value2) {
                    echo '<li><a href="'.$value2['link'].'">'.$value2['name'].'</a>';
                }
                echo "</ul>";
            }
            echo '</li>';
        }
        echo '</ul>';
    }   
}

class cssmenu extends menu{
    function pintar2(){
        //echo "<pre>";
        //var_dump($this->datos);
        echo '<link href="cssmenu/styles.css" rel="stylesheet" type="text/css"/>';
        echo '<script src="cssmenu/script.js" type="text/javascript"></script>';
        echo '<div id="cssmenu"><ul>';
        foreach ($this->datos['links'] as $key => $value) {
            if(isset($value['categorias'])){   
                echo '<li class="has-sub" id="link_'.$value['id'].'" ><a href="'.$value['link'].'">'.$value['name'].'</a>';
                echo '<ul>';
                foreach ($value['categorias'] as $key2 => $value2) {
                    echo '<li id="link_'.$value2['id'].'" ><a href="'.$value2['link'].'">'.$value2['name'].'</a>';
                }
                echo "</ul>";
            } else {
                echo '<li id="link_'.$value['id'].'" ><a href="'.$value['link'].'">'.$value['name'].'</a>';
            }
            echo '</li>';
        }
        echo '</ul></div>';
    }       
}

class jqueryuimenu extends menu{
    function pintar2($id){
        echo '<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">';
        echo '<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>';
        echo '  <script>
                $( function() {
                  $( "#'.$id.'" ).menu();
                } );
                </script>';
        
        
        echo '<ul id="'.$id.'">';
        foreach ($this->datos['links'] as $key => $value) {
            if(isset($value['categorias'])){   
                echo '<li ><a href="'.$value['link'].'">'.$value['name'].'</a>';
                echo '<ul>';
                foreach ($value['categorias'] as $key2 => $value2) {
                    echo '<li><a href="'.$value2['link'].'">'.$value2['name'].'</a>';
                }
                echo "</ul>";
            } else {
                echo '<li><a href="'.$value['link'].'">'.$value['name'].'</a>';
            }
            echo '</li>';
        }
        echo '</ul>';
    }       
}