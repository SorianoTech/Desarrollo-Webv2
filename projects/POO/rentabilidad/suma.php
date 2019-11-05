<?

$a=1;
$b=2;
function suma() { 
  global $a,$b;
  $b=$a+$b;
  echo $b;
} 
suma();  


$p=8;
echo (($p>=8)? "GRANDE": (($p<4)? "PEQUE":""));

$a="b"; $b="c"; $c="d"; 
echo $a.$$a.$b.$$b.$c; 



//Elemento 3:  Cuenta de Valores: ES25 0182 3296 1520 3289 5846


$cuentas = array("Cuenta Principal"=>"ES07 0182 1254 1232 1245 9041","Cuenta Ahorro"=>array("ES14 0182 4554 1520 3289 1197"), "Cuenta de Valores"=>"ES25 0182 3296 1520 3289 5846");
//unset($cuentas['Cuenta de Valores']);

echo '<h1>Antes de ordenar</h1><pre>';
print_r($cuentas);
echo '</pre>';

//asort($cuentas);
ksort($cuentas);

echo '<h1>Después de ordenar con asort (Valores)</h1><pre>';
print_r($cuentas);
echo '</pre>';

foreach ($cuentas as $key => $value) {
  echo $key." : ". $value."<br>";
  $banco = substr($value, 5, -20);
  echo 'Código Banco ->'.$banco.'<br>';
}


function extraer($cuentas){
    foreach ($cuentas as $key => $value) {
    $banco = substr($value, 5, -20);
    echo 'Código Banco ->'.$banco.'<br>';
  }
}


echo '<br>Funcion<br>';
extraer($cuentas);
echo '<h1>Count array</h1>';
echo count($cuentas);

$cuentas += ['Cuenta Ahorro' => 'ES2'];

//$cuentas['Cuenta Ahorro']['Cuenta 1']= 'ES2';

echo '<h1>Después de añadir</h1><pre>';
print_r($cuentas);
echo '</pre>';

/*Original

$a=1;$b=2; function Suma() { 
$b=$a+$b; } 
Suma(); echo $b; 

*/
?>