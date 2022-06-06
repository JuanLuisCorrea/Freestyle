<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Freestyle BarberShop</title>
</head>

<body>
    <div class="register">
        <form action="../Controladores/ControladorRegistroServicio.php" method="GET">
            <fieldset>
                <legend>Registro Clientes</legend>
                <label>
                    Nombre
                    <input id="Type_Service" name="Type_Service" type="text" placeholder="Nombre del servicio">
                </label>
                <br>
                <label>
                    Valor
                    <input id="Price" name="Price" type="number" placeholder="Valor del servicio">
                </label>
                <br>
                <label>
                    Duración (minutos)
                    <input id="Duration_Service" name="Duration_Service" type="number" placeholder="Duración del servicio">
                </label>
                <br>
                <label>
                    Empleado
                    <input id="Employee" name="Employee" type="txt" placeholder="Empleado a cargo">
                </label>
                <br>
                <input type="submit" value="Ingresar">
            </fieldset>
        </form>
    </div>
</body>

</html>