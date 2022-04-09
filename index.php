<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Freestyle BarberShop</title>
    </head>
    <body>
        <div class="login">
            <form action="Controlador.php" method="GET">
                <fieldset>
                    <legend>Login Clientes</legend>
                    <label>
                        Correo
                        <input name="Email" type="email" placeholder="Correo">
                    </label>
                    <br>
                    <label>
                        Contraseña
                        <input name="Pass" type="password" placeholder="Contraseña">
                    </label>
                    <br>
                    <input type="submit" value="Ingresar">
                    <p>¿Cliente nuevo? <a href="registro.php">Registrarse</a></p>
                </fieldset> 
            </form>
        </div>
    </body>
</html>
