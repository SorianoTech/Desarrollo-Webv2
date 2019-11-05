<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        
        <script>
        $( function() {
          $( "#accordion" ).accordion({
            active: false,
            collapsible: true,
            activate: function( event, ui ) {
                alert(ui);
            }
          });
        } );
        
        
        </script>        
    </head>
    <body>
        
        <div id="accordion">
            <?
                $url = ['https://as.com/rss/ciclismo/portada.xml', 'https://elpais.com/tag/rss/ciclismo/a/', 'https://e00-marca.uecdn.es/rss/ciclismo.xml'];
                $title = ['AS CICLISMO', 'EL PAÍS', 'MARCA CICLISMO'];
                foreach ($url as $clave => $value) {
                    echo '<h3>' . $title[$clave]. '</h3><div>';
                    $all_api_call = simplexml_load_file($value); 
                    foreach ($all_api_call->channel->item as $valor){
                        echo '<strong>'.$valor->title.'</strong><p>' . $valor->description . '<br><a href="'. $valor->link.'">Ver más</a></p>';  //$valor->content ;
                    }          
                    echo '</div>';
                }
            ?>       
        </div>

        
        
    </body>
</html>
