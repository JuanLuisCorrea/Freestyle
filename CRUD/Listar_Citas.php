<?php
session_start();
$cedula = $_SESSION["Cedula"];
$admin = $_SESSION["admin"];

// Base de datos
include '../Sql/db.php';
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($admin != 1) {
    $sql = "SELECT * from cita WHERE Client='" . $cedula . " AND (SELECT * FROM client  WHERE administrador = '0' )";
    $result = $conn->query($sql);
} else {
    $sql = "SELECT * from cita";
    $result = $conn->query($sql);
}
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
    echo "<td>id</td>\n";
    echo "<td>Cedula</td>\n";
    echo "<td>Servicios</td>\n";
    echo "<td>Fecha</td>\n";
    echo "<td>Hora</td>\n";
    echo "<td>Hora de salida</td>\n";
    echo "<td>Duracion</td>\n";
    echo "<td colspan=\"2\">Acción</td>\n";
    echo "</tr>";

    $fila = 1;
    while ($row = $result->fetch_assoc()) {
        if ($fila % 2 == 0) {
            echo "<tr BGCOLOR=\"#D3D3D3\">\n";
        } else {
            echo "<tr>\n";
        }

        echo "<td>" . $row["ID"] . "</td>";
        echo "<td>" . $row["Client"] . "</td>";
        echo "<td>" . $row["Services"] . "</td>";
        echo "<td>" . $row["Date"] . "</td>";
        echo "<td>" . $row["Hour"] . "</td>";
        echo "<td>" . $row["Finish_Hour"] . "</td>";
        echo "<td>" . $row["Duration"] . " minutos" . "</td>";
        echo "<td><a href=\"Delete.php?id=" . $row["ID"] . "\">Borrar </td>";
        echo  "<td> <a href=\"Update.php?id=" . $row["ID"] . "\">Editar </td>\n";
        echo  "<td> <a href=\"Update.php?id=" . $row["ID"] . "\">Editar </td>\n";
        echo "</tr>\n";
        $fila = $fila + 1;
    }
    echo "</table>\n";
    echo "<br>";
    echo "<a href=\"../menu.html\">Menú</a>";
    echo "</div>\n";
} else {
    echo "Aún no tienes citas agendadas!";
    echo "<br>";
    echo "<a href=\"../menu.html\">Menú</a>";
}

echo "</body>\n";
echo "</html>\n";

$conn->close();
