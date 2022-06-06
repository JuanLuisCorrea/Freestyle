<?php

// Base de datos
include '../Sql/db.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * from servicio WHERE ID ='" . $id . "'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $Type_Service = $row["Type_Service"];
        $Price = $row["Price"];
        $Duration_Service = $row["Duration_Service"];
        $Employee = $row["Employee"];
    }
}
// Caracter invisible "ㅤ"

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar servicio</title>
</head>

<body>
    <div class="register">
        <form action="../Controladores/ControladorUpdateServicio.php?" method="GET">
            <fieldset>
                <legend>Editar servicio</legend>
                <label>
                    Nombre
                    <input id="Type_Service" name="Type_Service" type="txt" value="<?php echo $Type_Service; ?>" required>
                </label>

                <label>
                    ㅤㅤㅤ Valor
                    <input id="Price" name="Price" type="number" value="<?php echo $Price; ?>" required>
                </label>
                <br>
                <label>
                    Duración
                    <input id="Duration_Service" name="Duration_Service" type="number" min="1" value="<?php echo $Duration_Service; ?>" required>
                </label>
                <label>

                    ㅤㅤㅤ Empleado
                    <input id="Employee" name="Employee" type="txt" value="<?php echo $Employee; ?>" required>
                </label>
                <br><br>
                <input id="id" name="id" type="hidden" value="<?php echo $_GET['id']; ?>">
                <input type="submit" value="Editar">
            </fieldset>
        </form>
    </div>

</body>

</html>