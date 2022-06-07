<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Freestyle BarberShop</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body class="body-index">
    <div class="register">
        <form action="../Controladores/ControladorRegistro.php" method="GET">
            <legend>
                <h1>Registro Clientes</h1>
            </legend>
            <input id="name" name="name" type="text" placeholder="Nombre" required>
            <br>
            <input id="telephone" name="telephone" type="text" placeholder="Teléfono" required>
            <br>
            <input id="email" name="email" type="email" placeholder="Correo" required>
            <br>
            <input id="pass" name="pass" type="password" placeholder="Contraseña" required>
            <br>
            <input id="identification" name="identification" type="text" placeholder="No. de indentificación" required>
            <br>
            <label>
                Fecha de nacimiento
                <input id="birthday" name="birthday" type="date" required>
            </label>
            <br>
            <input type="submit" value="Registrarse">
        </form>
        <a href="../index.php">Login</a>
    </div>
</body>

</html>