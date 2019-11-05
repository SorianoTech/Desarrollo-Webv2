# 1. Curso de desarrollo web

Este repositorio es una guía sobre los conceptos y herramientas que he ido aprendiendo en el curso de desarrollo de aplicaciones web **IFCD0210**, puedes encontrar un resumen teórico sobre java [aquí](http://sorianotech.github.io).

Una vez aprendidos estos conocimientos teóricos hemos realizado prácticas durante 5 meses utilizando el stack (LAMP) y los siguientes lenguajes web.

- [`HTML`](https://www.w3.org/TR/?tag=html)
- [`CSS`](https://www.w3.org/TR/?tag=css)
- [`JS`](https://en.wikipedia.org/wiki/ECMAScript)
- [`PHP`](https://www.php.net/)

Para realizar los diseños de aplicaciones web seguiremos el siguiente fases:

1. **Diseño**: consiste en realizar un dibujo visual de cuales son los elementos que van a componer la aplicación. Intentaremos dibujar los máximos detalles posibles, puedes hacer el dibujo en un simple cuaderno.También tendremos que describir todas las funcionalidades, por ejemplo un buscador.

2. **Creación de la base de datos**: esta fase consiste en definir todos los datos que necesitamos guardar así de como todas las relaciones posibles entre las tablas. Por ejemplo, usuarios, password, categorias, fechas, etc.

3. **Maquetación**: En esta fase colocaremos todos los elementos utilizando el dibujo utilizando las etiquetas de HTML.

4. **Programación**: consistirá en llevar a cabo toda la lógica y contenido dinámico utilizando php.

## 1.1. [HTML](html.md)

Conceptos estudiados:

- Elementos fundamentales necesarios.
- Estructura de etiquetas en HTML5.

### 1.1.1. Enlaces HTML

- [Boilerplate HTML5](https://html5boilerplate.com/)
- [Plantillas Skeleton](http://getskeleton.com/)
- [Cheatsheet](https://htmlcheatsheet.com/)
- [Templates HTML5](https://html5up.net/)
- [Admin Backend Templates](https://www.bootstrapdash.com/free-bootstrap-admin-templates/)

### 1.1.2. Librerias HTML

- [Bootstrap](https://getbootstrap.com/docs/)
  - [Plantilla Stellar](https://github.com/BootstrapDash/Stellar)
  - [Plantillas Gratis](https://startbootstrap.com/themes/)
- [Foundation](https://foundation.zurb.com/)
- [Materialize](https://materializecss.com/)

### 1.1.3. Framework HTML

[Hugo - Generador de sitios estáticos](https://gohugo.io/)

---

## 1.2. CSS

**Menus**: para crear menus utilizamos la propiedad [display](https://www.w3schools.com/css/css_inline-block.asp) con listas.

**Fotabilidad de las cajas**: aprendemos como colocar diferentes elementos a lo largo de una pagina web y vemos como podemos ser capaces de ubicar cada uno de elementos en una página web.

- Float: con la opción de float podemos colocar elementos por la pantalla de forma independiente, se suele utilizar principalmente para colocar los títulos, los menús o elementos de publicidad.

- [Flex box](https://lenguajecss.com/p/css/propiedades/flexbox): para elementos que son similares, por ejemplo **artículos**. Todos los contenedores va a ir de forma organizada hasta ocupar el ancho de la pantalla y cuando se rellene se colocará automáticamente en la siguiente linea. El tamaño de las cajas será el que tenga la mas grande de la linea, si hay otra caja en otra linea no influye. Primero indicamos cuanto queremos que ocupe la sección respecto al body y luego con la opción de `flex-wrap: wrap` pegará un salto de linea cada vez que los elementos ocupen el porcentaje fichado anteriormente.
  - Mas información visual- [CSS-TRICK](https://css-tricks.com/snippets/css/a-guide-to-flexbox/)

**[Pseudoclases](https://developer.mozilla.org/es/docs/Web/CSS/Pseudo-classes)**: son estados especiales de un elementos. Por ejemplo un enlace `a` que cambia de color cuando es clicado o para rellenar con un color especifico las cajas pares.

- Ejemplo de selectores de pseudoclases [aquí](http://byverdu.es/css3-como-usar-los-selectores-de-las-pseudo-classes-nth-child-nth-of-type-y-not/).

### 1.2.1. Enlaces CSS

- [CSS Mozilla](https://developer.mozilla.org/es/docs/Web/CSS)
- [W3School](https://www.w3schools.com/css/default.asp)

### 1.2.2. Librerías CSS

- [PureCSS](https://purecss.io/)
- [Inter Fuentes](https://rsms.me/inter/samples/)
- [Normalize CSS](https://necolas.github.io/normalize.css/)

### 1.2.3. Herramientas CSS

- https://colourco.de/
- http://animista.net/

---

## 1.3. JavaScript

Lenguaje orientado a eventos, podemos provocar cambios en el DOM utilizando diferentes eventos que llamas por ejemplo a funciones.

- Petición AJAX utilizando JQuery para envío de datos por post.
- En javascript accedemos a los objetos, los métodos: `documento.write(variable);`
- Las variables son globales cuando no la definimos con var. `url = this.href`
- [windows.location](https://developer.mozilla.org/es/docs/Web/API/Window/location)
- prevent.Default() - Previene que se ejecute el evento por defecto. 

Por ejemplo: 

```javascript
documento.write(variable);
//Escapo la cadena de texto (") para poder concatenarla.
document.write("\"" +  variable + "\"");
```

- [Guía de estudio](https://uniwebsidad.com/libros/javascript)

### 1.3.1. Librerías Javascript

- [Jquery UI](https://jqueryui.com/)
  - [Selecto2 - Selects con buscador](https://select2.org/)

### 1.3.2. Frameworks Javascript

- [Vue](https://vuejs.org/v)
- [React](https://es.reactjs.org/)
- [Angular](https://angular.io/docs)

### 1.3.3. Enlaces JavaScript

- [Webpack](https://webpack.js.org/)
- [Browserft](http://browserify.org/)
- [Node](https://nodejs.org/en/) - Servidor, equivaldría a PHP
- [NPM - Gestor de paquetes](https://www.npmjs.com/)
- [Alternativas a jQuery](http://youmightnotneedjquery.com)
- [Vanila JS](http://vanilla-js.com/)

### 1.3.4. Editor de texto en Javascript

- [Summernote](https://summernote.org/)
- [Quill](https://quilljs.com/)

---

## 1.4. PHP

- [Conceptos Básicos](conceptos_basicos_php.pdf)

El lenguaje que nos permite crear contenido desde el lado de servidor para mostrar contenido en la lado del cliente.

- Hay que tener en cuenta que el contenido que en HTML utilizada comillas dobles `"`, en para combinar PHP y HTML tenemos que utilizar comillas simples `'`.
- En PHP podemos definir el límite de ejecuciones que realice un bucle, asi impedimos que se creen bucles infinitos. Esta configuración se lleva a cabo en apache.
- Definición de variables.
- Para concatenar código html con código php dentro de las etiquetas de `<?php ?>` se utiliza el punto `.`
- Las variables en PHP se definen con el símbolo `$` (\$variable) y no es necesario indicar el tipo de variable, php es capaz de identificar si es de tipo texto o numérica.
- [Conocer como activar los errores en PHP para mostrarlo en la web(en tiempo de ejecución).](https://www.anerbarrena.com/mostrar-errores-php-608/)
- Con la etiqueta hidden en un input puedo llevarme los valores que recibo de un formulario para mas tarde comprobar los datos.
- Cookies vs Sesiones. Cookies se almacenan en el cliente, las sesiones de almacenan en el servidor.
- Securizar el control de acceso mediante cookies, sesiones y \$\_SERVER.
- [Variables Variables](https://www.php.net/manual/es/language.variables.variable.php). Nos crea un variable por cada elemento de una array. Por ejemplo lo que recibimos de un formulario.
- [Retrollamadas](https://www.php.net/manual/es/memcached.callbacks.result.php)(Callback).
- [Generadores](https://www.php.net/manual/es/language.generators.overview.php). Nos permite ejecutar una función repetidamente, como por ejemplo para devolver todas las lineas de un fichero llamando a un función. La palabra reservar en vez de return es `yield`.
- [La seguridad de la constraseñas.](https://www.php.net/manual/es/faq.passwords.php) Sin hashing, cualquier contraseña que se almacene en la base de datos de la aplicación podrá ser robada si la base de datos se ve comprometida.
- [Programación orientada a objetos con PHP](https://www.php.net/manual/es/language.oop5.php)
- [Serialización](https://www.php.net/manual/es/language.oop5.serialization.php) - Guardar datos en un fichero o base de datos de forma permanente basado en un objeto. Podemos recuperar el objeto para utilizar sin tener que consultar la base de datos.
- Subida de [ficheros](https://www.php.net/manual/es/features.file-upload.post-method.php) mediante POST.
- [Funciones de GD para tratar imagenes ](php.net/manual/es/ref.image.php)
- [System command](https://www.php.net/manual/es/function.system.php), para ejecutar comandos del sistema en ficheros php
- [Validar una imagen leyendo la cabezera mime/type ](https://www.php.net/manual/es/function.image-type-to-mime-type.php)

### 1.4.1. Programación orientada a objetos (POO)

- [Lo básico](https://www.php.net/manual/es/language.oop5.basic.php)
- **Clases**: se componen de...

  - **Constantes**: son variables que no cambian de valor durante toda la ejecución.
  - **Propiedades(variables)**: son propiedades a las que podemos acceder utilizando `$this->propiedad`. Las propiedades pueden ser públicas o privadas. Las que son públicas pueden ser utilizadas en otras clases extendidas.
  - **Métodos(funciones)**: son funciones que realizan alguna acción dentro de la clase, accedemos a ellas con `$this->metodo()`

- Las variables que definimos dentro de una clase pueden ser publicas o privadas

- **Clases extendidas**: las clases extendidas nos permiten añadir alguna funcionalidad extra de clase que ya tengamos creada, pudiendo acceder a sus componentes. Por ejemplo si tenemos una clase que nos genera una tabla, podemos crear una clase extendida de esta para cambiar sus atributos de estilo.

### 1.4.2. Librerias PHP

- [ReactPHP](https://reactphp.org/).
- [Parsedown](https://parsedown.org/) - libreria para parsear ficheros
- [PHP Mailer](https://github.com/PHPMailer/PHPMailer). Libreria que nos permite utilizar nuestro servidor de correo.

### 1.4.3. Enlaces PHP

- [Documentación oficial PHP](https://www.php.net/manual/es/)
- [Sintaxis básica PHP](https://www.php.net/manual/es/language.basic-syntax.phpmode.php)
- [Gestor de Paquetes Composer](https://getcomposer.org/)
- [Pakage Manager](https://packagist.org/)
- [La manera correcta](https://phptherightway.com/)
- [Cursos gratuitos Laravel PHP](https://laracasts.com/)
- [Sanbox PHP y funciones](http://onlinephpfunctions.com/)

### 1.4.4. Frameworks PHP

- [Synfony](https://symfony.es/)
- [Laravel](https://laravel.com/docs/5.8/installation)
- [CakePHP](https://cakephp.org/)
- [Code Ignitor](https://codeigniter.com/)

### 1.4.5. Libros PHP

[PHP Programming (O'Reilly)](https://docstore.mik.ua/orelly/webprog/php/index.htm)

---

## 1.5. Bases de Datos SQL

- Gestión de base de datos con PHPMyAdmin
- Conexión a la base de datos y consultas desde PHP
- [Uso de la función fetch_assoc para transformar querys en arrays](https://www.php.net/manual/es/mysqli-result.fetch-assoc.php)
- [Función mysqli](https://www.php.net/manual/es/book.mysqli.php)
- Preparar consultas para impedir sql injection.

### 1.5.1. Enlaces SQL

[MySQL TUTORIAL](http://www.mysqltutorial.org/)
[Documentacion MariaDB ](https://mariadb.com/kb/en/library/documentation/)

---

## 1.6. Sistemas -Alojamiento - Hosting

- Filtrar el acceso por ip a un servidor web
- Configurar servidor de correo

### 1.6.1. Hosting

- [Clouding.io](www.clouding.io)
- [DigitalOcean](www.digitalocean.com)
- [OVH](www.ovh.com)
- [AWS] (www.aws.com)

### 1.6.2. Sistemas y seguridad

Paneles de administración para administrar nuestro servidor linux mediante una interface web:

- [Webmin](http://www.webmin.com/) Manual[https://raiolanetworks.es/blog/webmin-usermin-virtualmin/] - Panel de control para la gestión de servidores Linux.
- [Virtualmin](https://www.virtualmin.com/) - Plugin para webmin para crer y administrar los virtualhost de nuestro servidor. Proporcionan un scrip de instalacion del entorno LAMP o LEMP, webmind y virtualmind [aquí](https://www.virtualmin.com/download.html)
- [Documentaicon apache](http://httpd.apache.org/docs/)
  - [Manual Apache (desarrollo web)](https://desarrolloweb.com/manuales/41)
  - [Reglas de rescritura para webs amigables mediante httacces](https://www.arsys.es/blog/programacion/url-amigables-htaccess/)
  - Capa de seguridad con httacces [7G Firewall](https://perishablepress.com/7g-firewall/#requirements)


### 1.6.3. Enlaces Herramientas Sistemas y hosting 

- [Herramienta papa comprobar registros DNS de correo](https://www.appmaildev.com/)
- [Comprobar la velocidad de carga ](https://developers.google.com/speed/pagespeed/insights/)
- [Google Console](https://search.google.com/search-console/) - Herramienta para comprobar el estado de la indexación de sus sitios en internet por el buscador y optimizar su visibilidad. 
- [Verificar el envío de correo para que llegue a micrososft](https://sendersupport.olc.protection.outlook.com/snds/) 
- [Herramientas para desarrolladores de Google](https://developers.google.com/web/tools/chrome-devtools/?hl=es)
- [Automatizar pruebas de testing](https://www.seleniumhq.org/)
- 


## 1.7. Wordpress

- [Temas hijos](https://codex.wordpress.org/es:Temas_hijos) - Es importante crear temas hijos si queremos realizar modificaciones sobre el tema. De esta forma cuando el tema se actualice no nos modificara nuestro tema.
- [Roles de usuario en wordpress](https://wordpress.org/support/article/roles-and-capabilities/)
- [Awesome Plugin Wordpress](https://github.com/designwall/Awesome-WordPress-Plugins)
- [Shortcodes](https://codex.wordpress.org/Shortcode_API) - codigo que me permite generar elementos
- [Activar mode debug Wordpress](https://decodecms.com/habilitar-el-modo-debug-en-wordpress/)
- Añadir un index.php vacio en la carpeta de plugins para impedir que se muestre el contenido.
- [Añadir contenido a post con funciones (add_filter y 'the_content')](https://developer.wordpress.org/reference/hooks/the_content/)

### Plugin Wordpress

- [WP Mail SMTP](https://wpmailsmtp.com) - nos permite configurar el servidor de correo
- [Forminator](https://es.wordpress.org/plugins/forminator/) - Formularios
- [WP Fasted Cache ](https://es.wordpress.org/plugins/wp-fastest-cache/)- nos cachea la paginas para aumentar la velocidad de carga
- [Loginizer](https://es.wordpress.org/plugins/loginizer/) - bloquea ataques de fuerza bruta para el acceso de login en el panel de administración.
- [Mantenimiento Web](https://es.wordpress.org/plugins/wp-maintenance-mode/)
- [Forzar SSL](https://es.wordpress.org/plugins/wp-force-ssl/)
- [Enviar notificaciones PUSH](https://es.wordpress.org/plugins/onesignal-free-web-push-notifications/)

## 1.8. Serverless

- [Netifly](https://www.netlify.com/)
- [Github Pages](https://pages.github.com/)

## 1.9. Framework para desarrollo de appmoviles

- [Cordova](https://cordova.apache.org/)
- [Onsen](https://onsen.io/)
- [Quasar](https://quasar.dev/)
- [Polyemer](https://pwa-starter-kit.polymer-project.org/)

## 1.10. Monetizando

- Google adsense
- Google adwords

## 1.11. Awesome Links

- [https://github.com/sindresorhus/awesome](https://github.com/sindresorhus/awesome)
- [Gestores de contenido CMS](https://github.com/postlight/awesome-cms)

## 1.12. Comunidades de programadores

- [La web del programador](https://www.lawebdelprogramador.com/)
- [Codesandbox](https://codesandbox.io)
- [Codepen](https://codepen.io/)
- [Reddit PHP](https://www.reddit.com/r/PHP/)
- [stackoverflow](https://es.stackoverflow.com/)

## 1.13. Documentación

- [Documentación para desarrolladores](https://devdocs.io)

## 1.14. Cursos

- [Scrimba](https://scrimba.com/)

## 1.15. Plataformas Freelance

- https://www.fiverr.com/
- https://www.malt.es/

## 1.16. Eventos

https://www.codemotion.com/

## 1.17. Herramientas

- [Utilidad para crear Mockup](https://mockflow.com/)
- Herramienta para ~{geerar(https://jsfiddle.net/)
