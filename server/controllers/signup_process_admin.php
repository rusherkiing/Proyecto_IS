<?php
session_start();

// Database connection
include("../database/conection.php");;

if (isset($_POST["buttonsignup"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
}
//echo"Datos recibidos";
$password = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO admins (email, password) VALUES ('$email','$password')";
$result = $conn->query($sql);
if ($result === TRUE) {
    //echo "New record created successfully";
    header("../../client/views/admin/dashboard.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

