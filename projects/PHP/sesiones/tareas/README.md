# Descripción

Generar una lista de tareas generando un fichero txt o json que se almacene en el servidor. Este fichero tiene que poder ser accesible mediante el metodo GET. Unicamente se podrá acceder a estas tareas los usuarios autentificados por lo que necesitaremos una ventana de acceso mediante sesiones.

*Mejoras*

- [ ] Tiene que ser posible poder asignar una tarea a un usuario, y solo puede marcarla como finalizada el usuario.
- [ ] Tratar los datos con ficheros json.
- [ ] Crear un JSON para identificar las tareas.
- [ ] Cambiar las funciones de sistema de ficheros a **file_get_contents** y **file_put_contents**.

## Tareas

- [x] Generar una web de acceso mediante que nos guarde la sesion.
- [ ] Organizar estructura de archivos.
  


## Recursos a utiliza

### Funciones

 - [fopen]( https://www.php.net/manual/es/function.fopen.php)
 - fwrite
 - fread
 

## Ficheros

### Sesion

- **cerrar_sesion.php:** comprueba si la sesión esta abierta, y elimina el valor de la array de sesion.
- **usuario.php:** Comprueba que el usuario existe y hace un llamamiento al archivo de tareas. 
- **index.php:** Pantalla de login de usuarios. Contiene un array con los usuarios validos.

### Aplicación

- **tareas.php:** Nos pinta un formulario para añadir tareas y busca en el fichero de tareas para imprimirlas. También nos da la posibilidad de cerrar sesión con un enlace a `cerrar_sesion.php`
- **crear.php:** Abre el fichero de listado.txt e introduce el valor recibido por POST.
- **borrar.php:** Abre el fichero de listado.txt y elimina el elemento recibido por GET.

### CSS y BBDD

- listado.txt
- main.css
- style.css