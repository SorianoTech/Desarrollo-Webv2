<?php

//Query para scar el listado de proyectos  ** version uniempresa
$query = "SELECT * FROM proyectos_proyecto";
$resultado = $mysqli->query($query);

//Query para scar el listado de proyectos  ** version multiempresa
$query = "SELECT proyectos_proyecto.id, proyectos_proyecto.proyecto  FROM proyectos_proyecto, proyectos_empresa WHERE proyectos_proyecto.id_empresa = proyectos_empresa.id and proyectos_empresa.clave = '" . $_COOKIE['clave'] . "'";
$resultado = $mysqli->query($query);


//////////////GLOBALES/////////////////////////
//Query para sacar el *número* de todas las alertas globales ** uniempresa
$query_result_alertas = "SELECT COUNT(proyectos_alertas.id) as total FROM proyectos_alertas, proyectos_proyecto WHERE proyectos_alertas.id_proyecto=proyectos_proyecto.id";
$resul_alertas = $mysqli->query($query_result_alertas);
$resul_alertas = $resul_alertas->fetch_assoc();

//Query para sacar el *número* de todas las alertas globales ** multiempresa--
$query_result_alertas = "SELECT COUNT(proyectos_alertas.id) as total FROM proyectos_alertas,proyectos_proyecto, proyectos_empresa WHERE proyectos_proyecto.id=proyectos_alertas.id_proyecto and proyectos_proyecto.id_empresa = proyectos_empresa.id  and proyectos_empresa.id = '$id' ";
$resul_alertas = $resul_alertas->fetch_assoc();

// Select para sacar todas las alertas en lista global ** uniempresa
$query_global_alertas = "SELECT proyectos_alertas.id as id, proyectos_proyecto.proyecto as proyecto, proyectos_alertas.alerta as alerta, DATE_FORMAT(proyectos_alertas.fecha,'%d-%b-%Y') as fecha FROM proyectos_alertas,proyectos_proyecto WHERE proyectos_proyecto.id=proyectos_alertas.id_proyecto ORDER BY proyectos_alertas.fecha ASC";
$resultado_global_alerta = $mysqli->query($query_global_alertas);

// Select para sacar todas las alertas en lista global ** multiempresa
$query_global_alertas = "SELECT proyectos_alertas.id as id, proyectos_proyecto.proyecto as proyecto, proyectos_alertas.alerta as alerta, DATE_FORMAT(proyectos_alertas.fecha,'%d-%b-%Y') as fecha FROM proyectos_alertas,proyectos_proyecto, proyectos_empresa WHERE proyectos_proyecto.id=proyectos_alertas.id_proyecto and proyectos_proyecto.id_empresa = proyectos_empresa.id  and proyectos_empresa.id = '1' ORDER BY proyectos_alertas.fecha ASC";
$resultado_global_alerta = $mysqli->query($query_global_alertas);


////////////////DOMINIO//////////////////////
//query para sacar las alertas del dominio                            
$query_alerta = "SELECT proyectos_alertas.id as id, proyectos_proyecto.proyecto as proyecto, proyectos_alertas.alerta as alerta, DATE_FORMAT(proyectos_alertas.fecha,'%d-%b-%Y') as fecha FROM proyectos_alertas, proyectos_proyecto WHERE proyectos_proyecto.id =
                            proyectos_alertas.id_proyecto
                            and proyectos_proyecto.proyecto = '" . $_GET['dominio'] . "' ORDER BY proyectos_alertas.fecha ASC";
$resultado_alerta = $mysqli->query($query_alerta);



//query para sacar los LOGS de un dominio         *** Version uniempresa                   
$query_log = "SELECT * FROM proyectos_log, proyectos_proyecto WHERE proyectos_proyecto.id = proyectos_log.id_proyecto
and proyectos_proyecto.proyecto = '" . $_GET['dominio'] . "' ORDER BY proyectos_log.fecha DESC ";
$resultado_log = $mysqli->query($query_log);

//query para sacar los LOGS de un dominio         *** Version multiempresa  
$query_log = "SELECT proyectos_log.id, proyectos_log.log, proyectos_empresa.id, proyectos_proyecto.id, proyectos_log.fecha FROM proyectos_log, proyectos_proyecto, proyectos_empresa WHERE proyectos_proyecto.id = proyectos_log.id_proyecto and proyectos_empresa.id=proyectos_log.id_empresa AND proyectos_proyecto.proyecto = '" . $_GET['dominio'] . "' and proyectos_log.id_empresa = '".$id."' and proyectos_empresa.clave = '".$clave."' ORDER BY proyectos_log.fecha DESC";


//query para sacar las ALERTAS del dominio *** version uniempresa
$query_alerta = "SELECT proyectos_alertas.id as id, proyectos_proyecto.proyecto as proyecto, proyectos_alertas.alerta as alerta, DATE_FORMAT(proyectos_alertas.fecha,'%d-%b-%Y') as fecha FROM proyectos_alertas, proyectos_proyecto WHERE proyectos_proyecto.id =
                            proyectos_alertas.id_proyecto
                            and proyectos_proyecto.proyecto = '" . $_GET['dominio'] . "' ORDER BY proyectos_alertas.fecha ASC";
$resultado_alerta = $mysqli->query($query_alerta);

//query para sacar las ALERTAS del dominio *** version multi por hacer
$query_alerta = "SELECT proyectos_alertas.id as id, proyectos_proyecto.proyecto as proyecto, proyectos_alertas.alerta as alerta, DATE_FORMAT(proyectos_alertas.fecha,'%d-%b-%Y') as fecha FROM proyectos_alertas, proyectos_proyecto, proyectos_empresa WHERE proyectos_proyecto.id = proyectos_alertas.id_proyecto and proyectos_empresa.id=proyectos_alertas.id_empresa AND proyectos_proyecto.proyecto = '" . $_GET['dominio'] . "' and proyectos_alertas.id_empresa = '".$id."' and proyectos_empresa.clave = '".$clave."' ORDER BY proyectos_alertas.fecha ASC";
$resultado_alerta = $mysqli->query($query_alerta);



///////////////INSERT






//Delete para borrar alertas
$alerta = $_POST['id_alerta'];
$sql = "DELETE FROM proyectos_alertas WHERE proyectos_alertas.id=$alerta";



//delete para borrar proyectos
$proyecto = $_POST['proyecto'];
$sql = "DELETE FROM proyectos_proyecto WHERE proyectos_proyecto.proyecto=$proyecto";

?>