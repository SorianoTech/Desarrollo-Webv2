#Apuntes SQL

Es importante relacionar las tablas con los identificadores.

1. Escapar
2. Peparar
3. Blindar
4. Ejecutar

1. Hay que escapar las consultar para impedir que inyecten caracteres de escape.

```php
$id = $mysqli->real_escape_string($_POST['id']);
```

Hay que proteger las consultas con prepare y bindparam


```
$resultado = $mysqli->prepare("SELECT id, empresa, clave FROM proyectos_empresa WHERE mail = ? and pass = ? limit 1");     
$resultado->bind_param("ss", $mail,$pass);  
$resultado->execute();   
$resultado = $resultado->get_result();


En caso de ejecutar operaciones UPDATE, DELETE o INSERT no es necesario utilizar get_restul(), ya que no tenemos que recolectar datos. En caso de utilizar el método get_result() podemos obtener todos los datos recorriendo la variable con fetch_assoc()

```
 while($fila = $resultado->fetch_assoc()){
        ?>
            <tr id="alerta_proyectos_<?php echo $fila['id'] ?>">
                <td><?php echo $fila['fechaesp'] ?></td>
                <td><?php echo $fila['alerta'] ?></td>
                <td><i class="fas fa-trash-alt dedo" onclick="borraralerta(<?php echo $fila['id'] ?>)"></i></td>
            </tr>
        <?php
        }
        ?>
```                 