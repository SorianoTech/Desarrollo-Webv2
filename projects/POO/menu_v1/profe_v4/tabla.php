<?php
class tabla {
    public $resultado;
    public $css;
    public $titulo;
    
    function __construct($sql, $estilo = "azulitos", $caption) {
       $this->resultado = $sql;
       $this->css = $estilo;
       $this->titulo = $caption;
    }
    
    function pintar(){
        echo "<link href=\"css/".$this->css.".css\" rel=\"stylesheet\" type=\"text/css\"/>";
        $campos = $this->resultado->fetch_fields();
        echo "<div class=\"datagrid\"><table><caption>".$this->titulo."</caption><thead><tr>";
        foreach ($campos as $value) {
            echo "<th>". $value->name . "</th>";
        }
        echo "</tr></thead><tbody>";
        while($fila = $this->resultado->fetch_array(MYSQLI_NUM)){
            echo "<tr>";
            for($i = 0; $i < $this->resultado->field_count; $i++){
                echo "<td>".$fila[$i]."</td>";
            }
            echo "</tr>";
        }
        echo "</tbody></table></div>";
    }
}

