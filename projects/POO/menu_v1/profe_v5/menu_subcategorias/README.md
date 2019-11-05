## Caso Práctico de Clases, clases extendidas y retrollamadas

Se requiere crear una aplicación que nos permita generar un fichero estático a partir de la información que disponemos en una base de datos. 

En este ejercicio generaremos un fichero JSON y lo transformaremos en una array para poder utilizar la información que cubra nuestras necesidades(crear un menu). Al disponer de la información en un fichero de texto no sera necesario estar realizando consultas a la base de datos. De esta manera podremos programar una tarea, por ejemplo 1 vez al día que nos extraiga la información y nos genere un fichero estático para reducir el consumo de memoria que utilizará nuestro servidor.

### Conexión a BD y carga de clase

- Una base de datos con categorias y subcategorias.
- **generador_json.php** -> en este fichero incluiremos:
  - La clase que nos genera el menu.
  - La conexión a la base de datos.
   
```php
<?php
include_once './menu.php';
include_once '../../../servidores/includes/datos.php';
```

### Creamos la consulta y guardamos el contenido en una array

1. Creamos la consulta
2. Guardamos en el **objeto** `$resultado` el resultado de ejecutar el método del objeto `$mysqli`.
3. Guardamos en `$array` la array generada por el método `fetch_all()` del objeto `$resultado`.
4. Mediante la funcion `file_put_contents` guardamos en el fichero `menu.json` el resultado de la función `json_encode` de la $array.
5. Realizamos una parada de 2 segunos
6. Instaciamos el **objeto** `$menu_normal` de la clase **menu** pasandole un fichero json al constructor.
7. Llamamos al método `pintar_fichero()` del objeto `$menu_normal`. 


```php
$query = "select * FROM menu order by id";
$resultado = $mysqli->query($query);
$array = $resultado->fetch_all();

file_put_contents("menu.json", json_encode($array));

sleep(2);

$menu_normal = new menu("http://35.180.252.132/~alfonso/php/poo/menu_subcategorias/menu.json");
$menu_normal->pintar_fichero();
```


## Clase menu


```php
<?php
/* 
 * @see Geneador de Menu
 */
class menu { 
  //definimos las propiedades
    public $datos; //datos que recibire del json
    public $padre = 0;
    public $texto = "";
       
    public function __construct($json){ 
        $contents = file_get_contents($json);
        //$contents = utf8_encode($contents);
        $this->datos = json_decode($contents, true);
    }

    public function pintar_fichero(){
        $array = array_filter($this->datos, function($id){return $id[3] == $this->padre;});
        if(count($array) > 0){
            $this->texto .= '<ul>';
            foreach ($array as $key => $value) {
                $this->texto .= '<li><a href="'.$value['2'].'">'.$value['1'].'</a>';
                $this->padre = $value[0];
                $this->pintar();
                $this->texto .= '</li>';
            }
            $this->texto .= '</ul>';
        }
        file_put_contents("menu.ul", $this->texto);
    }
    
    
    public function pintar(){
        $array = array_filter($this->datos, function($id){return $id[3] == $this->padre;});
        if(count($array) > 0){
            $this->texto .= '<ul>';
            foreach ($array as $key => $value) {
                $this->texto .= '<li><a href="'.$value['2'].'">'.$value['1'].'</a>';
                $this->padre = $value[0];
                $this->pintar();
                $this->texto .= '</li>';
            }
            $this->texto .= '</ul>';
        }
        echo $this->texto;
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
```


