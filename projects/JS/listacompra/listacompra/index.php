<?php 
include_once "./datos.php";
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  
        <style>
            h2 {
                font: 400 40px/1.5 Helvetica, Verdana, sans-serif;
                margin: 0;
                padding: 0;
            }

            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
            }

            li {
                font: 200 20px/1.5 Helvetica, Verdana, sans-serif;
                border-bottom: 1px solid #ccc;
            }

            li:last-child {
                border: none;
            }

            li a {
                text-decoration: none;
                color: #000;
                display: block;
                width: 200px;

                -webkit-transition: font-size 0.3s ease, background-color 0.3s ease;
                -moz-transition: font-size 0.3s ease, background-color 0.3s ease;
                -o-transition: font-size 0.3s ease, background-color 0.3s ease;
                -ms-transition: font-size 0.3s ease, background-color 0.3s ease;
                transition: font-size 0.3s ease, background-color 0.3s ease;
            }

            li a:hover {
                font-size: 30px;
                background: #f6f6f6;
            }            
        </style>
        <script>
            productos = [];

            function borrar(event) {
                //console.log(event.clientX);
                var id = this.dataset.id;
                var liborrar = this;
                //liborrar.parentNode.removeChild(liborrar);
                //this.parentNode.removeChild(liborrar);
                //this.parentNode.removeChild(this);
                //document.getElementById('lista').removeChild(this);
                //$this->remove();
                //remove($this);
                $.post( "borrar.php", {claveId: id})
                  .done(function( data ) {
                    if(data == 1){
                        alert("Se ha borrado de lujo");
                        liborrar.parentNode.removeChild(liborrar);
                        /*document.getElementById('lista').removeChild(document.getElementById('pro_'+id));
                        $('#pro_'+id).remove();
                        remove($('#pro_'+id));*/
                    } else {
                        console.log("ERROR");
                    }
                    //document.getElementById('resultado').innerHTML = data;
                    //$("#resultado").html(data);
                  });  
            }
            

            function add() {
                var producto = document.getElementById('producto').value;
                document.getElementById('producto').value = "";
                
                $.post( "add.php", {producto: producto})
                  .done(function( data ) {
                    if(data > 0){ //si la respuestas es mayor que 0 es que a insertado el elemento en la base de datos
                        console.log(data);
                        var li = document.createElement("li");
                        //var dataId = document.createAttribute('data-id', data);
                        

                        // Crear nodo de tipo Text
                        var contenido = document.createTextNode(producto);
                        // Añadir el nodo Text como hijo del nodo Element
                        li.appendChild(contenido);
                        li.setAttribute('data-id', data);

                        // Añadir el nodo Element como hijo de la pagina 


                        if (document.getElementById('lista').getElementsByTagName('li')[0] != "") {
                            document.getElementById('lista').insertBefore(li, document.getElementById('lista').getElementsByTagName('li')[0]);
                        } else {
                            document.getElementById('lista').appendChild(li);
                        }


                        productos = document.getElementById('lista').getElementsByTagName('li');
                        for (var p = 0; p < productos.length; p++) {
                            productos[p].onclick = borrar;
                        }
                    } else {
                        console.log("ERROR");
                    }
                    //document.getElementById('resultado').innerHTML = data;
                    //$("#resultado").html(data);
                  });  
                  
                
                

            }

            function calcu(){
                var num = document.getElementById('num').value;
                //var num = $('#num').val();
                
                $.post( "test.php", { numero: num})
                  .done(function( data ) {
                    //document.getElementById('resultado').innerHTML = data;
                    $("#resultado").html(data);
                  });                
            }

            window.onload = function () {
                document.getElementById('add').onclick = add;
                document.getElementById('calcular').onclick = calcu;
                productos = document.getElementById('lista').getElementsByTagName('li');
                for (var p = 0; p < productos.length; p++) {
                    productos[p].onclick = borrar;
                }                
            };
        </script>
    </head>
    <body>
        <input type="number" maxlength="100" id="num" placeholder="Numero">
        <button id="calcular">Calcular</button>
        <div id="resultado"></div>
        
        <div id='lista_compra'>
            <h2>Lista de la compra</h2>
            <input type="text" maxlength="100" id="producto" placeholder="Nuevo Producto">
            <button id="add">Add</button>
            <ul id="lista">
                <?php
                    $query = "select * from listadelacomprar order by id desc";
                    $result = $mysqli->query($query);
                    while($fila = $result->fetch_assoc()){
                        //echo "<li data-id='""' onclick='borrar(".$fila['id'].")' id='pro_".$fila['id']."'>".$fila['producto']."</li>";
                        echo "<li data-id='{$fila['id']}'  id='pro_{$fila['id']}'>{$fila['producto']}</li>";
                    }
                ?>
            </ul>
        </div>
    </body>
</html>