<?php

//Query para scar el listado de proyectos
$query = "SELECT * FROM proyectos_proyecto";
$resultado = $mysqli->query($query);


//Query para sacar el número de todas las alertas
$query_result_alertas = "SELECT COUNT(proyectos_alertas.id) as total FROM proyectos_alertas, proyectos_proyecto WHERE proyectos_alertas.id_proyecto=proyectos_proyecto.id";
$resul_alertas = $mysqli->query($query_result_alertas);
$resul_alertas = $resul_alertas->fetch_assoc();

// Select para sacar todas las alertas en lista global
$query_global_alertas = "SELECT proyectos_alertas.id as id, proyectos_proyecto.proyecto as proyecto, proyectos_alertas.alerta as alerta, DATE_FORMAT(proyectos_alertas.fecha,'%d-%b-%Y') as fecha FROM proyectos_alertas,proyectos_proyecto WHERE proyectos_proyecto.id=proyectos_alertas.id_proyecto ORDER BY proyectos_alertas.fecha ASC";
$resultado_global_alerta = $mysqli->query($query_global_alertas);

//query para sacar las alertas del dominio                            
$query_alerta = "SELECT proyectos_alertas.id as id, proyectos_proyecto.proyecto as proyecto, proyectos_alertas.alerta as alerta, DATE_FORMAT(proyectos_alertas.fecha,'%d-%b-%Y') as fecha FROM proyectos_alertas, proyectos_proyecto WHERE proyectos_proyecto.id =
                            proyectos_alertas.id_proyecto
                            and proyectos_proyecto.proyecto = '" . $_GET['dominio'] . "' ORDER BY proyectos_alertas.fecha ASC";
$resultado_alerta = $mysqli->query($query_alerta);

//query para sacar los log de un dominio                            
$query_log = "SELECT * FROM proyectos_log, proyectos_proyecto WHERE proyectos_proyecto.id = proyectos_log.id_proyecto
                            and proyectos_proyecto.proyecto = '" . $_GET['dominio'] . "' ORDER BY proyectos_log.fecha DESC ";
$resultado_log = $mysqli->query($query_log);


//Query para sacar las alertas globales                            
$query_global_alertas = "SELECT proyectos_alertas.id as id, proyectos_proyecto.proyecto as proyecto, proyectos_alertas.alerta as alerta, DATE_FORMAT(proyectos_alertas.fecha,'%d-%b-%Y') as fecha FROM proyectos_alertas,proyectos_proyecto WHERE proyectos_proyecto.id=proyectos_alertas.id_proyecto ORDER BY proyectos_alertas.fecha ASC";
$resultado_global_alerta = $mysqli->query($query_global_alertas);


//query para sacar las alertas del dominio
$query_alerta = "SELECT proyectos_alertas.id as id, proyectos_proyecto.proyecto as proyecto, proyectos_alertas.alerta as alerta, DATE_FORMAT(proyectos_alertas.fecha,'%d-%b-%Y') as fecha FROM proyectos_alertas, proyectos_proyecto WHERE proyectos_proyecto.id =
                            proyectos_alertas.id_proyecto
                            and proyectos_proyecto.proyecto = '" . $_GET['dominio'] . "' ORDER BY proyectos_alertas.fecha ASC";
$resultado_alerta = $mysqli->query($query_alerta);


//query para sacar los log de un dominio 
$query_log = "SELECT * FROM proyectos_log, proyectos_proyecto WHERE proyectos_proyecto.id = proyectos_log.id_proyecto
                            and proyectos_proyecto.proyecto = '" . $_GET['dominio'] . "' ORDER BY proyectos_log.fecha DESC ";
$resultado_log = $mysqli->query($query_log);

//Delete para borrar alertas
$alerta = $_POST['id_alerta'];
$sql = "DELETE FROM proyectos_alertas WHERE proyectos_alertas.id=$alerta";



//delete para borrar proyectos
$proyecto = $_POST['proyecto'];
$sql = "DELETE FROM proyectos_proyecto WHERE proyectos_proyecto.proyecto=$proyecto";

?>