# Curso de desarrollo web

Este repositorio es una guía sobre los conceptos y herramientas que he ido aprendiendo en el curso de desarrollo de aplicaciones web **IFCD0210**, puedes encontrar un resumen teórico sobre java [aquí](http://sorianotech.github.io).

Una vez aprendidos estos conocimientos teóricos hemos realizado prácticas durante 5 meses utilizando el stack (LAMP) y los siguientes lenguajes web.

- [`HTML`](https://www.w3.org/TR/?tag=html)
- [`CSS`](https://www.w3.org/TR/?tag=css)
- [`JS`](https://en.wikipedia.org/wiki/ECMAScript)
- [`PHP`](https://www.php.net/)

## [HTML](html.md)

Conceptos estudiados:

- Elementos fundamentales necesarios.
- Estructura de etiquetas en HTML5.

### Enlaces HTML

- [Boilerplate HTML5](https://html5boilerplate.com/)
- [Plantillas Skeleton](http://getskeleton.com/)
- [Cheatsheet](https://htmlcheatsheet.com/)
- [Templates HTML5](https://html5up.net/)
- [Admin Backend Templates](https://www.bootstrapdash.com/free-bootstrap-admin-templates/)

### Librerias HTML

- [Bootstrap](https://getbootstrap.com/docs/)
- [Foundation](https://foundation.zurb.com/)
- [Materialize](https://materializecss.com/)

### Framework HTML

[Hugo - Generador de sitios estáticos](https://gohugo.io/)

---

## CSS

**Menus**: para crear menus utilizamos la propiedad [display](https://www.w3schools.com/css/css_inline-block.asp) con listas.

**Fotabilidad de las cajas**: aprendemos como colocar diferentes elementos a lo largo de una pagina web y vemos como podemos ser capaces de ubicar cada uno de elementos en una página web.

- Float: con la opción de float podemos colocar elementos por la pantalla de forma independiente, se suele utilizar principalmente para colocar los títulos, los menús o elementos de publicidad.

- [Flex box](https://lenguajecss.com/p/css/propiedades/flexbox): para elementos que son similares, por ejemplo **artículos**. Todos los contenedores va a ir de forma organizada hasta ocupar el ancho de la pantalla y cuando se rellene se colocará automáticamente en la siguiente linea. El tamaño de las cajas será el que tenga la mas grande de la linea, si hay otra caja en otra linea no influye. Primero indicamos cuanto queremos que ocupe la sección respecto al body y luego con la opción de `flex-wrap: wrap` pegará un salto de linea cada vez que los elementos ocupen el porcentaje fichado anteriormente.
  - Mas información visual- [CSS-TRICK](https://css-tricks.com/snippets/css/a-guide-to-flexbox/)

**[Pseudoclases](https://developer.mozilla.org/es/docs/Web/CSS/Pseudo-classes)**: son estados especiales de un elementos. Por ejemplo un enlace `a` que cambia de color cuando es clicado o para rellenar con un color especifico las cajas pares.

- Ejemplo de selectores de pseudoclases [aquí](http://byverdu.es/css3-como-usar-los-selectores-de-las-pseudo-classes-nth-child-nth-of-type-y-not/).

### Enlaces CSS

- [CSS Mozilla](https://developer.mozilla.org/es/docs/Web/CSS)
- [W3School](https://www.w3schools.com/css/default.asp)

### Librerías de estilos

- [PureCSS](https://purecss.io/)
- [Inter Fuentes](https://rsms.me/inter/samples/)

### Herramientas CSS

- https://colourco.de/
- http://animista.net/

---

## JavaSscript

Lenguaje orientado a eventos

### Librerias Javascript

[Jquery UI](https://jqueryui.com/)

### Enlaces JavaScript

- [Webpack](https://webpack.js.org/)
- [Browserft](http://browserify.org/)
- [Vue](https://vuejs.org/)
- [Node](https://nodejs.org/en/)
- [NPM - Gestor de paquetes](https://www.npmjs.com/)


### Editor de texto en javascript

- [Summernote](https://summernote.org/)
- [Quill](https://quilljs.com/)

---

## PHP

- [Conceptos Básicos](conceptos_basicos_php.pdf)

El lenguaje que nos permite crear contenido desde el lado de servidor para mostrar contenido en la lado del cliente.

- Hay que tener en cuenta que el contenido que en HTML utilizada comillas dobles `"`, en para combinar PHP y HTML tenemos que utilizar comillas simples `'`.
- En PHP podemos definir el limite de ejecuciones que realice un bucle, asi impedimos que se creen bucles infinitos. Esta configuración se lleva a cabo en apache.
- Definición de variables.
- Para concatenar código html con código php dentro de las etiquetas de `<?php ?>` se utiliza el punto `.`
- Las variables en PHP se definen con el símbolo `$` (\$variable) y no es necesario indicar el tipo de variable, php es capaz de identificar si es de tipo texto o numérica.
- [Conocer como activar los errores en PHP para mostrarlo en la web(en tiempo de ejecución).](https://www.anerbarrena.com/mostrar-errores-php-608/)
- Con la etiqueta hidden en un input puedo llevarme los valores que recibo de un formulario para mas tarde comprobar los datos.

### Librerias PHP

[ReactPHP](https://reactphp.org/)
[Parsedown](https://parsedown.org/) - libreria para parsear ficheros

- Cookies vs Sesiones. Cookies se almacenan en el cliente, las sesiones de almacenan en el servidor.
- [Variables Variables](https://www.php.net/manual/es/language.variables.variable.php). Nos crea un variable por cada elemento de una array. Por ejemplo lo que recibimos de un formulario.
- [Generadores](https://www.php.net/manual/es/language.generators.overview.php). Nos permite ejecutar una función repetidamente, como por ejemplo para devolver todas las lineas de un fichero llamando a un función. La palabra reservar en vez de return es `yield`.

### Enlaces PHP

- [Documentación oficial PHP](https://www.php.net/manual/es/)
- [Sintaxis básica PHP](https://www.php.net/manual/es/language.basic-syntax.phpmode.php)
- [Condicionales](https://www.php.net/manual/es/control-structures.if.php)
- [Pakage Manager](https://packagist.org/)
- [La manera correcta](https://phptherightway.com/)
- [Cursos gratuitos Laravel PHP](https://laracasts.com/)

### Frameworks PHP

- [Synfony](https://symfony.es/)
- [Laravel](https://laravel.com/docs/5.8/installation)
- [CakePHP](https://cakephp.org/)

### Libros PHP

[PHP Programming (O'Reilly)](https://docstore.mik.ua/orelly/webprog/php/index.htm)

----

## Bases de Datos SQL

- Gestión de base de datos con PHPMyAdmin
- Conexión a la base de datos y consultas desde PHP
- [Uso de la funcion fetch_assoc para transformar querys en arrays](https://www.php.net/manual/es/mysqli-result.fetch-assoc.php)
 - [Funcion mysqli](https://www.php.net/manual/es/book.mysqli.php)

## Monetizando

- Google adsense
- Google adwords

## Serverless

- [Netifly](https://www.netlify.com/)
- [Github Pages](https://pages.github.com/)

## Awesome Links

- [https://github.com/sindresorhus/awesome](https://github.com/sindresorhus/awesome)

## Comunidades de programadores

- [La web del programador](https://www.lawebdelprogramador.com/)
- [Codesandbox](https://codesandbox.io)
- [Codepen](https://codepen.io/)

## Alojamiento - Hosting

<https://clouding.io/>
<DigitalOcean>
<OVH-com>
<Clouding.io>


## Documentación

[Documentación para desarrolladores](https://devdocs.io)
