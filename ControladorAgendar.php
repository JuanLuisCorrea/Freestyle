<html>
  <body>
    
<?php
  
  //Datos formulario
  
  $date = $_POST["date"];
  $hour = $_POST["hour"];
  $duracion = 0;
 
 


  //Base de datos
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "freestyle";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if(isset($_GET["corte_de_pelo"])){
    $sql = "SELECT Duration_Service FROM servicios WHERE Type_Service ='Corte de cabello'";
    
    $result = $conn->query($sql);
    
    $duracion =  $result->fetch_assoc();
    
   }
  //Crear conexión
  

  $sql = "INSERT INTO cita(Date,Hour,Duration) values('".$date."','".$hour."','".$duracion."')";
    if($conn->query($sql) === TRUE) {
      include("menu.html");
      
      echo "Registro exitoso!";


    
    }
    else {
      echo "Error ".$conn->error;
    }

    $conn->close();
  ?>

  
  </body>
</html>