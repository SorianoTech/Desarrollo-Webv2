<?php
include_once '../datos.php';

spl_autoload_register(function ($nombre_clase) {
    include $nombre_clase . '.php';
});
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            table{
                border: 1px solid #000000;
            }
            
            td{
                border: 1px solid #000000;
            }     
            #mapid { height: 180px; }
        </style>
    </head>
    <body>

        
        <?php
            $sql = "select proyectos_log.log, proyectos_log.fecha, proyectos_proyecto.proyecto from proyectos_log, proyectos_proyecto where proyectos_proyecto.id = proyectos_log.id_proyecto";
            $resultado = $mysqli->query($sql);
            $mitabla_alertas  = new tabla($resultado, 'azulitos', 'Mis Alertas');
            $mitabla_alertas->pintar();
        ?>

        
        
         <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
         
         <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin=""></script>
         
         <div id="mapid"></div>
         
         <script>
             var mymap = L.map('mapid').setView([40.426708, -3.704231], 10);
            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox.streets'
            }).addTo(mymap);
             
         </script>
         
         
         
    </body>
</html>
