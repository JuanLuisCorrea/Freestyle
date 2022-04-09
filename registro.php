<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Freestyle BarberShop</title>
    </head>
    <body>
        <div class="register">
            <form action="ControladorCrear.php" method="GET">
                <fieldset>
                    <legend>Registro Clientes</legend>
                    <label>
                        Nombre
                        <input id="name" name="name" type="text" placeholder="Nombre">
                    </label>
                    <br>
                    <label>
                        Teléfono
                        <input id="telephone" name="telephone" type="text" placeholder="Teléfono">
                    </label>
                    <br>
                    <label>
                        Correo
                        <input id="email" name="email" type="email" placeholder="Correo">
                    </label>
                    <br>
                    <label>
                        Contraseña
                        <input id="pass" name="pass" type="password" placeholder="Contraseña">
                    </label>
                    <br>
                    <label>
                        Identificación
                        <input id="identification" name="identification" type="text" placeholder="No. de indentificación">
                    </label>
                    <br>
                    <label>
                        Fecha de nacimiento
                        <input id="birthday" name="birthday" type="date">
                    </label>
                    <br>
                    <input type="submit" value="Ingresar">
                </fieldset> 
            </form>
        </div>
    </body>
</html>

