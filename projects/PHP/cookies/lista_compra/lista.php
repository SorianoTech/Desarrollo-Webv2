<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" >
  <title>Lista de la compra</title>
  <style>
    .container{
      width:50%;
      text-align:center;
      border:3px solid red;
      margin:auto;
    }
  </style>
</head>
<body>
<div class="container">
<?

//print_r($array);
//Contador de visitas
    if ( isset( $_COOKIE[ 'visitas' ] ) ) {

    setcookie( 'visitas', $_COOKIE[ 'visitas' ] + 1, time() + 3600 * 24 );
    $mensaje = 'Numero de visitas: '.$_COOKIE[ 'visitas' ];
}
else {

    setcookie( 'visitas', 1, time() + 3600 * 24 );
    $mensaje = 'Bienvenido por primera vez a nuestra web';
}

//Si entro por primera vez y no tengo la cookie de contador, la creo
if(empty($_COOKIE[ 'contador' ] )){
        setcookie( 'contador', 1, time() + 3600 * 24 );
      }

echo $mensaje;
?>

<h1>Lista de la compra</h1>
  <div id="lista">
    <form action="bbdd.php"method="post">
      <input type="text" name="item" placeholder="Item" required="">
      <input type="submit" value="Añadir">
    </form>
  </div>

  
  

  <?  
  //sort($_COOKIE);
  //Recorro la array de cookies y las imprimo
  foreach ($_COOKIE as $name => $value) {
    //echo '<input type="hidden" name='.$key.'>';
    if($name=='contador'){
      $value--;
    }
    //Enviamos por metodo GET los valores para borrar las cookies
    echo '<a>'.$name.':'.$value.' <a href="borrar.php?key='.$name.'&value='.$value.'">Borrar</a></p>';
  }?>

</div>
<?
  echo '<p>Array COOKIE</p>';
  echo '<pre>';
  print_r($_COOKIE);
  echo '</pre>';
  ?>

</body>
</html>