<html>
<head>
  <link rel="stylesheet" href="../css/styles.css">
</head>
<body class="body-index">

<div class="register">
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
      echo "Registro exitoso!";
      echo "<br><br><br><br>";
      echo "<a href=\"../index.php\">Login</a>";
    } else {
      echo "Error " . $conn->error;
    }
  } else {
    echo "No se pudo registrar, Email o Cédula ya existentes";
    echo "<br><br><br><br>";
    echo "<a href=\"../index.php\">Login</a>";
  }
  $conn->close();
  ?>
  </div>

</body>
</html>