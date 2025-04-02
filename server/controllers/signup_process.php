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
    $gender = $_POST["gender"];
    $age = $_POST["age"]; 
    $specialty = $_POST["specialty"];
}
//echo"Datos recibidos";
$password = password_hash($password, PASSWORD_DEFAULT);
// Check if email already exists
$emailCheckSql = "SELECT email FROM doctors WHERE email = '$email' UNION SELECT email FROM patients WHERE email = '$email'";
$emailCheckResult = $conn->query($emailCheckSql);

if ($emailCheckResult->num_rows > 0) {
    echo "El correo electrónico ya está registrado. Por favor, utiliza otro.";
    exit();
}

if ($role == 'doctors') {
    $sql = "INSERT INTO doctors (first_name, last_name, email, phone, password, gender, age, specialty) VALUES ('$name', '$last', '$email', '$phone', '$password', '$gender', '$age', '$specialty')";
} elseif ($role == 'patients') {
    $sql = "INSERT INTO patients (first_name, last_name, email, phone, password, gender, age) VALUES ('$name', '$last', '$email', '$phone', '$password', '$gender', '$age')";
} else {
    echo "Invalid role specified.";
    exit();
}


$result = $conn->query($sql);
if ($result === TRUE) {
    //header("Location: ../../client/views/admin/dashboard.php");
    include 'check.php';
    $_SESSION['name'] = $name;
    $_SESSION['last'] = $last;
    $_SESSION['email'] = $email;
    // Enviar el correo electrónico
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

