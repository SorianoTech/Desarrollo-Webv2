<?
	$title = 'ESTA ES MI PÁGINA';
	include('funciones/generar_listados.php');
	include('bbdd/array.php');

?>
<? include('partes/header_0.php'); ?>
<? include('partes/header.php'); ?>

<?

	generar_listado($datos);
	$datos = '';

    $url = ['https://as.com/rss/ciclismo/portada.xml'];
    foreach ($url as $clave => $value) {
        $all_api_call = simplexml_load_file($value); 
        $i = 0;
        foreach ($all_api_call->channel->item as $valor){
        	$datos[$i][0] = $valor->title;
        	$datos[$i][1] = '';
        	$i++;
        }          
    }
            
    generar_listado($datos);

	





?>

<? include('partes/aside.php'); ?>
<? include('partes/footer.php'); ?>


