<?
  //si la cookie contador esta creada, le sumo 1
  if (isset( $_COOKIE[ 'contador' ] ) ) {
    setcookie( 'contador', $_COOKIE[ 'contador' ] + 1, time() + 3600 * 24 );
  }else{//Sino esta creada, la creo con valor 1
    setcookie( 'contador', 1, time() + 3600 * 24 );
  }
  //Al enviar el contenido por post, crea una cookie con nombre el valor de contador y valor le dato introducido por post.
  if(!empty($_COOKIE['contador'])){
    //setcookie($_COOKIE['contador'],$_POST['item'],time()+1000);
    setcookie($_POST['item'],$_COOKIE['contador'],time()+1000);
  }
  header('Location: lista.php');
  exit;
?>
