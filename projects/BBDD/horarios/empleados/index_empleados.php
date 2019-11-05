<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://kit.fontawesome.com/01a5026694.js"></script>
        <title>Acceso para Empleados</title>
        <script>
        function credenciales() {
          alert("Entrar con a@a.com y Password: 1234");
        }
        </script>
    </head>
    <body>
        <div class="container mx-auto" >
           <button onclick="credenciales()">Credenciales</button>
            <h2>Acceso</h2>
            <form class="form-login"  method="post" action="includes/entrada.php">
               <label for="email"></label>
               <div class="input-email">
                 <i class="fas fa-envelope icon"></i>
                 <input type="email" name="mail" placeholder="E-mail">
               </div>
               <label for="password"></label>
               <div class="input-password">
                 <i class="fas fa-lock icon"></i>
                 <input type="password" name="pass" placeholder="Contraseña">
               </div>
               <input id="entrar" class="btn btn-lg btn-block btn-primary" type="submit" value="Entrar">
             </form>
            
            

        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>

</html>


