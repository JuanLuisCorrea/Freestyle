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
  include '../Sql/db.php';

  //Crear conexión
  $conn = new mysqli($servername, $username, $password, $dbname);


  $sql = "SELECT * FROM client WHERE Email='" . $email . "' OR Cedula='" . $identification . "'";
  $result = $conn->query($sql);
  $fila = $result->fetch_assoc();
  if ($fila == false) {
    $sql = "INSERT INTO client(cedula,name,telephone,email,date,Contraseña) values('" . $identification . "','" . $name . "','" . $telephone . "','" . $email . "','" . $birthday . "','" . $pass . "')";
    if ($conn->query($sql) === TRUE) {
      include("../CRUD/Registro.php");
      echo "Registro exitoso!";
      echo "<br>";
      echo "<a href=\"../index.php\">Login</a>";
    } else {
      echo "Error " . $conn->error;
    }
  } else {
    include("../CRUD/Registro.php");
    echo "No se pudo registrar, Email o Cédula ya existentes";
    echo "<br>";
    echo "<a href=\"../index.php\">Login</a>";
  }
  $conn->close();
  ?>


</body>

</html>