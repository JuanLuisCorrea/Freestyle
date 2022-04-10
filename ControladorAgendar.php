<html>
  <body>
    
<?php
  
  //Datos formulario
  
  $date = $_POST["date"];
  $hour = $_POST["hour"];
  $duracion = 0;
  $duracion_total = 0;
 
  //Base de datos
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "freestyle";
  $conn = new mysqli($servername, $username, $password, $dbname);
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
  //Crear conexión
  

  $sql = "INSERT INTO cita(Date,Hour,Duration) values('".$date."','".$hour."','".$duracion_total."')";
    if($conn->query($sql) === TRUE) {
      include("menu.html");
      
      echo "Cita agendada!";


    
    }
    else {
      echo "Error ".$conn->error;
    }

    $conn->close();
  ?>

  
  </body>
</html>