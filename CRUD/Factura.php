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
        $sql = "SELECT * from cita WHERE Client='" . $cedula . "'";
        $result = $conn->query($sql);
    } else {
        $sql = "SELECT * from cita";
        $result = $conn->query($sql);
    }

    ?>
    <?php
    if ($result->num_rows > 0) { ?>
        <div align="center">
            <table border=2>
                <tr BGCOLOR="#D3D3D3">
                    <td align="center">id</td>
                    <td align="center">Cedula</td>
                    <td align="center">Servicios</td>
                    <td align="center">Fecha</td>
                    <td align="center">Hora</td>
                    <td align="center">Hora de salida</td>
                    <td>Duracion</td>
                </tr>
                <?php
                $fila = 1;
                while ($row = $result->fetch_assoc()) {
                    if ($fila % 2 == 0) { ?>

                        <tr BGCOLOR="#D3D3D3">
                        <?php } else { ?>
                        <tr>
                        <?php } ?>

                        <td align="center"><?php echo $row["ID"] ?></td>
                        <td align="center"><?php echo $row["Client"] ?></td>
                        <td align="center"><?php echo $row["Services"] ?></td>
                        <td align="center"><?php echo $row["Date"] ?></td>
                        <td align="center"><?php echo $row["Hour"] ?></td>
                        <td align="center"><?php echo $row["Finish_Hour"] ?></td>
                        <td align="center"><?php echo $row["Duration"] ?> minutos</td>
                        </tr>
                <?php $fila = $fila + 1;
                }
            }
                ?>
            </table>
        </div>

</body>

</html>

<?php
$html = ob_get_clean();
echo $html;

require_once '..\CRUD\Libreria\dompdf\autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');

$dompdf->render();
$dompdf->stream("Factura_Cita_FreeStyle.pdf", array("Attachment" => true));


?>