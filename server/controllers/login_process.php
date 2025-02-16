<?php
session_start();

// Database connection
include("../database/conection.php");

// Get form data
$emailIngresado = $_POST['email'];
$passwordIngresada = $_POST['password'];
$rol = $_POST['role'];

// Verificar si los datos del formulario fueron enviados
if (empty($emailIngresado) || empty($passwordIngresada) || empty($rol)) {
    echo "Por favor, ingrese todos los campos.";
    exit();
}

try {
    // Preparar la consulta para obtener los datos del usuario
    $sql = "SELECT id, first_name, last_name, email, password, photo, gender, age FROM $rol WHERE email = ?";
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
    $stmt->bind_result($id, $nombre, $apellido, $email, $passwordHash, $foto, $gender, $age);

    // Obtener los datos
    if (!$stmt->fetch()) {
        throw new Exception("No se encontró ningún registro con el correo ingresado.");
    }

    // Cerrar el statement
    $stmt->close();

} catch (Exception $e) {
    // Manejar cualquier excepción
    //echo "Ocurrió un error: " . $e->getMessage();// mostrar el mensaje de error en la pagina de inicio como un mensaje de error
    header("Location: ../../client/views/login.php");
    /*static $aux = 0;
    $aux++; //no funciona la logica de incremento de la variable jaja
    if ($aux < 3) {
        header("Location: ../../client/views/login.php");//redirigir a la página de inicio de sesión
        
    }
    else{
        $_SESSION['error'] = "Demasiados intentos fallidos. Por favor, inténtelo más tarde.";
    }*/
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
        $_SESSION['role'] = $rol;
        $_SESSION['foto'] = $foto;

        // Redirección según el rol
        switch ($rol) {
            case 'admin':
                header("Location: ../../client/views/admin/dashboard.php");
                break;
            case 'doctors':
                header("Location: ../../client/views/doctor/dashboard.php");
                break;
            case 'patients':
                header("Location: ../../client/views/patient/dashboard.php");
                break;
            default:
                header("Location: ../../client/views/login.php");
                break;
        }
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
