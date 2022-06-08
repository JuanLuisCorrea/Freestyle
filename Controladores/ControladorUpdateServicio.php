<?php
$id = $_GET['id'];
$Type_Service = $_GET["Type_Service"];
$Price = $_GET["Price"];
$Duration_Service = $_GET["Duration_Service"];
$Employee = $_GET["Employee"];

//Base de datos
include '../Sql/db.php';

//Crea conexión
$conn = new mysqli($servername, $username, $password, $dbname);

//Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Convertir input Type_Service en un formato adecuado para la base de datos
//Poner "_" en espacios vacios
$Palabra_adaptada = str_split($Type_Service);
$Servicio = "";
for ($i = 0; $i < count($Palabra_adaptada); $i++) {
    if ($Palabra_adaptada[$i] == " ") {
        $Servicio = $Servicio . "_";
    } else {
        $Servicio = $Servicio . $Palabra_adaptada[$i];
    }
}
$Type_Service = $Servicio;

$sql = "UPDATE servicio
          SET Type_Service = '" . $Type_Service . "', Price = '" . $Price . "', Duration_Service = '" . $Duration_Service . "', Employee = '" . $Employee . "'
          WHERE ID ='" . $id . "'";

if ($conn->query($sql) === TRUE) {
    header("Location: ../CRUD_Admin/MenuAdmin.php");
} else {
    echo "Error al actualizar el Servicio";
    echo "Error " . $conn->error;
}



$conn->close();
