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
if(isset($_GET['id'])){
    $id = $_GET['id'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>