<div id="sidebar">
    <div class="inner">

        <!-- Search -->
        <section id="search" class="alt">
            <form method="post" action="#">
                <input type="text" name="query" id="query" placeholder="Buscar..." />
            </form>
        </section>

        <!-- Menu -->
        <nav id="menu">
            <header class="major">
                <h2>Menu</h2>
            </header>
            <ul>
                <?
                    $json = file_get_contents('extranet/json/categorias.json');
                    $json = json_decode($json, true);                
                    foreach ($json['categorias'] as $key => $value) {
                        echo '<li><a href="index.php?cat='.$value['id'].'">'.$value['categoria'].'</a></li>';                    
                    }                    
                ?>
            </ul>
        </nav>



        <!-- Footer -->
        <footer id="footer">
            <p class="copyright">&copy; Untitled. All rights reserved. Demo Images: <a href="https://unsplash.com">Unsplash</a>. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
        </footer>

    </div>
</div>