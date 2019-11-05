<?php
include_once ('../../includes/datos.php');

//$sql = "SELECT customerid, companyname, contactname, address, city, postalcode, country FROM customers WHERE customerid = ?";

$sql="SELECT profesores.nombre,horarios.fecha,horarios.hora FROM profesores,horarios,materias WHERE materias.materia= ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['materia']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($profesor, $fecha, $hora);
$stmt->fetch();
$stmt->close();

echo "<table>";
echo "<tr>";
echo "<th>Profesor</th>";
echo "<th>Fecha</th>";
echo "<th>Hora</th>";
echo "</tr>";
echo "<tr>";
echo "<td>" . $profesor . "</td>";
echo "<td>" . $fecha . "</td>";
echo "<td>" . $hora . "</td>";
echo "</tr>";
echo "</table>";
?>