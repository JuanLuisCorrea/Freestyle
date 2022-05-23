<?php
$id = $_GET['id'];
$Hour = $_GET['Hour'];
$Date = $_GET['Date'];

//Base de datos
include '../Sql/db.php';

//Crea conexión
$conn = new mysqli($servername, $username, $password, $dbname);

//Verificar conexión
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

//Validar que la hora de la cita esté libre
$sql = "SELECT * FROM cita WHERE Hour='".$Hour."' AND Date='".$Date."'";
$result = $conn->query($sql);
$fila = $result->fetch_assoc();
if($fila==true) {
  include("../CRUD/Update.php");
  echo "Hora no disponible";
} 
else {
  //Agendar cita si está disponible
  $sql = "UPDATE cita set Hour = '".$Hour."', Date = '".$Date."' WHERE ID ='".$id."'";
  if($conn->query($sql)===TRUE){
    include("../CRUD/Update.php");
    echo "Cita actualizada!";
    echo "<br>";
    echo "<a href=\"../menu.html\">Menú</a>";
  }
  else{
    echo "Error al actualizar el registro";
    echo "Error ".$conn->error;
  }
}


$conn->close();
?>