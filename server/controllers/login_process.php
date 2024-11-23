<?php
session_start();

// Database connection
include("../database/conection.php");

// Get form data
$user = $_POST['email'];
$password = $_POST['password'];
$rol = $_POST['role'];


// Check if user exists
$emailIngresado = $_POST['email'];
$passwordIngresada = $_POST['password'];

$sql = "SELECT patient_id, first_name, last_name, email, password, photo FROM $rol WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $emailIngresado); // Asociar el correo al parámetro
$stmt->execute();
$stmt->bind_result($id, $nombre, $apellido, $email, $passwordHash, $foto); // Almacenar los resultados
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
            case 'doctors':
                header("Location: ../../client/views/doctor/dashboard.php");
                break;
            case 'patients':
                $_SESSION['id'] = $id;
                $_SESSION['nombre'] = $nombre;
                $_SESSION['apellido'] = $apellido;
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $rol;
                $_SESSION['foto'] = $foto;
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
    header("Location: .../../client/views/error.php");   
}
// Cerrar la conexión
$conn->close();

?>
