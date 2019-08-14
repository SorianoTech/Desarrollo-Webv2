<?
//Fichero de prueba para generar una tabla con con elementos que contiene un fichero JSON
//Tenemos que tener en cuanto que cuando se pasa el json_decode nos devuelve un objeto, pero si le pasamos el true nos devuelve una array

//$json = '{"nombre":"Encriptacion","b":2,"c":3,"d":4,"e":5}';
$contents = file_get_contents("projects.json");
//echo 'Imprime contenido' . $contents;
//$contents = utf8_encode($contents);
$json_data = json_decode($contents, true);


//$json_data = json_decode(include("projects.json"), false);
echo '<pre>ooo';
var_dump($json_data);
echo '</pre>';



//print $json_data->{'foo-bar'}; // 12345

 echo '<table>';
  echo ' <thead>
            <tr>
              <th>Proyecto</th>
              <th>Código</th>
              <th>Descripción</th>
              <th>Fecha</th>
            </tr>
            </thead>
            <tbody>';
foreach ($json_data as $clave => $valor) {
  echo $valor['nombre'] . '<br />';
  echo $valor['url_nombre'] . '<br />';
  echo $valor['url_codigo'] . '<br />';
  echo $valor['descripcion'] . '<br />';
  echo $valor['fecha'] . '<br />';

  
  //Imprime los elementos de la tabla
  echo '
  <tr>
    <td><a href="'.$valor['url_nombre'].'" target="_blank">'.$valor['nombre'].'</a></td>
    <td><a href="'.$valor['url_codigo'].'" target="_blank">Aquíaaa</a></td>
    <td>'.$valor['descripcion'].'</td>
    <td>'.$valor['fecha'].'</td>
  </tr>';
  
}
 echo '</tbody>';
 echo '</table>';
