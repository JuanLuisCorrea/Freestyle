<?php
$id = $_GET['id'];
$Hour = $_GET['Hour'];
$Date = $_GET['Date'];
$services = "";
$finish_hour = 0;
$duracion = 0;
$duracion_total = 0;
$precio = 0;

//Base de datos
include '../Sql/db.php';

//Crea conexión
$conn = new mysqli($servername, $username, $password, $dbname);

//Verificar conexión
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//Validar que la hora de la cita esté libre
$sql = "SELECT * FROM cita WHERE Date='" . $Date . "' AND HOUR<='" . $Hour . "' AND Finish_Hour>'" . $Hour . "'";
$result = $conn->query($sql);
$fila = $result->fetch_assoc();
if ($fila == true) {
  include("../CRUD/Update.php");
  echo "Hora no disponible";
} else { //Agendar cita si está disponible

  //Calcular duración y precio de la cita según los servicios
  //Intento prueba while generico para servicios
  $sql = "SELECT Type_Service FROM servicio;";
  $result = $conn->query($sql);

  while ($fila = $result->fetch_assoc()) {
    $tipo_servicio = $fila["Type_Service"];
    if (isset($_REQUEST[$tipo_servicio])) {
      $sql = "SELECT Duration_Service,Price FROM servicio WHERE Type_Service = '" . $tipo_servicio . "'";
      $resultado = $conn->query($sql);
      $row = $resultado->fetch_assoc();
      $duracion_total = $duracion_total + intval($row["Duration_Service"]);
      $precio = $precio + intval($row["Price"]);
      $services = $services . $tipo_servicio . ",";
    } else {
      continue;
    }
  }
  $services = substr($services, 0, -1);

  //Calcular hora de salida según la duración de la cita
  $finish_hour = strtotime("+" . $duracion_total . " minute", strtotime($Hour));
  $finish_hour = date('H:i:s', $finish_hour);

  $sql = "UPDATE cita 
          SET Services = '" . $services . "', Hour = '" . $Hour . "', Finish_Hour = '" . $finish_hour . "', Duration = '" . $duracion_total . "', Date = '" . $Date . "', Price = '" . $precio . "' 
          WHERE ID ='" . $id . "'";

  if ($conn->query($sql) === TRUE) {
    include("../CRUD/Update.php");
    echo "Cita actualizada!";
    echo "<br>";
    echo "<a href=\"../menu.php\">Menú</a>";
  } else {
    echo "Error al actualizar el registro";
    echo "Error " . $conn->error;
  }
}


$conn->close();
