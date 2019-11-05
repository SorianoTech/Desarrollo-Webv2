<?
include_once ('../../includes/datos.php');
function validateDate($date, $format = 'Y-m-d H:i:s')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

if(isset($_POST['hora']) && isset($_POST['fecha']) && validateDate($_POST['fecha'], 'Y-m-d') && is_numeric($_POST['hora'])){
  //VARIABLES
  $fecha= $_POST['fecha'];
  $hora=$_POST['hora'];
  $id_profesor=$_COOKIE['id_profesor'];

  print_r($_POST);
  $sql="INSERT INTO horarios (fecha,hora,profesor) VALUES('$fecha',$hora,$id_profesor)";
  //echo $sql;
  $mysqli->query($sql);
  $mysqli->close();
  header("Location: ../pages/front_profesores.php");
  exit();    

}

?>