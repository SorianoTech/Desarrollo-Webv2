# HTML

## Estructura básica de etiquetas de un fichero html5


![Etiquetas](img/tags.png)

```html
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Titulo de la página</title>
    </head>

    <body>
        <header>
            <h1>Cabecera h1</h1>
            <h2>Subtitulo 2</h2>
        </header>
        
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Resume</a></li>
            </ul>
        </nav>
        
        <section>
            <aside>
                <h1>About the author</h1>
                <p>It's me, Zozor! I was born on November 23, 2005.</p>
            </aside>
            <article>                
                <h1>I'm a great traveller</h1>
                <p>Bla bla bla bla (article text)</p>
            </article>
        </section>
        
        <footer>
            <p>Zozor Copyright - All rights reserved<br />
            <a href="#">Contact me!</a></p>
        </footer>
        
    </body>
</html>
```