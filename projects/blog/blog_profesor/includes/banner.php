    <!-- Banner -->
    <section id="banner">
        <div class="content">
            <header>
                <h1><? echo $value['titulo'] ?></h1>
                <p><? echo cat($value['categoria']); ?></p>
            </header>
            <ul class="actions">
                <li><a href="generic.php?id=<? echo $value['id'] ?>" class="button big">Ver Más</a></li>
            </ul>
        </div>
        <span class="image object">
            <img src="<? echo $value['imagen'] ?>" alt="" />
        </span>
    </section>