<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Freestyle BarberShop</title>
</head>

<body>
    <div class="login">
        <form action="Controladores/ControladorLogin.php" method="GET">
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
                <label>
                    <input name="admin" name="admin" type="checkbox">
                    Admin
                </label>
                <br><br>
                <input type="submit" value="Ingresar">
                <p>¿Cliente nuevo? <a href="CRUD/Registro.php">Registrarse</a></p>
            </fieldset>
        </form>
    </div>
</body>

</html>