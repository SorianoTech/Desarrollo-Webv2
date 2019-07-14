
<?
// Defining a multidimensional array

//Definir una aray multidimensional que contenga de cada partido politico la cantidad de votos y el portanje en en relacion al total

$favorites = array( 
	"Dave Punk" => array( 
		"mob" => "5689741523", 
		"email" => "davepunk@gmail.com", 
	), 
	"Dave Punk" => array( 
		"mob" => "2584369721", 
		"email" => "montysmith@gmail.com", 
	), 
	"John Flinch" => array( 
		"mob" => "9875147536", 
		"email" => "johnflinch@gmail.com", 
	) 
); 

// Using for and foreach in nested form 

//Defino la array que contiene los partidos
$keys = array_keys($favorites); 


for($i = 0; $i < count($favorites); $i++) { 
	echo $keys[$i] . "\n"; 
	foreach($favorites[$keys[$i]] as $key => $value) { 
		echo $key . " : " . $value . "\n"; 
	} 
	echo "\n"; 
} 
?>