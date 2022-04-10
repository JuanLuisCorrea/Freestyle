<html>
  <body>
    
  <?php
  
  //Datos formulario
  $identification = $_GET["identification"];
  $name = $_GET["name"];
  $telephone = $_GET["telephone"];
  $pass = $_GET["pass"];
  $email = $_GET["email"];
  $birthday = $_GET["birthday"];


  //Base de datos
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "freestyle";

  //Crear conexión
  $conn = new mysqli($servername, $username, $password, $dbname);
  

  $sql = "SELECT * FROM client WHERE Email='".$email."' OR Cedula='".$identification."'";
  $result = $conn->query($sql);
  $fila = $result->fetch_assoc();
  if($fila==false){
    $sql = "INSERT INTO client(cedula,name,telephone,email,date,Contraseña) values('".$identification."','".$name."','".$telephone."','".$email."','".$birthday."','".$pass."')";
    if($conn->query($sql) === TRUE) {
      include("index.php");
      echo "Registro exitoso!";
    }
    else {
      echo "Error ".$conn->error;
    }
  }else {
    include("registro.php");
    echo "No se pudo registrar, Email o Cédula ya existentes";
  }
  $conn->close();
  ?>

  
  </body>
</html>