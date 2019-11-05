<?php
class tabla {

    //////////////////PROPIEDADES////////////////////////
    //creacion de una tabla con 3 propiedades, va a recibir un objeto con el resultado de una consulta sql, el tipo de color y el titulo
    public $resultado;
    public $css;
    public $titulo;
    //esta clase tiene un constructor  que recibe 3 propiedades
    function __construct($sql, $estilo = "azulitos", $caption) {
       $this->resultado = $sql;
       $this->css = $estilo;
       $this->titulo = $caption;
    }
    //////////////////////////////////////////////////////


    ///////////////METODOS////////////////////
    //Creamos el método pintar de la clase tabla
    function pintar(){
        //decimos que nos pinte la referencia del css atacando a la propiedad de css
        echo "<link href=\"css/".$this->css.".css\" rel=\"stylesheet\" type=\"text/css\"/>";

        //metemos los valores de la propiedad resultado del objeto  resultado en la variable "campo", accediendo al método de la clase
        $campos = $this->resultado->fetch_fields();
        echo "<div class=\"datagrid\"><table><caption>".$this->titulo."</caption><thead><tr>";

        //Me devuelve el nombre de los campos la tabla y lo pinto en una cabecera
        foreach ($campos as $value) {
            echo "<th>". $value->name . "</th>";
        }
        echo "</tr></thead><tbody>";
        //Meto en un array númerico los valores de los elementos de la Tabla
        while($fila = $this->resultado->fetch_array(MYSQLI_NUM)){
            echo "<tr>";
            for($i = 0; $i < $this->resultado->field_count; $i++){
                echo "<td>".$fila[$i]."</td>";
            }
            echo "</tr>";
        }
        echo "</tbody></table></div>";
    }
    ///////////////////////////////////////////////
    
}
