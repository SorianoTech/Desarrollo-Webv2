<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <title>Cookies</title>
  <style>
    body{
      width:80%;
      margin:auto;
    }
    .alert{
      width:80%;
      border: solid 1px black;
      background-color:#E2A1A1;
      border-radius: 3px;
      font-size: 1,5em;
      margin:auto;
      padding: 20px;
      text-align:center;
    }
  </style>
</head>
<body>
  
  <p>Uso de cookies</p>
  <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis repudiandae impedit voluptatem. Architecto error ducimus incidunt aut suscipit dolorum in, inventore iusto amet velit assumenda corporis aperiam esse cupiditate id.</p>
  <?if(!isset($_COOKIE['aceptar'])){?>  
  <div class="alert">
    <i class="fas fa-exclamation-triangle"></i><br>  
    Web con cookies
    <a href="aceptar-cookie.php">Aceptar</a>
    </div>
  <?}?>
</body>
</html>