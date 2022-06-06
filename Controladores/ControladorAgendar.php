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
    include("../CRUD/agendar_cita.php");
    echo "Hora no disponible";
  } else {
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
    $finish_hour = strtotime("+" . $duracion_total . " minute", strtotime($hour));
    $finish_hour = date('H:i:s', $finish_hour);

    //Insertar cita en la base de datos
    $sql = "INSERT INTO cita(Client,Services,Date,Hour,Finish_Hour,Duration,Price) 
            values('" . $cc . "','" . $services . "','" . $date . "','" . $hour . "','" . $finish_hour . "','" . $duracion_total . "','" . $precio . "')";

    if ($conn->query($sql) === TRUE) {
      include("../CRUD/agendar_cita.php");
      echo "<br>";
      echo "Cita agendada!";
      echo "<br>";
      echo "<a href=\"../menu.php\">Menú</a>";
    } else {
      echo "Error " . $conn->error;
    }
  }

  $conn->close();
  ?>

</body>

</html>