<?
include_once './prohibir.php';
include_once '../includes/funciones.php';
$title = "Listado de Posts";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title><? echo $title; ?></title>
        <link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />
        <!--<link rel="stylesheet" href="css/fluid.css" type="text/css" media="screen" charset="utf-8" />-->
        <link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
        <link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
        <script>
            function borrar(key, id)
                {
                var opcion = confirm("Realmente quieres borrar el artículos tan maravillos???");
                if (opcion == true) {
                        location.href = "borrar-post.php?id=" + id + "&key=" + key;            
                    } else {
                        
                    }
            }            
        </script>
        
    </head>
    <body>

        <?
        $opcion = 1;
        include_once './includes/menu.php';
        ?>

        <div id="content" class="container_16 clearfix">
            <div class="grid_4">
                <p>
                    <label>Username<small>Alpha-numeric values</small></label>
                    <input type="text" />
                </p>
            </div>
            <div class="grid_5">
                <p>
                    <label>Email Address</label>
                    <input type="text" />
                </p>
            </div>
            <div class="grid_5">
                <p>
                    <label>Department</label>
                    <select>
                        <option>Development</option>
                        <option>Marketing</option>
                        <option>Design</option>
                        <option>IT</option>
                    </select>
                </p>
            </div>
            <div class="grid_2">
                <p>
                    <label>&nbsp;</label>
                    <input type="submit" value="Search" />
                </p>
            </div>
            <div class="grid_16">
                <table>
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Categoria</th>
                            <th>Usuario</th>
                            <th colspan="2" width="10%">Acciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="pagination">
                                <span class="active curved">1</span><a href="#" class="curved">2</a><a href="#" class="curved">3</a><a href="#" class="curved">4</a> ... <a href="#" class="curved">10 million</a>
                            </td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?
                        $json = file_get_contents('json/posts.json');
                        $json = json_decode($json, true);                
                        foreach ($json['posts'] as $key => $value) {
                        ?>
                            <tr>
                                <td><? echo $value['titulo']; ?></td>
                                <td><? echo cat($value['categoria']); ?></td>
                                <td><? echo usuario($value['usuario']); ?></td>
                                <? if($value['usuario'] == $_COOKIE['usuario']){ ?>
                                    <td><a href="editar-post.php?key=<? echo $key?>&id=<? echo $value['id']; ?>" class="edit">Editar</a></td>
                                    <td><a onclick="borrar(<? echo $key ?>,<? echo $value['id']; ?>)" href="#" class="delete">Borrar</a></td>
                                <? } else {?>
                                    <td></td>
                                    <td></td>
                                <? }?>
                            </tr>
                        <?
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="foot">
            <a href="#">Contact Me</a>

        </div>
    </body>
</html>