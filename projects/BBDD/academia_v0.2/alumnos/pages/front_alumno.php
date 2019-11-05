<?include_once ('../../includes/datos.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Front Alumnos</title>
</head>
<body>
  <h1>Frontal Alumnos</h1>
  <p>En este frontal el alumno puede seleccionar la materia y visualizar que profesores hay disponibles y las fechas para enviarles una petición</p>

  <h2>Seleccione la materia</h2>
  <?php
  $query="SELECT * from materias";
  $resultado = $mysqli->query($query);
  echo "<form action=''>";
  echo "<select name='materia' onchange='verHoras(this.value)'>";
  while($fila = $resultado->fetch_assoc()){
    $materia=$fila['materia'];
     echo "<option value='".$materia."'>".$materia."</option>"; 
    
  }
  ?>
  </select>
  </form>
  <div id="txtHint">Listado de profesores disponibles</div>


  <script>
    function verHoras(str) {
      var xhttp;    
      if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
      }
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("txtHint").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "../includes/verHoras.php?materia="+str, true);
      xhttp.send();
    }
  </script>

</body>
</html>