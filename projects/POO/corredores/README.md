# Ejercicio Serializar 

Ejercicio para practicar la serialización en PHP. La serialización consiste en el método de transformar un objeto a un formato manejable para su exportación y utilización. Por ejemplo podemos seralizar una consulta a una base de datos que nos devuelve un objeto con toda la información de la consulta para luego tratarla y mostrarla. 

Supongamos que tenemos una aplicación para el registro de corredores para una carrera popular. Tenemos un frontal web que permite a los corredores registrarse.

Por la noche se ejecuta una tarea en el servidor que ejecuta un fichero php en el que configuramos que se genere un fichero `txt` con el objeto serializado que utilizaremos para mostrar todos los datos de los corredores que se han registrado en nuestra aplicación.

- Para este ejercicio práctico utilizaremos una simple pagina con un botón que simulara la tarea cron del servidor.
- No es necesario generar el frontal web de registro, utilizaremos datos volcados a mano en la base de datos.
- La finalidad principal de este ejercicio es serializar los campos de la base de datos y pintarlos deserializandolos.
- Se debe de poder ordenar los campos de la tabla haciendo click en la cabecera.

## Tareas:

1. Diseño de la base de datos, contendrá los campos


Corredores |
---------|
 Dorsal  (int(3)) |
 Nombre (char(20)) | 
 Apellido (char(20))| 
Posición (int (3))|

2. Creación de la web que genera el fichero crearobj.txt (serializados) 
- crearobj.php


3. Crear un index que nos muestre los datos de los corredores
Para ello desieralizacemos el fichero y crearemos una tabla



