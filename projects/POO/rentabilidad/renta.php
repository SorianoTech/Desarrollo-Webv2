<?
class inversion {

   public $cantidad;
   public $rentabilidad;

   
public function __construct($cant, $rent) {
       $this->cantidad = $cant;
       $this->rentabilidad = $rent;
    }

public function calcular()
   {
       $total = ($this->cantidad * ($this->rentabilidad+100 ))/ 100;
       //$total = $this->cantidad * $this->rentabilidad;
       echo "Usted ha invertido ". $this->cantidad. " a una rentabilidad del ". $this->rentabilidad." hace un total de: ". $total." €";
   }
}


?>