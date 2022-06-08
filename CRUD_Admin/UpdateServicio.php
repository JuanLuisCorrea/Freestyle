<?php

// Base de datos
include '../Sql/db.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * from servicio WHERE ID ='" . $id . "'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $Type_Service = $row["Type_Service"];
        $Price = $row["Price"];
        $Duration_Service = $row["Duration_Service"];
        $Employee = $row["Employee"];
    }
}
// Caracter invisible "ㅤ"

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar servicio</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
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
        <form class="formulario-cita" action="../Controladores/ControladorUpdateServicio.php?" method="GET">
            <legend>
                <h1>Editar servicio</h1>
            </legend>
            <input id="Type_Service" name="Type_Service" type="text" placeholder="Nombre del servicio" value="<?php echo $Type_Service; ?>" required>
            <br>
            <input id="Price" name="Price" type="number" placeholder="Valor del servicio" value="<?php echo $Price; ?>" required>
            <br>
            <input id="Duration_Service" name="Duration_Service" type="number" placeholder="Duración del servicio min="1" value="<?php echo $Duration_Service; ?>" required>
            <br>
            <input id="Employee" name="Employee" type="text" placeholder="Empleado a cargo" value="<?php echo $Employee; ?>" required>
            <br>
            <input id="id" name="id" type="hidden" value="<?php echo $_GET['id']; ?>">
            <input class="formulario-btn" type="submit" value="Editar">
        </form>
    </div>

</body>

</html>