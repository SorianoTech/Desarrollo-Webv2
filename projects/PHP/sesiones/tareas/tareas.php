<html>
<head>
 <title>Create Todo list</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
  
  <?include_once('funciones.php');?>
  <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<div class="container">
  <h1>Crear Lista de Tareas</h1>
  
    <form method="post" action="crear.php">
      <p>Lista de tareas: </p>
      <input name="tarea" type="text">
      <br>
      <input type="submit" name="enviar" value="crear">
    </form>

    <?

    //$tareas = $fichero = fopen("listado.txt", "r");
    $lista = file("listado.txt");
    
    echo '<ul>';
    foreach ($lista as $key => $valor) {
      //if ($n > 5) break;
      echo '<li>'. $valor;
      echo '<a href="borrar.php?key='.$key.'"><i class="fas fa-trash-alt"></i></a>';
      echo '</li>';
    }
    echo '</ul>';?>
  </div>

</body>
</html>