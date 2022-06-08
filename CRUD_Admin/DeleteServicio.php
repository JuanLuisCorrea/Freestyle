<?php
session_start();
$cedula = $_SESSION["Cedula"];

include '../Sql/db.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE from servicio WHERE ID = '$id'";
    $result = $conn->query($sql);
    if (!$result) {
        die("Delete fallido!");
    }

    header("Location: MenuAdmin.php");
}
