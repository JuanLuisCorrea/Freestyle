<?php

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