<?php
$id = $_GET['id'];
$Hour = $_GET['Hour'];
$Date = $_GET['Date'];
$services = "";
$finish_hour = 0;
$duracion = 0;
$duracion_total = 0;

//Base de datos
include '../Sql/db.php';

//Crea conexión
$conn = new mysqli($servername, $username, $password, $dbname);

//Verificar conexión
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

//Validar que la hora de la cita esté libre
$sql = "SELECT * FROM cita WHERE Date='".$Date."' AND HOUR<='".$Hour."' AND Finish_Hour>'".$Hour."'";
$result = $conn->query($sql);
$fila = $result->fetch_assoc();
if($fila==true) {
  include("../CRUD/Update.php");
  echo "Hora no disponible";
}
else { //Agendar cita si está disponible
  //Calcular duración de la cita
  if(isset($_REQUEST["corte_de_pelo"])){
    $sql = "SELECT Duration_Service FROM servicio WHERE Type_Service ='Corte de cabello'";
    $result = $conn->query($sql);
    $duracion = $result->fetch_assoc();
    $duracion_total = $duracion_total + intval($duracion["Duration_Service"]);
    $services = $services."Corte de cabello,";
  }
  if(isset($_REQUEST["corte_de_barba"])){
    $sql = "SELECT Duration_Service FROM servicio WHERE Type_Service ='Corte barba'";
    $result = $conn->query($sql);
    $duracion = $result->fetch_assoc();
    $duracion_total = $duracion_total + intval($duracion["Duration_Service"]);
    $services = $services."Corte barba,";
  }
  if(isset($_REQUEST["mascarilla_facial"])){
    $sql = "SELECT Duration_Service FROM servicio WHERE Type_Service ='Mascarilla facial'";
    $result = $conn->query($sql);
    $duracion = $result->fetch_assoc();
    $duracion_total = $duracion_total + intval($duracion["Duration_Service"]);
    $services = $services."Mascarilla facial,";
  }
  if(isset($_REQUEST["cejas"])){
    $sql = "SELECT Duration_Service FROM servicio WHERE Type_Service ='Cejas'";
    $result = $conn->query($sql);
    $duracion = $result->fetch_assoc();
    $duracion_total = $duracion_total + intval($duracion["Duration_Service"]);
    $services = $services."Cejas,";
  }
  $services = substr($services, 0, -1);

  //Calcular hora de salida según la duración de la cita
  $finish_hour = strtotime("+".$duracion_total." minute", strtotime($Hour));
  $finish_hour = date('H:i:s', $finish_hour);

  $sql = "UPDATE cita 
          set Services = '".$services."', Hour = '".$Hour."', Finish_Hour = '".$finish_hour."', Duration = '".$duracion_total."', Date = '".$Date."' 
          WHERE ID ='".$id."'";

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