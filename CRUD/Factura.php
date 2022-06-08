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

        $sql2 = "SELECT Name FROM client WHERE Cedula=".$cita["Client"];
        $result2 = $conn->query($sql2);
        $row = $result2->fetch_assoc();

        ?>

        <div id="app" class="col-11">
            <h2>Factura</h2>

            <div class="row my-3">
                <div class="col-10">
                    <h1>Freestyle Barbershop</h1>
                    <p>Cartagena de Indias</p>
                    <p>Barrio Los caracoles</p>
                </div>
                <div class="col-2">
                    <img src="http://localhost/Freestyle/img/freestyle_logo.jpeg" width=90 height=90/>
                </div>
            </div>
            <hr/>
            <div class="row fact-info mt-3">
                <div class="col-3">
                    <h5>Facturar a</h5>
                    <p>
                        <?php echo $row["Name"]; ?>
                    </p>
                </div>
                <div class="col-3">
                    <h5>N° de factura: <?php echo $cita["ID"]; ?></h5>
                    <h5>Fecha de facturación: <?php echo date('Y-m-d', time()); ?></h5>
                    <h5>Fecha de la cita: <?php echo $cita["Date"]; ?></h5>
                </div>
            </div>

            <div class="row my-5">
                <table class="table table-borderless factura">
                    <thead>
                        <tr>
                            <th>Servicios</th>
                            <th>Total a pagar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $cita["Services"]; ?></td>
                            <td><?php echo "$".$cita["Price"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="cond row">
                <div class="col-12 mt-3">
                    <h4>Condiciones y formas de pago</h4>
                    <p>El pago se debe realizar antes de la cita</p>
                    <p>
                        Bancolombia
                        <br />
                        NIT: 83648563845
                    </p>
                </div>
            </div>
        </div>

    <?php } ?>

</body>

</html>

<?php
$html = ob_get_clean();

require_once 'Libreria/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
$dompdf->render();
$dompdf->stream("FacturaFreestyle.pdf", array("Attachment" => false));

?>