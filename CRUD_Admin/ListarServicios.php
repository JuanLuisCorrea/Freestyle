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

/*******************
CREAR TABLA DINAMICA
********************/

if ($result->num_rows > 0) {
    echo "<table class=\"menu-servicestable-admin\">\n";
    echo "<tr BGCOLOR=\"#D3D3D3\">\n";
    echo "<td align=\"center\">Servicio</td>\n";
    echo "<td align=\"center\">Valor</td>\n";
    echo "<td align=\"center\">Duración</td>\n";
    echo "<td align=\"center\">Empleado</td>\n";
    if ($adminMenu == 1) {
        echo "<td colspan=\"2\" align=\"center\">Acciones</td>\n";
    }

    echo "</tr>";

    $salto = 0;
    while ($row = $result->fetch_assoc()) {

        $salto = $salto + 1;
        $Palabra_adaptada = str_split($row["Type_Service"]);
        $Servicio = "";

        for ($i = 0; $i < count($Palabra_adaptada); $i++) {
          if ($Palabra_adaptada[$i] == "_") {
            $Servicio = $Servicio . " ";
          } else {
            $Servicio = $Servicio . $Palabra_adaptada[$i];
          }
        }
        $Type_Service = $Servicio;

        echo "<tr>";
        echo "<td align=\"center\">" . $Type_Service . "</td>";
        echo "<td align=\"center\">$" . $row["Price"] . "</td>";
        echo "<td align=\"center\">" . $row["Duration_Service"] . " Minutos</td>";
        echo "<td align=\"center\">" . $row["Employee"] . "</td>";

        if ($adminMenu == 1) {
            echo "<td><a href=\"DeleteServicio.php?id=" . $row["ID"] . "\">Borrar </td>";
            echo  "<td> <a href=\"UpdateServicio.php?id=" . $row["ID"] . "\">Editar </td>\n";
        }
        echo "</tr>\n";
    }

    echo "</table>";
} else {
    echo "Aún no hay servicios agregados!";
}

$conn->close();
