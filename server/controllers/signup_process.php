<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinica";
$port = 3307;
$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["buttonlogin"])) {
    $name = $_POST["name"];
    $last = $_POST["last"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    //$user = new User();  
}
$password = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO $role (first_name,last_name, email, password) VALUES ('$name','$last', '$email', '$password')";
$result = $conn->query($sql);
echo "Usuario registrado correctamente";
?>
