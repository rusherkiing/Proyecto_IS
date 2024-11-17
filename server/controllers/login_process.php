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
        //echo "Inicio de sesión exitoso \n";
        switch ($rol) {
            case 'admin':
                header("Location: ../../client/views/admin/dashboard.php");
                break;
            case 'medico':
                header("Location: ../../client/views/doctor/dashboard.php");
                break;
            case 'pacientes':
                //echo "Inicio de sesión exitoso";
                header("Location: ../../client/views/patient/dashboard.php");
                break;
            default:
                header("Location: ../../client/views/error.php");
                break;
        }
        exit();
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Usuario no encontrado";
    header("Location: ..././client/views/error.php");   
}
// Cerrar la conexión
$conn->close();

?>
