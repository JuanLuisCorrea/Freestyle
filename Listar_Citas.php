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
//echo "\t\t<link href="."\"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css\"" . "rel=\"stylesheet\""." integrity="."\"sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3\"" . "crossorigin="."\"anonymous\"".">";
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
    echo "<td colspan=\"2\">Acción</td>\n";
    echo "</tr>";

    $fila = 1;
    while ($row = $result->fetch_assoc()) {
        if ($fila % 2 == 0) {
            echo "<tr BGCOLOR=\"#D3D3D3\">\n";
        } else {
            echo "<tr>\n";
        }

        echo "<td>" . $row["ID"] . "</td>\n<td>" . $row["Client"] . "</td>\n<td>" . $row["Date"] . "</td>\n<td>" . $row["Hour"] . "</td>\n<td>" . $row["Duration"] . "</td>\n<td><a href=\"delete.php?id=" . $row["ID"] . "\">Delete </td> <td> <a href=\"update.php?id=" . $row["ID"] . "\">Update </td>\n";
        echo "</tr>\n";
        $fila = $fila + 1;
    }
    echo "</table>\n";
    echo "</div>\n";

    echo "</body>\n";
    echo "</html>\n";
} else {
     
    header("Location: menu.html");
}

$conn->close();
?>
<br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>


    </div>
</body>
</html>
