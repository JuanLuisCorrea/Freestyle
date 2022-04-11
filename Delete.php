<?php
session_start();
$cedula = $_SESSION["Cedula"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "freestyle";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


    $id = $_GET['id'];
    $sql = "DELETE from cita WHERE ID = '$id'";
    $result = $conn->query($sql);
    if(!$result){
        die("Delete fallido!");
    }

    header("Location: Listar_Citas.php");



?>