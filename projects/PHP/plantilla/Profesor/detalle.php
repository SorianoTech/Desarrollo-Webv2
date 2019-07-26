<?
	include('funciones/articulo_completo.php');
	include('bbdd/array.php');
	include('bbdd/array_textos.php');

	$id = $_GET['id'];

	$title = $datos[$id][0];
?>
<? include('partes/header_0.php'); ?>


<? 
	
	echo $textos[$id];
	articulo_completo($datos[$id], $textos[$id]); 
?>


<? include('partes/header.php'); ?>

<? include('partes/aside.php'); ?>
<? include('partes/footer.php'); ?>
