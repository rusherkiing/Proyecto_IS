<?php
session_start();

// Database connection
include("../database/conection.php");

// Get form data
$emailIngresado = $_POST['email'];
$passwordIngresada = $_POST['password'];

// Verificar si los datos del formulario fueron enviados
if (empty($emailIngresado) || empty($passwordIngresada)) {
    echo "Por favor, ingrese todos los campos.";
    exit();
}

try {
    // Set the role to 'admins'
    $rol = 'admins';

    // Preparar la consulta para obtener los datos del usuario
    $sql = "SELECT admin_id, email, password FROM $rol WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        throw new Exception("Error al preparar la consulta: " . $conn->error);
    }

    // Asociar el parámetro
    $stmt->bind_param("s", $emailIngresado);

    // Ejecutar la consulta
    if (!$stmt->execute()) {
        throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
    }

    // Asociar las columnas de resultado a variables
    $stmt->bind_result($id,$email, $passwordHash);

    // Obtener los datos
    if (!$stmt->fetch()) {
        //throw new Exception("No se encontró ningún registro con el correo ingresado.");
        header("../../client/views/login.php");
    }

    // Cerrar el statement
    $stmt->close();

} catch (Exception $e) {
    // Manejar cualquier excepción
    echo "Ocurrió un error: " . $e->getMessage();
    exit();
}

// Verificar si se encontró el usuario y la contraseña es válida
if (isset($passwordHash)) {
    // Validar la contraseña ingresada contra el hash
    if (password_verify($passwordIngresada, $passwordHash)) {
        // Guardar la sesión con los datos del usuario
        $_SESSION['id'] = $id;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['apellido'] = $apellido;
        $_SESSION['email'] = $email;

        // Redirección para el admin
        header("Location: ../../client/views/admin/dashboard.php");
        exit();
    } else {
        // Contraseña incorrecta
        $_SESSION['error'] = "Contraseña incorrecta.";
        header("Location: ../../client/views/login.php");
        exit();
    }
} else {
    // Usuario no encontrado
    $_SESSION['error'] = "Usuario no encontrado.";
    header("Location: ../../client/views/login.php");
    exit();
}

// Cerrar la conexión
$conn->close();
?>
