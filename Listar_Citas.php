<?php
session_start();
$cedula = $_SESSION["Cedula"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "freestyle";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from cita WHERE Client='".$cedula."'";
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
    echo "<td>id</td>\n";
    echo "<td>Cedula</td>\n";
    echo "<td>Fecha</td>\n";
    echo "<td>Hora</td>\n";
    echo "<td>Duracion</td>\n";
    echo "<td>Duracion total</td>\n";
    echo "<td colspan=\"2\">Acción</td>\n";
    echo "</tr>";

    $fila = 1;
    while ($row = $result->fetch_assoc()) {
        if ($fila % 2 == 0) {
            echo "<tr BGCOLOR=\"#D3D3D3\">\n";
        } else {
            echo "<tr>\n";
        }

        echo "<td>" . $row["ID"] . "</td>\n<td>" . $row["Client"] . "</td>\n<td>" . $row["Date"] . "</td>\n<td>" . $row["Hour"] . "</td>\n<td>" . $row["Duration"] . "</td>";
        echo "</tr>\n";
        $fila = $fila + 1;
    }
    echo "</table>\n";
    echo "</div>\n";

    echo "</body>\n";
    echo "</html>\n";
} else {
    echo "0 results";
}

$conn->close();
?>
<br>
<center><a href="menu.html">Home</a>
</center>
