<?php

//Funcion que nos devuelve el nombre de usuario al pasarle el identificador.
    function buscar_usuario($id){
        $json = file_get_contents('usuarios.json');
        $json = json_decode($json, true);  
        foreach ($json['usuarios'] as $key => $value) {
            if($id == $value['id']){
                return $value['nombre'];
            }
        }        
    }
    
?>