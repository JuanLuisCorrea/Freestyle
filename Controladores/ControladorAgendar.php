<html>
  <body>
    
<?php
  session_start();

  //Datos cita
  $cc = $_SESSION["Cedula"];
  $date = $_POST["date"];
  $hour = $_POST["hour"];
  $duracion = 0;
  $duracion_total = 0;
 
  //Base de datos
  include '../Sql/db.php';
  $conn = new mysqli($servername, $username, $password, $dbname);

  //Validar que la hora de la cita esté libre
  $sql = "SELECT * FROM cita WHERE Hour='".$hour."' AND Date='".$date."'";
  $result = $conn->query($sql);
  $fila = $result->fetch_assoc();
  if($fila==true) {
    include("../CRUD/agendar_cita.html");
    echo "Hora no disponible";
  }
  else {
    //Calcular duración de la cita según los servicios
    if(isset($_REQUEST["corte_de_pelo"])){
      $sql = "SELECT Duration_Service FROM servicio WHERE Type_Service ='Corte de cabello'";
      $result = $conn->query($sql);
      $duracion = $result->fetch_assoc();
      $duracion_total = $duracion_total + intval($duracion["Duration_Service"]);
    }
    if(isset($_REQUEST["corte_de_barba"])){
      $sql = "SELECT Duration_Service FROM servicio WHERE Type_Service ='Corte barba'";
      $result = $conn->query($sql);
      $duracion = $result->fetch_assoc();
      $duracion_total = $duracion_total + intval($duracion["Duration_Service"]);
    }
    if(isset($_REQUEST["mascarilla_facial"])){
      $sql = "SELECT Duration_Service FROM servicio WHERE Type_Service ='Mascarilla facial'";
      $result = $conn->query($sql);
      $duracion = $result->fetch_assoc();
      $duracion_total = $duracion_total + intval($duracion["Duration_Service"]);
    }
    if(isset($_REQUEST["cejas"])){
      $sql = "SELECT Duration_Service FROM servicio WHERE Type_Service ='Cejas'";
      $result = $conn->query($sql);
      $duracion = $result->fetch_assoc();
      $duracion_total = $duracion_total + intval($duracion["Duration_Service"]);
    }
  
    //Insertar cita en la base de datos
    $sql = "INSERT INTO cita(Client,Date,Hour,Duration) values('".$cc."','".$date."','".$hour."','".$duracion_total."')";
    if($conn->query($sql) === TRUE) {
      include("../CRUD/agendar_cita.html");
      echo "<br>";
      echo "Cita agendada!";
      echo "<br>";
      echo "<a href=\"../menu.html\">Menú</a>";
    }
    else {
      echo "Error ".$conn->error;
    }
  }

  $conn->close();
  ?>

  
  </body>
</html>