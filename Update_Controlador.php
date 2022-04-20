<?php
session_start();
$cedula = $_SESSION["Cedula"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "freestyle";
$Hour = $_GET['Hour'];
$Date = $_GET['Date'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if(isset($_GET['id'])){
    $id = $_GET['id'];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE cita set Hour = '$Hour', Date = '$Date' WHERE ID ='$id'";
    $result = $conn->query($sql);

    
}

?>