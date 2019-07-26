<!DOCTYPE html>

  
</body>
</html>
<html lang="en"><head><meta charset="UTF-8"><meta name="viewport"content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible"><style>

body{
  background-color:#173F5E;
  color:white;
}
#login {
  width: 20%;
  margin: auto;
  padding: 20px;
  border: solid 1px black;
  background-color: #3F7FBF;
}

h1{
  text-align:center;
  color:white;
}

input {
  width: 80%;
  height: 5%;
  display: block;
  margin: auto;
  padding: 10px;
  box-sizing: border-box;
  border: none;
  background-color: #3CBC8D;
  color: white;
  
}

</style>


<title>Acceso</title>
</head>
<body>
  
<?php include ('bbdd.php');
print_r($usuarios);

//Si no tengo la cookie usuario muestro el formulario de acceso
?><? if(!isset($_COOKIE['usuario'])) {?>

<div id="login">
    <form action="autenticacion.php"method="post">
      <h1>Control de Acceso</h1>
      <input type="text"name="username" placeholder="Usuario" required="">
      <input type="password"name="password"placeholder="Password" required="">
      <input type="submit"value="Acceso">
    </form>
  </div>
  <?}
else {
  //si hay cookie entonces muestra el contenido?>
  <h3>Bienvenido <?echo $_COOKIE['usuario']; ?></h3>
  <a href="cerrar_sesion.php">Cerrar sesión</a>
  <h3>Contenido Premium</h3>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt et magni possimus molestias ratione modivoluptas ! Sint error,
  velit ratione optio non dolor minima repudiandae neque,
  saepe ducimus,
  minus reiciendis.</p>
  <?
}

?>
</body></html>