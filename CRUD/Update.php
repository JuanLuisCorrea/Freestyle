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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar cita</title>
</head>

<body>
    <div class="register">
        <form action="../Controladores/ControladorUpdate.php?" method="GET">
            <fieldset>
                <legend>Editar cita</legend>
                Servicios
                <br>
                <label>
                    <input name="corte_de_cabello" id="corte_de_cabello" type="checkbox">
                    Corte de cabello
                </label>
                <label>
                    <input name="corte_de_barba" id="corte_de_barba" type="checkbox">
                    Corte de barba
                </label>
                <br>
                <label>
                    <input name="mascarilla_facial" id="mascarilla_facial" type="checkbox">
                    Mascarilla facial
                </label>
                <label>
                    <input name="cejas" id="cejas" type="checkbox">
                    Cejas
                </label>
                <br>
                <label>
                    Fecha
                    <input id="Date" name="Date" type="date" value="<?php echo $Date; ?>" required>
                </label>
                <br>
                <label>
                    Hora
                    <input id="Hour" name="Hour" type="time" min="8:00" max="20:00" value="<?php echo $Hour; ?>" required>
                </label>
                <br>
                <input id="id" name="id" type="hidden" value="<?php echo $_GET['id']; ?>">
                <input type="submit" value="Editar">
            </fieldset>
        </form>
    </div>
    <script>
        // VALIDAR FORMULARIO

        // Validar que no agende una fecha anterior al día actual
        let minDate = new Date().toISOString().split("T")[0];
        document.getElementById("Date").setAttribute('min',minDate);
    </script>
</body>

</html>