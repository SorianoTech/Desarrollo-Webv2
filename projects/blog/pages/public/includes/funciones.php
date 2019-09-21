<?php

function cat($id){
    static  $categorias = false;
    if($categorias === false){
        $json = file_get_contents('../../private/json/categorias.json');
        $json = json_decode($json, true);                
        foreach ($json['categorias'] as $key => $value) {
            $categorias[$value['id']] = $value['categoria'];
        }        
    }   
    return $categorias[$id] ;
}

function usuario($id){
    static  $usuarios = false;
    if($usuarios === false){
        $json = file_get_contents('../../private/json/usuarios.json');
        $json = json_decode($json, true);                
        foreach ($json['usuarios'] as $key => $value) {
            $usuarios[$value['id']] = $value['usuario'];
        }        
    }   
    return $usuarios[$id] ;
}



function articulo($id){
    static  $array_articulo = false;
    if($array_articulo === false){
        $json = file_get_contents('../../private/json/posts.json');
        $json = json_decode($json, true);                
        foreach ($json['posts'] as $key => $value) {
            $array_articulo['titulo'] = $value['titulo'];
            $array_articulo['imagen'] = $value['imagen'];
            $array_articulo['categoria'] = $value['categoria'];
        }        
    }   
    return $array_articulo;
}
