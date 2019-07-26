<?  
  include('bbdd.php');
  //compruebo si la cookie es igual al usuario

  //buscar un valor en una array
  //$vedadero = array_key_exists($_POST['username'], $usuarios);
  //echo $vedadero;
  print_r($_POST);
  //print_r($usuarios);
 
    //Pregunto si el usuario enviado concuerda con la clave

    if(!empty($_POST['username'])){
      //si el usuario existe y la password es igual al valor del usuario.
      if( isset($usuarios[$_POST['username']]) && ($_POST['password'] == $usuarios[$_POST['username']]) ){
        setcookie('usuario', $_POST['username'], time()+1000);
        //sleep(2);
        header('Location: login.php');
        exit; //Si encuentro el usuario que concuerda con la pass salgo del if
        }else{//sino vuelvo a cargar la web de login
          header('Location: login.php');
        }
      }else{
           header('Location: login.php');
        }
       
  
?>