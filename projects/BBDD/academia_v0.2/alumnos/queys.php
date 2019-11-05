
<?
//Query para mostrar el profesor que da tutorias de una materia, preguntando por el id
$query_horas_materias=SELECT profesores.nombre,horarios.fecha,horarios.hora FROM profesores,horarios,materias WHERE materias.id= 1

//Igual pero preguntado por el nombre de la materia
SELECT profesores.nombre,horarios.fecha,horarios.hora FROM profesores,horarios,materias WHERE materias.materia='Piano'

?>