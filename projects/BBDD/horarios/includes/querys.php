
<?
//include '../includes/prohibir.php';
//include '../includes/datos.php'; 
//include '../includes/querys.php'; 

//Muestra todos los empleados de la empresa $id
$query_empleados = "SELECT horarios_empleados.id, horarios_empleados.nombre, horarios_empleados.apellido, horarios_empleados.mail, horarios_empleados.fecha_nacimiento, horarios_empleados.dni, horarios_empleados.genero  FROM horarios_empleados, horarios_empresa WHERE horarios_empresa.id =$id_empresa and horarios_empleados.id_empresa=$id_empresa";

//echo $query_empleados;
$resultado_empleados = $mysqli->query($query_empleados);

//Obtener el ultimo estado de un empleado
//$query_estado="SELECT estado FROM horarios_historial WHERE id_empleado = id ORDER BY `fecha_estado` ASC LIMIT 1";

/*$query_estado="SELECT horarios_historial.estado, horarios_empleados.id as id_empleado FROM horarios_historial, horarios_empleados WHERE horarios_historial.id_empleado = $id_empleado ORDER BY 'fecha_estado' ASC LIMIT 1";

$resultado_estado = $mysqli->query($query_estado);
*/


// Sacar las dos ultimas entradas de un usuario //
//SELECT horarios_historial.fecha_estado,horarios_empleados.nombre FROM horarios_historial, horarios_empleados WHERE horarios_historial.id_empleado = 3 and horarios_empleados.id = 3 ORDER BY horarios_historial.fecha_estado DESC LIMIT 2

// Para sacar los registros del día actual de hoy //
//
//$query_historial="SELECT horarios_historial.fecha_estado,horarios_empleados.nombre FROM horarios_historial, horarios_empleados WHERE horarios_historial.id_empleado = 3 and horarios_empleados.id =3 and horarios_historial.fecha_estado >= CURDATE() ORDER BY horarios_historial.fecha_estado DESC";

?>