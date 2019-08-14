<? 
    include_once './includes/funciones.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>El Blog del programador Web</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/main.css" />
    </head>
    <body class="is-preload">

        <!-- Wrapper -->
        <div id="wrapper">

            <!-- Main -->
            <div id="main">
                <div class="inner">

                    <? include_once './includes/header.php';?>

                    
                    <?
                        $contador = 1;
                        $json = file_get_contents('extranet/json/posts.json');
                        $json = json_decode($json, true);                
                        if(isset($_GET['cat']) && $_GET['cat'] > 0){
                            foreach ($json['posts'] as $key => $value) {  
                                if($_GET['cat'] == $value['categoria']){
                                    if($contador == 1){
                                        include 'includes/banner.php';
                                        echo '    <section>
                                                <header class="major">
                                                    <h2>Los últimos artículos</h2>
                                                </header>
                                                <div class="posts">';
                                    } else {
                                        include 'includes/resumen_article.php';
                                    }
                                    $contador++;
                                }
                            }                            
                        } else {
                            foreach ($json['posts'] as $key => $value) {    
                                if($contador == 1){
                                    include 'includes/banner.php';
                                    echo '    <section>
                                            <header class="major">
                                                <h2>Los últimos artículos</h2>
                                            </header>
                                            <div class="posts">';
                                } else {
                                    include 'includes/resumen_article.php';
                                }
                                $contador++;
                            }                            
                        }
                          
                        echo '</div></section>';
                    ?>
                    





                </div>
            </div>

            <? include_once './includes/menu.php'; ?>
            

        </div>

        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/browser.min.js"></script>
        <script src="assets/js/breakpoints.min.js"></script>
        <script src="assets/js/util.js"></script>
        <script src="assets/js/main.js"></script>

    </body>
</html>