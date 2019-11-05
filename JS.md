# Apuntes JavaScript 

En javascript accedemos las los objetos y los métodos: `documento.write(variable);`

Por ejemplo 

```javascript
documento.write(variable);
//Escapo la cadena de texto (") para poder concatenarla.
document.write("\"" +  variable + "\"");
```


## Envio de datos por AJAX

Utilizar Jquery para el envío de datos por AJAX para que no sea necesario cargar la web completa para recibir una respuesta del servidor.

Podemos crear una función que sea ejecutada cuando por ejemplo presionamos un botón(onclick) o cuando se cambia un selector (onchange)

```javascript
function verproyecto(){
        $("#todo").hide(300);
        $("#todo").show(300);
        $("#alertas").hide(500);
        $("#texto_logs").val("");
        var id = $("#buscador").val();
        id_proyecto = id;
        $.ajax({
          method: "POST",
          url: "includes/recuperar-logs.php",
          data: { id: id}
        }).done(function(dato) {
            $("#listado_logs").html(dato);
          });        
          
        $.ajax({
          method: "POST",
          url: "includes/recuperar-alertas.php",
          data: { id: id}
        }).done(function(dato) {
            $("#listado_alertas").html(dato);
          });          
    }
```



**innerHTML**: accede al contenido html de una etiqueta, por ejemplo si dentro de una etiqueta a tenemos otra etiqueta img también nos lo mostrara. Se puede utilizar tanto para recoger los datos como para añadirlos.

**.value**: recoge los valores, solo se utiliza para etiquetas input

``<td>${carton[key]}``

## jQuery

