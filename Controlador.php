<html>
    <body>

        <?php
       /* $corte_de_pelo = $_GET["corte_de_pelo"];
        $corte_de_barba = $_GET["corte_de_barba"];
        $mascarilla_facial = $_GET["mascarilla_facial"];
*/        $Pass = $_GET["Pass"];
        $Email = $_GET["Email"];
        

        $password = "";
        $dbname = "freestyle";
        $servername = "localhost";
        $username= "root";   
       $conn = new mysqli($servername, $username, $password, $dbname); 
       
       $sql = "SELECT * FROM client WHERE Email='".$Email."' AND Contraseña='".$Pass."'";
       $result = $conn->query($sql);
       $fila = $result->fetch_assoc();
       if ($fila==false) {
         include("index.php");
         echo "Error de autenticación";
       }
       else {
         header("Location: menu.html");
       }

// Create connection
       if($conn){
           echo "Conexion exitosa!";
       }else{
           echo "Fallo en la conexion";
       }
        ?>
    

</body>
</html>


