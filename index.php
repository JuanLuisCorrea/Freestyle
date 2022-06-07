<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Freestyle BarberShop</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body class="body-index">
    <div class="login">
        <img class="login-logo" src="./img/freestyle_logo.jpeg" alt="Freestyle Logo">
        <form class="login-form" action="Controladores/ControladorLogin.php" method="GET">
            <legend>
                <h1>Login</h1>
            </legend>
            <input name="Email" classtype="email" placeholder="Correo">                
            <br>
            <input name="Pass" type="password" placeholder="Contraseña">
            <br>
            <input type="submit" value="Ingresar">
            <p>¿Cliente nuevo? <a href="CRUD/Registro.php">Registrarse</a></p>
        </form>
    </div>
</body>

<footer>

</footer>

</html>