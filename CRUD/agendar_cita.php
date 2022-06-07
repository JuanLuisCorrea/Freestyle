<?php
// Base de datos
include '../Sql/db.php';
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT Type_Service from servicio";
$result = $conn->query($sql);

?>
<html>

<head>
    <title>Agendar cita</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <form id="formulario" action="../Controladores/ControladorAgendar.php" method="POST">
        <fieldset>
            <legend>Agendar cita</legend>
            Servicios
            <br>
            <?php
            $salto = 0;
            while ($fila = $result->fetch_assoc()) {
                $salto = $salto + 1;

                $Palabra_adaptada = str_split($fila["Type_Service"]);
                $Servicio = "";
                for ($i = 0; $i < count($Palabra_adaptada); $i++) {
                    if ($Palabra_adaptada[$i] == "_") {
                        $Servicio = $Servicio . " ";
                    } else {
                        $Servicio = $Servicio . $Palabra_adaptada[$i];
                    }
                }
                $Type_Service = $Servicio;

            ?>
                <label>
                    <input name=<?php echo '"' . $Type_Service . '"'; ?> id=<?php echo '"' . $Type_Service . '"'; ?> type="checkbox">
                    <?php echo $Type_Service;
                    if ($salto % 2 == 0) {
                        echo "<br>";
                    }

                    ?>
                </label>

            <?php } ?>
            <br>
            <label>
                Fecha
                <input id="date" name="date" type="date" required />
            </label>
            <br />
            <label>
                Hora
                <input id="hour" name="hour" type="time" min="8:00" max="20:00" required />
            </label>
            <br />
            <input type="submit" value="Agendar cita" />
        </fieldset>
    </form>

    <script>
        // VALIDAR FORMULARIO

        // Validar que no agende una fecha anterior al día actual
        let minDate = new Date().toISOString().split("T")[0];
        document.getElementById("date").setAttribute('min', minDate);
    </script>
</body>

</html>