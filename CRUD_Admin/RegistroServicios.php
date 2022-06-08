<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Añadir servicios</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body class="body-agendar">
    <div class="nav-bg">
        <nav class="nav-principal">
            <p class="nav-title">FreeStyle Barbershop</p>
            <div class="nav-links">
                <a href="../CRUD/Listar_Citas.php">Citas</a>
                <a href="../CRUD_Admin/MenuAdmin.php">Menú principal</a>
                <a href="../index.php">Salir</a>
            </div>
        </nav>
    </div>
    <div class="formulario-bg">
        <form id="formulario formulario-services" class="formulario-cita" action="../Controladores/ControladorRegistroServicio.php" method="GET">
            <legend>
                <h1>Añadir servicio</h1>
            </legend>
            <input id="Type_Service" name="Type_Service" type="text" placeholder="Nombre del servicio">
            <br>
            <input id="Price" name="Price" type="number" placeholder="Valor del servicio">
            <br>
            <input id="Duration_Service" name="Duration_Service" type="number" placeholder="Duración del servicio">
            <br>
            <input id="Employee" name="Employee" type="txt" placeholder="Empleado a cargo">
            <br>
            <input class="formulario-btn" type="submit" value="Añadir">
        </form>
    </div>
</body>

</html>