<?php
session_start();

// Database connection
include("../database/conecction.php");

if (isset($_POST["buttonlogin"])) {
    $name = $_POST["name"];
    $last = $_POST["last"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    //$user = new User();  
}
$password = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO $role (name,last_name, email, password) VALUES ('$name','$last', '$email', '$password')";
$result = $conn->query($sql);
echo "Usuario registrado correctamente";
?>
