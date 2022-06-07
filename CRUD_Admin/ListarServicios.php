<?php
session_start();
$cedula = $_SESSION["Cedula"];
$adminMenu = 0;
// Base de datos
include '../Sql/db.php';
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT administrador FROM client WHERE Cedula = '" . $cedula . "'";
$result = $conn->query($sql);
$a = $result->fetch_assoc();
if ($a == true) {
    $adminMenu = 1;
}
$sql = "SELECT * from servicio";
$result = $conn->query($sql);
/* * *******************************

  CREAR TABLA DINAMICA

 * ******************************* */

echo "<html>\n";
echo "\t<head>\n";
echo "\t\t<title>Mis citas</title>\n";
echo "\t\t<meta http-equiv= \"refresh\" content=\"5\" />\n";
echo "\t\t<meta charset=\"UTF-8\"/>\n";
echo "\t</head>\n";
echo "\t<body>\n";

if ($result->num_rows > 0) {
    echo "<div align=\"center\">\n";
    echo "<table border=2>\n";
    echo "<tr BGCOLOR=\"#D3D3D3\">\n";
    echo "<td align=\"center\">Servicio</td>\n";
    echo "<td align=\"center\">Valor</td>\n";
    echo "<td align=\"center\">Duración</td>\n";
    echo "<td align=\"center\">Empleado</td>\n";
    if ($adminMenu == 1) {
        echo "<td colspan=\"2\" align=\"center\">Acciones</td>\n";
    }

    echo "</tr>";

    $fila = 1;
    while ($row = $result->fetch_assoc()) {
        if ($fila % 2 == 0) {
            echo "<tr BGCOLOR=\"#D3D3D3\">\n";
        } else {
            echo "<tr>\n";
        }

        echo "<td align=\"center\">" . $row["Type_Service"] . "</td>";
        echo "<td align=\"center\">" . $row["Price"] . "</td>";
        echo "<td align=\"center\">" . $row["Duration_Service"] . "</td>";
        echo "<td align=\"center\">" . $row["Employee"] . "</td>";

        if ($adminMenu == 1) {
            echo "<td><a href=\"DeleteServicio.php?id=" . $row["ID"] . "\">Borrar </td>";
            echo  "<td> <a href=\"UpdateServicio.php?id=" . $row["ID"] . "\">Editar </td>\n";
        }
        echo "</tr>\n";
        $fila = $fila + 1;
    }
} else {

    echo "Aún no tienes citas agendadas!";
    echo "</div>\n";
}

echo "</body>\n";
echo "</html>\n";

$conn->close();
