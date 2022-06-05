<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Factura</title>
</head>

<body>

    <?php
    // Base de datos
    include '../Sql/db.php';
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $sql = "SELECT * FROM cita WHERE ID='" . $id . "'";
        $result = $conn->query($sql);
        $cita = $result->fetch_assoc();

        echo "<h1>FREESTYLE BARBERSHOP</h1>";
        echo "<h2>Factura #" . $cita["ID"] . "</h2>";
        echo "<ul>";
        echo "<li>C.C Cliente: " . $cita["Client"] . "</li>";
        echo "<li>Servicios: " . $cita["Services"] . "</li>";
        echo "<li>Fecha: " . $cita["Date"] . "</li>";
        echo "<li>Hora: " . $cita["Hour"] . "</li>";
        echo "<li>Precio: $" . $cita["Price"] . "</li>";
        echo "</ul>";
    }
    ?>

</body>

</html>

<?php
$html = ob_get_clean();

require_once 'Libreria/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
$dompdf->render();
$dompdf->stream("FacturaFreestyle.pdf", array("Attachment" => false));

?>