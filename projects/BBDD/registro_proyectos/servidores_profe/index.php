<?php include_once './includes/datos.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gestor de Proyectos</title>
        <script   src="https://code.jquery.com/jquery-3.4.1.js"   integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="   crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <link href="css.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="js.js" type="text/javascript"></script>
    </head>
    
    <body>
        
        <header>
            <nav>
                <select id="buscador" onchange="verproyecto();">
                    <option value="">- Proyectos -</option>
                    <?php
                    $sql = "select * from proyectos order by proyecto";
                    $resultado = $mysqli->query($sql);
                    while($fila = $resultado->fetch_assoc()){
                    ?>
                        <option value="<?php echo $fila['id']; ?>"><?php echo $fila['proyecto']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <button onclick="crearproyecto()"><i class="fas fa-folder-plus"></i> Proyecto</button>
            </nav>
        </header>
        
        
        
        
        
        
        <section>
            
            <div id="ok">
                
            </div>
            
            <div id="error">
                
            </div>
            
            <div id="nuevoproyecto">
                <input placeholder="Nombre Proyecto" type="text" id="texto_proyecto" maxlength="150">
                <button onclick="guardarproyecto();">Guardar</button>
            </div>
            
            
            
            <div id="alertas">
                <h2>Alertas Globales</h2>
                <table class="paleBlueRows">
                    <thead>
                        <tr>
                            <th>
                                <i class="fas fa-calendar-day"></i>
                            </th>
                            <th>
                                Proyecto
                            </th>
                            <th>
                                Alerta
                            </th>
                            <th>
                                <i class="fas fa-trash-alt"></i>
                            </th>
                        </tr>
                    </thead>
                    <?php
                    $sql = "select alertas.*, date_format(alertas.fecha, '%d-%m-%Y') as fechaesp, proyectos.proyecto as nombre_proyecto from alertas, proyectos where proyectos.id = alertas.proyecto order by alertas.fecha";
                    $resultado = $mysqli->query($sql);
                    while($fila = $resultado->fetch_assoc()){
                    ?>
                        <tr id="alerta_<?php echo $fila['id'] ?>">
                            <td class="ancho80"><?php echo $fila['fechaesp'] ?></td>
                            <td><?php echo $fila['nombre_proyecto'] ?></td>
                            <td><?php echo $fila['alerta'] ?></td> 
                            <td><i class="fas fa-trash-alt dedo" onclick="borraralerta(<?php echo $fila['id'] ?>)"></i></td>
                        </tr>
                    <?php
                    }
                    ?>                
                </table>
            </div>
            
            <div id="todo">
                <div id="tabs">
                  <ul>
                    <li><a href="#logs"><i class="fas fa-clipboard-list"></i> Logs</a></li>
                    <li><a href="#alertas_proyectos"><i class="fas fa-exclamation-circle"></i> Alertas</a></li>
                  </ul>
                  <div id="logs">
                      <textarea placeholder="Nuevo Log" id="texto_logs"></textarea>
                      <button class="normal" onclick="guardar_logs();"><i class="fas fa-save"></i> Guardar</button>
                      <div id="listado_logs"></div>
                  </div>
                  <div id="alertas_proyectos">
                      <textarea placeholder="Nueva Alerta..." id="texto_alertas"></textarea>
                      <input type="date" class="inputclase" id="fecha_alerta" min="<?php echo date('Y-m-d'); ?>">
                      <button class="normal" onclick="guardar_alertas();"><i class="fas fa-save"></i> Guardar</button>
                      <div id="listado_alertas"></div>                      
                  </div>
                </div>                
            </div>
            
        </section>
        
        <footer>
            
        </footer>
    </body>
</html>
