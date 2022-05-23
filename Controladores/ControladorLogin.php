<html>
    <body>

    <?php
      //Datos formulario
      $pass = $_GET["Pass"];
      $email = $_GET["Email"];
      
      //Conectar a la base de datos
      include '../Sql/db.php'; 
      $conn = new mysqli($servername, $username, $password, $dbname); 
      
      //Autenticar cliente
      $sql = "SELECT * FROM client WHERE Email='".$email."' AND Contraseña='".$pass."'";
      $result = $conn->query($sql);
      $fila = $result->fetch_assoc();
      if ($fila==false) {
        include("../index.php");
        echo "Error de autenticación";
      }
      else {
        //Abrir sesión
        session_start();

        //Obtener la cédula del cliente
        $sql = "SELECT Cedula FROM client WHERE Email='".$email."' AND Contraseña='".$pass."'";
        $result = $conn->query($sql);
        $cedula = $result->fetch_assoc();
        $_SESSION["Cedula"] = $cedula["Cedula"];

        header("Location: ../menu.html");
      }

      $conn->close();
    ?>
    

</body>
</html>


