<? 
include_once './prohibir.php'; 
$title = "Crear nuevos Post";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title><? echo $title; ?></title>
        <link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />
        <!--<link rel="stylesheet" href="css/fluid.css" type="text/css" media="screen" charset="utf-8" />-->
        <link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
        <link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
        
        <!-- include libraries(jQuery, bootstrap) -->
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 

        <!-- include summernote css/js -->
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>        
        <script>
            $(document).ready(function() {
              $('#articulo').summernote({
                height: 300
              });
            });            
        </script>
    </head>
    <body>
        
        <? 
            $opcion = 2;
            include_once './includes/menu.php'; 
        ?>
        
        <div id="content" class="container_16 clearfix">
            <div class="grid_16">
                <h2>Añadir nuevos Post</h2>
            </div>
            <form action="guardar-post.php" method="post">
                <div class="grid_5">
                    <p>
                        <label for="title">Titulo</label>
                        <input type="text" name="titulo" />
                    </p>
                </div>

                <div class="grid_5">
                    <p>
                        <label for="imagen">Imagen</label>
                        <input type="text" name="imagen" />
                    </p>

                </div>
                <div class="grid_6">
                    <p>
                        <label for="title">Categoría</label>
                        <select name="categoria">
                        <?
                            $json = file_get_contents('json/categorias.json');
                            $json = json_decode($json, true);                
                            foreach ($json['categorias'] as $key => $value) {
                                echo '<option value="'.$value['id'].'">'.$value['categoria'].'</option>';                    
                            }                    
                        ?>                        
                        </select>
                    </p>
                </div>

                <div class="grid_16">
                    <p>
                        <label>Artículo</label>
                        <textarea id="articulo" name="articulo"></textarea>
                        
                    </p>
                    <p class="submit">
                        <input type="submit" value="Guardar" />
                    </p>
                </div>
            </form>
        </div>

        <div id="foot">
            <a href="#">Contact Me</a>
        </div>
    </body>
</html>