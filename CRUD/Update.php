<?php

// Base de datos
include '../Sql/db.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * from cita WHERE ID ='" . $id . "'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $Date = $row['Date'];
        $Hour = $row['Hour'];
    }
}

$sql = "SELECT Type_Service from servicio";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar cita</title>
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
        <form id="formulario" class="formulario-cita" action="../Controladores/ControladorUpdate.php" method="GET">
            <legend>
                <h1>Editar cita</h1>
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
                <input id="Date" name="Date" type="date" value="<?php echo $Date; ?>" required/>
            </label>
            <br />
            <label class="formulario-hour">
                <span>Hora</span>
                <input id="Hour" name="Hour" type="time" min="8:00" max="20:00" value="<?php echo $Hour; ?>" required/>
            </label>
            <br />
            <input id="id" name="id" type="hidden" value="<?php echo $_GET['id']; ?>">
            <input class="formulario-btn" id="formulario-btn" type="submit" value="Editar cita"/>
        </form>
    </div>
    <script>
        // VALIDAR FORMULARIO

        // Validar que no agende una fecha anterior al día actual
        let minDate = new Date().toISOString().split("T")[0];
        document.getElementById("Date").setAttribute('min', minDate);

        // Validar que haya seleccionado al menos un servicio
        let form = document.getElementByClassName('formulario-cita');
        form.addEventListener('submit', function(evt) {
            let check = document.querySelectorAll('input.service');
            count = 0;
            check.forEach((x) => {
                if(check[x].checked) {
                    count = count + 1;
                }
            });
            if(count > 0) {
                evt.preventDefault();
                alert("Debe seleccionar al menos un servicio");
            }
        });
    </script>
</body>

</html>