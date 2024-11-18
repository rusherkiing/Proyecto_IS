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
        // Guardar los datos en la sesión
        $_SESSION['id'] = $id;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['apellido'] = $apellido;
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $rol;
        $_SESSION['foto'] = $foto;

        // Redirigir al perfil correspondiente
        header("Location: ../../client/views/profile_$rol.php");
        exit();
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Usuario no encontrado";
}

// Cerrar la conexión
$conn->close();
?>
