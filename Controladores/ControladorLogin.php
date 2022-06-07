<html>
<head>
  <link rel="stylesheet" href="../css/styles.css">
</head>
<body class="body-index">

<div class="register">

  <?php
  //Datos formulario
  $pass = $_GET["Pass"];
  $email = $_GET["Email"];
  //Conectar a la base de datos
  include '../Sql/db.php';
  $conn = new mysqli($servername, $username, $password, $dbname);

  //Autenticar usuario
  $sql = "SELECT * FROM client WHERE Email='" . $email . "' AND Contraseña='" . $pass . "'";
  $result = $conn->query($sql);
  $fila = $result->fetch_assoc();
  if ($fila == false) {
    echo "Error de autenticación";
    echo "<br><br><br><br>";
    echo "<a href=\"../index.php\">Volver a intentar</a>";
  } else {
    //Abrir sesión
    session_start();

    //Obtener la cédula del cliente
    $sql = "SELECT Cedula,administrador FROM client WHERE Email='" . $email . "' AND Contraseña='" . $pass . "'";
    $result = $conn->query($sql);
    $cedula = $result->fetch_assoc();
    $_SESSION["Cedula"] = $cedula["Cedula"];

    if ($cedula["administrador"] == 1) {
      header("Location: ../CRUD_Admin/MenuAdmin.php");
    } else {
      header("Location: ../menu.php");
    }
  }
  $conn->close();
  ?>

</div>

</body>

</html>