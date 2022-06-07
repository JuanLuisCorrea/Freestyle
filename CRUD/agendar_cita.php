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
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body class="body-agendar">
    <div class="nav-bg">
        <nav class="nav-principal">
        <p class="nav-title">FreeStyle Barbershop</p>
        <div class="nav-links">
            <a href="Listar_Citas.php">Citas agendadas</a>
            <a href="../menu.php">Menú principal</a>
            <a href="../index.php">Salir</a>
        </div>
        </nav>
    </div>
    <div class="formulario-bg">
        <form id="formulario" class="formulario-cita" action="../Controladores/ControladorAgendar.php" method="POST">
            <legend>
                <h1>Agendar cita</h1>
            </legend>
            <div class="formulario-cita-services">
                <span>Servicios</span>
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
                    <label class="formulario-service">
                        <input class="service" name=<?php echo '"' . $Type_Service . '"'; ?> id=<?php echo '"' . $Type_Service . '"'; ?> type="checkbox">
                        <?php echo $Type_Service;
                            if ($salto % 2 == 0) {
                                echo "<br>";
                            }
                        ?>
                    </label>
                <?php } ?>
            </div>
            <br>
            <label class="formulario-date">
                <span>Fecha</span>
                <input id="date" name="date" type="date" required />
            </label>
            <br />
            <label class="formulario-hour">
                <span>Hora</span>
                <input id="hour" name="hour" type="time" min="8:00" max="20:00" required />
            </label>
            <br />
            <input class="formulario-btn" id="formulario-btn" type="submit" value="Agendar cita"/>
        </form>
    </div>
    <script>
        // VALIDAR FORMULARIO

        // Validar que no agende una fecha anterior al día actual
        let minDate = new Date().toISOString().split("T")[0];
        document.getElementById("date").setAttribute('min', minDate);

        // Validar que haya seleccionado al menos un servicio
        let form = document.getElementById("formulario");
        form.addEventListener('submit', function(evt) {
            let check = document.getElementsByClassName('service');
            count = 0;
            for(let x = 0; x < check.length; x++) {
                if(check[x].checked == false) {
                    count = count + 1;
                }
            }
            if(count == check.length) {
                evt.preventDefault();
                alert("Debe seleccionar al menos un servicio");
            }
        });
    </script>
</body>

</html>