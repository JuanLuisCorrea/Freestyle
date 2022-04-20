<?php
session_start();
$cedula = $_SESSION["Cedula"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "freestyle";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * from cita WHERE ID ='$id'";
    $result = $conn->query($sql);

    if($result->num_rows == 1){
        $row = $result->fetch_assoc();       
        $Date = $row['Date'];
        $hour = $row['Hour'];
   
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
            <form action="Update_Controlador.php?id=<?php echo $_GET['id']; ?> " method="GET">
                <fieldset>
                    <legend>Editar cita</legend>
                    <label>
                        Fecha
                        <input id="date" name="date" type="date" value ="<?php echo $date; ?> ">
                    </label>
                    <br>
                    <label>
                        Hora
                        <input id="hora" name="hora" type="time" value ="<?php echo $hour; ?> ">
                    </label>
                    <br>
                    <input type="submit" value="Editar">
                </fieldset> 
            </form>
        </div>
</body>
</html>