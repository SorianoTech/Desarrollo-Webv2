<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Acceso a Empresas</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css'>
        <link rel="stylesheet" href="css/login.css">
    </head>

    <body>
        <script>
            function credenciales() {
                alert("Entrar con ibm@ibm.com o mpe@mpe.com y Password: 1234");
            }
        </script>
        <!-- partial:index.partial.html -->
        <div id="login-page">
            <div class="login">
              <!--<img src="images/logo.png" alt="Grupo MPE" class="logo">-->
                <h2 class="login-title">Acceso</h2>
                <button onclick="credenciales()">Credenciales</button>
                <form class="form-login"  method="post" action="includes/entrada.php">
                    <label for="email">E-mail</label>
                    <div class="input-email">
                        <i class="fas fa-envelope icon"></i>
                        <input type="email" name="mail" placeholder="Su e-mail">
                    </div>
                    <label for="password">Contraseña</label>
                    <div class="input-password">
                        <i class="fas fa-lock icon"></i>
                        <input type="password" name="pass" placeholder="Su password">
                    </div>
                    <input type="submit" value="Entrar">
                    <a href="http://35.180.252.132/~sergio/bbdd/horarios/empleados/">Versión Empleados </a>

                </form>

            </div>
            <div class="background">
                <h1>Aplicación para la gestión de usuarios</h1>
                <p>Registra a todos los empleados para llevar un control de entradas y salidas en tu empresa.</p>
                <div class="madeby">
                    <p><i class="fas fa-code"></i> Hecha por<a href="https://sergiosoriano.es">Sergio Soriano</a></p>
                </div>
            </div>
        </div>
        <!-- partial -->


    </body>

</html>