<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Variables Variables</title>
</head>
<body>
  <?
  include_once ('/home/sergio/GITHUB/desarrollo-web/proyecto_curso/projects/BBDD/talleres/includes/datos.php');

  $a= 'hola';
  $$a ='payo';
  $$$a ='quieres';
  $$$a= 'melones?';

  #Imprimo $a y $hola='payo'
  echo "$a ${$a}";
  #Accediendo a la array $hola
  echo "<p>Array \$hola</p>";
  echo "<pre>";
    var_dump($hola);
  echo "</pre>";

  echo $$a[0];
  echo $$a[1];
  echo $$a[2];
  echo $$a[3];

## Recorriendo una arary con los nombres de las variables
$info    = array("nombre", "telefono", "mail","materia");
$name_nombre = "Juan";
$name_telefono = "65666555";
$name_mail = "pepe@gmail.com";
$name_materia= "Guitarra";
echo "<pre>";
print_r($info);
echo "</pre>";

 


# La variable $info contiene una array con el nombre de las variables
foreach($info as $tipo){
  echo ${"name_$tipo"} . "<br>";
}

# Ejecicios de profesor
##Ejemplo de la array recibida por POST
$info_2 = [
    "nombre" => "pepe",
    "telefono" => "12341234123",
    "mail" => "pepe@mail.com",
    "materia" => "guitarra",
];
//Construyo las variables que me vienen de un $_POST para utilizarlas en las consultas sql, puedo crear una funcion que reciba una array y me devuelva todas las variables de forma escapada.
foreach ($info_2 as $key => $value) {
        echo $key;
        echo ': ';
        echo $value;
        echo '<br>';
        $$key = mysqli_real_escape_string($mysqli, $value);
    }
var_dump($key);  
echo "<h2>Imprimimos las variables que me vienen de key</h2>";
echo $nombre;

//Función para escapar los valores de una array y crear variables por cada value 
function escapar($datos){
  foreach ($datos as $key => $value) {
  $$key = mysqli_real_escape_string($mysqli, $value);
  }
}

# Como podemos usarlo si los datos me vienen de POST?
echo "<h1>Ejemplo de clases</h1>";
## Creamos una clase foo
class foo {
    var $bar = 'Soy bar.';
    var $arr = array('Soy A.', 'Soy B.', 'Soy C.');
    var $r   = 'Soy r.';
}

#Creo un objeto de la clase foo
$foo = new foo();
## Imprimo el objeto para ver el contenido
echo "<pre>";
  print_r($foo);
echo "</pre>";

$bar = 'bar';
$baz = array('foo', 'bar', 'baz', 'quux');
echo "<p>Imprime la variable $bar de la clase foo</p>";
echo $foo->$bar . "<br>";
echo $foo->{$baz[1]} . "<br>";

$start = 'b';
$end   = 'ar';
echo $foo->{$start . $end} . "\n";

$arr = 'arr';
echo $foo->$arr[1] . "\n";
echo $foo->{$arr[1]} . "\n";


?>


</body>
</html>



