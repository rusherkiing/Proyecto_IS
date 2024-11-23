<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinica";
$port = 3307;
$conn = new mysqli($servername, $username, $password, $dbname, $port);

try {
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    die($e->getMessage());
}
?>