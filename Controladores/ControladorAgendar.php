<html>

<body>

  <?php
  session_start();

  //Datos cita
  $cc = $_SESSION["Cedula"];
  $services = "";
  $date = $_POST["date"];
  $hour = $_POST["hour"];
  $finish_hour = 0;
  $duracion = 0;
  $duracion_total = 0;
  $precio = 0;

  //Base de datos
  include '../Sql/db.php';
  $conn = new mysqli($servername, $username, $password, $dbname);

  //Validar que la hora de la cita esté libre
  $sql = "SELECT * FROM cita WHERE Date='" . $date . "' AND HOUR<='" . $hour . "' AND Finish_Hour>'" . $hour . "'";
  $result = $conn->query($sql);
  $fila = $result->fetch_assoc();
  if ($fila == true) {
    include("../CRUD/agendar_cita.html");
    echo "Hora no disponible";
  } else {
    //Calcular duración y precio de la cita según los servicios
    if (isset($_REQUEST["corte_de_pelo"])) {
      $sql = "SELECT Duration_Service,Price FROM servicio WHERE Type_Service ='Corte de cabello'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $duracion_total = $duracion_total + intval($row["Duration_Service"]);
      $precio = $precio + intval($row["Price"]);
      $services = $services . "Corte de cabello,";
    }
    if (isset($_REQUEST["corte_de_barba"])) {
      $sql = "SELECT Duration_Service,Price FROM servicio WHERE Type_Service ='Corte barba'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $duracion_total = $duracion_total + intval($row["Duration_Service"]);
      $precio = $precio + intval($row["Price"]);
      $services = $services . "Corte barba,";
    }
    if (isset($_REQUEST["mascarilla_facial"])) {
      $sql = "SELECT Duration_Service,Price FROM servicio WHERE Type_Service ='Mascarilla facial'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $duracion_total = $duracion_total + intval($row["Duration_Service"]);
      $precio = $precio + intval($row["Price"]);
      $services = $services . "Mascarilla facial,";
    }
    if (isset($_REQUEST["cejas"])) {
      $sql = "SELECT Duration_Service,Price FROM servicio WHERE Type_Service ='Cejas'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $duracion_total = $duracion_total + intval($row["Duration_Service"]);
      $precio = $precio + intval($row["Price"]);
      $services = $services . "Cejas,";
    }
    $services = substr($services, 0, -1);

    //Calcular hora de salida según la duración de la cita
    $finish_hour = strtotime("+" . $duracion_total . " minute", strtotime($hour));
    $finish_hour = date('H:i:s', $finish_hour);

    //Insertar cita en la base de datos
    $sql = "INSERT INTO cita(Client,Services,Date,Hour,Finish_Hour,Duration,Price) 
            values('" . $cc . "','" . $services . "','" . $date . "','" . $hour . "','" . $finish_hour . "','" . $duracion_total . "','" . $precio ."')";

    if ($conn->query($sql) === TRUE) {
      include("../CRUD/agendar_cita.html");
      echo "<br>";
      echo "Cita agendada!";
      echo "<br>";
      echo "<a href=\"../menu.html\">Menú</a>";
    } else {
      echo "Error " . $conn->error;
    }
  }

  $conn->close();
  ?>


</body>

</html>