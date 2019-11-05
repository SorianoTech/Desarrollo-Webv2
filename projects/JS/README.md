
1. Ejercicio para crear un plugin que genere de forma automática una **tabla de contenido** (índice TOC) con los h1-h7 . Y cuando le de a un enlace externo me muestre una ventana modal para poder dejar nuestro correo.

- Tenemos que añadir en los títulos un <a href="#titulo"></a> href del enlace el nombre del titulo con una almuadilla previa. #Titulo 1

<a href="#titulo">1.1 Titulo</a>

<h1 name="titulo"Titulo 1></h1>


Con este ejercicio con javascript tenemos que generar automáticamente el contenido. 

  1. Tendremos que recorrer todo el DOM para leer los elementos que existen con h1-h2. 
  2. Añadir una etiqueta name a cada uno de los elementos para poder referenciarlos en los enlaces.
  3. Crear el indice, con etiquetas <a> y el enlace igual a la etiqueta name que hemos creado.


2. Crear una **lista de la compra** que añada el contenido de forma dinámica. Utilizando javascript.

- Base de datos para guardar los elementos de la lista de la compra
- Peticiones AJAX para guardar los elementos.

3. Generar un **bingo** que genere los cartones con javascript.

4. Hace un juego de **damas** con javascript.

5. Generar un juego con cuadrados pares que tengas que encontrar los pares iguales.

6. Generar una aplicación que tenga en un back preguntas de exámenes y me genere exámenes. Según vaya respondiendo las preguntas tengo que ver la respuestas.  
