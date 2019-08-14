<? 
    include_once './includes/funciones.php';
    $id = 0;
    if(!empty($_GET['id']) && $_GET['id'] > 0){
        $id = $_GET['id'];
    } else {
        header("Location: index.php");
        exit();
    }
    
    $array = articulo($id);
    $title = cat($array['categoria']) . ": " . $array['titulo'];
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title><? echo $array['titulo']; ?></title>
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

                    <!-- Content -->
                    <section>
                        <header class="main">
                            <h1><? echo $array['titulo']; ?></h1>
                        </header>

                        <span class="image main"><img src="<? echo $array['imagen']; ?>" alt="" /></span>

                        <? include_once './extranet/json/posts/'.$id.'.html'; ?>

                    </section>

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