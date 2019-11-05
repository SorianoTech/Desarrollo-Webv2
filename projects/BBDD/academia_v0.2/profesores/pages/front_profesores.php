<? include_once '../includes/prohibir.php'; ?>
<? include_once '../../includes/datos.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/styles/default.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/highlight.min.js"></script>
  <script>
    hljs.initHighlightingOnLoad();
  </script>
  <title>Frontal Profesor</title>
  <style>
    .code {
      width: 30%;

      background-color: grey;
    }
  </style>
</head>

<body>
  <h1>Bienvenido a la plataforma de los profesores: </h1>

  <p>- Aquí podrás guardar las horas de tutorías que tienes disponibles.</p>
  <p>- Ver las tutorías que tienes guardadas.</p>

  <? print_r($_COOKIE);?>

  Necesito:
  -Formulario para guardar las tutorias hora
  -Ver las tutorias que tiene el profesor

  <!--AÑADIR TUTORIA-->
  <form method="POST" action="../includes/alta_tutoria.php">
    <input type="date" name="fecha" placeholder="Fecha">
    <select name="hora">
      <?
      for ($i=8; $i <16 ; $i++) { 
        echo "<option value='".$i."'>".$i." pm</option>";
      }
      ?>
    </select>
    <input type="submit" value="Guardar">
  </form>

  <h1>Listado de horas disponibles:</h1>
  <?
  //$id_profesor=$_COOKIE['id_profesor'];
  $query="SELECT * from horarios WHERE profesor=$id_profesor ORDER by `fecha` asc" ;
  $resultado = $mysqli->query($query);
  echo $query;
  ?>
  <ul>
    <?  
  while($fila = $resultado->fetch_assoc()){
    $hora=$fila['hora'];
    $date = new DateTime($fila['fecha']);

    echo "<li>".$date->format('d-m-Y')."-HORA->".$hora."</li>";
  }
  ?>
  </ul>


  <h2>Código</h2>
  <!--<div class="code">-->
  <pre><code>
      &lt;h1>Listado de horas disponibles:&lt;/h1>
      &lt;?
      $id_profesor=$_COOKIE['id_profesor'];
      $query="SELECT * from horarios WHERE id=$id_profesor";
      $resultado = $mysqli->query($query);
      echo $query;
      ?>
      &lt;ul>
      &lt;?
      while($fila = $resultado->fetch_assoc()){
      $date = new DateTime($fila['fecha']);
      echo "&lt;li>".$date->format('d-m-Y')."&lt;/li>";
      }
      ?>
    </pre></code>
  <!--</code>
  </div>-->
</body>

</html>