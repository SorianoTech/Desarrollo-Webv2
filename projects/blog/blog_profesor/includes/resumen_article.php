    <!-- Section -->

            <article>
                <a href="#" class="image"><img src="<? echo $value['imagen'] ?>" alt="" /></a>
                <h3><? echo $value['titulo']; ?></h3>
                <p><? echo cat($value['categoria']); ?></p>
                <ul class="actions">
                    <li><a href="generic.php?id=<? echo $value['id'] ?>" class="button">Ver Más</a></li>
                </ul>
            </article>
        