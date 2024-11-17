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

// Get form data
$user = $_POST['email'];
$password = $_POST['password'];
$rol = $_POST['role'];


// Check if user exists
$emailIngresado = $_POST['email'];
$passwordIngresada = $_POST['password'];

$sql = "SELECT password FROM $rol WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $emailIngresado); // Asociar el correo al parámetro
$stmt->execute();
$stmt->bind_result($passwordHash); // Almacenar el resultado (el hash)
$stmt->fetch();
$stmt->close();

// Verificar si se encontró el usuario
if ($passwordHash) {
    // Validar la contraseña ingresada contra el hash
    if (password_verify($passwordIngresada, $passwordHash)) {
        header("Location: ../client/views/profile_$role.php");
        
        // echo "\n Bienvenido $user";
        // Aquí puedes iniciar sesión y redirigir al usuario
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Usuario no encontrado";
}
// Cerrar la conexión
$conn->close();

?>
