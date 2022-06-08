<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas agendadas</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="nav-bg">
        <nav class="nav-principal">
            <p class="nav-title">FreeStyle Barbershop</p>
            <div class="nav-links">
                <a href="../menu.php">Menú principal</a>
                <a href="agendar_cita.php">Agendar Cita</a>
                <a href="../index.php">Salir</a>
            </div>
        </nav>
    </div>
    <div class="menu-main">
        <p class="menu-main-title">Mis citas agendadas</p>

<?php
session_start();
$cedula = $_SESSION["Cedula"];
$adminMenu = 0; //Auxiliar para redireccional al menú correspondiente

// Base de datos
include '../Sql/db.php';
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verificar si es admin o usuario
$sql = "SELECT administrador FROM client WHERE Cedula='" . $cedula . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($row["administrador"] != 1) {
    $sql = "SELECT * from cita WHERE Client='" . $cedula . "'";
    $result = $conn->query($sql);
} else {
    $sql = "SELECT * from cita";
    $result = $conn->query($sql);
    $adminMenu = 1;
}
/* * *******************************

  CREAR TABLA DINAMICA

 * ******************************* */

error_reporting(0);
if ($result->num_rows > 0) {
    echo "<div align=\"center\">\n";
    echo "<table class=\"citas-table\">\n";
    echo "<tr BGCOLOR=\"#D3D3D3\">\n";
    echo "<td align=\"center\">id</td>\n";
    echo "<td align=\"center\">Servicios</td>\n";
    echo "<td align=\"center\">Fecha</td>\n";
    echo "<td align=\"center\">Hora</td>\n";
    echo "<td align=\"center\">Hora de salida</td>\n";
    echo "<td>Duracion</td>\n";
    echo "<td colspan=\"3\" align=\"center\">Acción</td>\n";
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<td align=\"center\">" . $row["ID"] . "</td>";
        echo "<td align=\"center\">" . $row["Services"] . "</td>";
        echo "<td align=\"center\">" . $row["Date"] . "</td>";
        echo "<td align=\"center\">" . $row["Hour"] . "</td>";
        echo "<td align=\"center\">" . $row["Finish_Hour"] . "</td>";
        echo "<td align=\"center\">" . $row["Duration"] . " minutos" . "</td>";
        echo "<td><a href=\"Delete.php?id=" . $row["ID"] . "\">Borrar </td>";
        echo  "<td> <a href=\"Update.php?id=" . $row["ID"] . "\">Editar </td>\n";
        echo  "<td> <a href=\"Factura.php?id=" . $row["ID"] . "\">Factura </td>\n";
        echo "</tr>\n";
    }
    echo "</table>\n";
    echo "<br>";
} else {

    if ($adminMenu == 1) {
        echo "Aún no tienes citas agendadas!";
        echo "<br>";
        echo "<a href=\"../CRUD_Admin/MenuAdmin.php\">Menú</a>";
        echo "</div>\n";
    } else {
        echo "Aún no tienes citas agendadas!";
        echo "<br>";
        echo "<a href=\"../menu.php\">Menú</a>";
        echo "</div>\n";
    }
}

echo "</body>\n";
echo "</html>\n";

$conn->close();
?>
    </div>

</body>
</html>