<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Aplicación sumas y restas</title>
</head>
<body>

<div class="container">

  <h2>Desarrollar una aplicación que genere automáticamente ejercicios de sumas y restas para niños.</h2>

  <p>La aplicación consiste en un cuando de texto en el que nos pedirá el número de cifras que queremos y un selector en el que indicaremos si lo ejercicios son de suma o de resta.</p>

  <p>Tendrá que estar preparada para la impresión en A4.</p>

  <p>Se puede utilizar:</p>

  <ul>
    <li>Condicionales</li>
    <li>Bucles while</li>
    <li>Función random.</li>
    <li>Medias query impresión</li>
  </ul>
</div>

<hr/>

<div class="container">
  <div class="container-fluid"> 
    <div class="row">

      <form action="ejercicios.php" method="post" id="appsuma">
       Número de digitos <input type="number" name="number" min="1" max="7"><br>
        <select name="opcion" form="appsuma" class="mdb-select md-form">
          <option value="" disabled selected>Elige una opción</option>
          <option value="1">Suma</option>
          <option value="2">Resta</option>
        </select>  
        <input type="submit" value="Generar">
      </form>


    </div>
  </div>  
</div>
    



</body>
</html>
