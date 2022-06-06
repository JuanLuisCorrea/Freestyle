<html>

<body>

    <?php

    //Datos formulario
    $Type_Service = $_GET["Type_Service"];
    $Price = $_GET["Price"];
    $Duration_Service = $_GET["Duration_Service"];
    $Employee = $_GET["Employee"];

    //Base de datos
    include '../Sql/db.php';

    //Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Convertir input Type_Service en un formato adecuado para la base de datos
    //Poner "_" en espacios vacios
    $Palabra_adaptada = str_split($Type_Service);
    $Servicio = "";
    for ($i = 0; $i < count($Palabra_adaptada); $i++) {
        if ($Palabra_adaptada[$i] == " ") {
            $Servicio = $Servicio . "_";
        } else {
            $Servicio = $Servicio . $Palabra_adaptada[$i];
        }
    }
    $Type_Service = $Servicio;

    //Buscar si el servicio exise
    $sql = "SELECT * FROM servicio WHERE Type_Service='" . $Type_Service . "'";
    $result = $conn->query($sql);
    $fila = $result->fetch_assoc();

    if ($fila == false) {
        $sql = "INSERT INTO servicio(Price,Type_Service,Duration_Service,Employee) values('" . $Price . "','" . $Type_Service . "','" . $Duration_Service . "','" . $Employee . "')";
        if ($conn->query($sql) === TRUE) {
            include("../CRUD_Admin/RegistroServicios.php");
            echo "Registro exitoso!";
            echo "<br>";
            echo "<a href=\"../CRUD_Admin/MenuAdmin.php\">Menú</a>";
        } else {
            echo "Error " . $conn->error;
        }
    } else {
        include("../CRUD_Admin/RegistroServicios.php");
        echo "No se pudo registrar, Servicio ya existente";
        echo "<br>";
        echo "<a href=\"../CRUD_Admin/RegistroServicios.php\">Registrar Servicio</a>";
    }
    $conn->close();
    ?>


</body>

</html>