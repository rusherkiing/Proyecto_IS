<?php
session_start();

// Database connection
include("../database/conection.php");;

if (isset($_POST["buttonsignup"])) {
    $name = $_POST["name"];
    $last = $_POST["last"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    //$user = new User();  
}
//echo"Datos recibidos";
echo"$name";
echo "$last";
echo "$email";
echo "$phone";
echo "$role";
$password = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO $role (first_name,last_name, email,phone, password) VALUES ('$name','$last', '$email','$phone','$password')";
$result = $conn->query($sql);
echo "Usuario registrado correctamente";
?>
