<?php

// Base de datos
include '../Sql/db.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * from cita WHERE ID ='".$id."'";
    $result = $conn->query($sql);

    if($result->num_rows == 1){
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
                <label>
                    Fecha
                    <input id="Date" name="Date" type="date" value ="<?php echo $Date; ?> ">
                </label>
                <br>
                <label>
                    Hora
                    <input id="Hour" name="Hour" type="time" value ="<?php echo $Hour; ?> ">
                </label>
                <br>
                <input id="id" name="id" type="hidden" value="<?php echo $_GET['id']; ?> ">
                <input type="submit" value="Editar">
            </fieldset> 
        </form>
    </div>
</body>
</html>