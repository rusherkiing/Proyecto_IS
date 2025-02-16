<?php
session_start(); // Asegúrate de tener la sesión iniciada
include '../database/conection.php'; // Incluye la conexión a la base de datos

    // Obtener los valores del formulario
    $patient_id = $_POST['user_id']; // ID del paciente, obtenido de la sesión
    $appointment_date = $_POST['appointment_date']; // Fecha de la cita
    $specialty = $_POST['specialty']; // Especialidad (aunque no se usa en la base de datos, puedes validarlo)
    $doctor_id = $_POST['doctor']; // ID del doctor seleccionado
    $appointment_time = $_POST['time']; // Hora de la cita
    $status = 'scheduled'; // Estado de la cita (por defecto, 'scheduled')


    // Preparar la consulta para insertar los datos en la tabla 'appointments'
    $stmt = $conn->prepare('INSERT INTO appointments (patient_id, doctor_id, appointment_date, appointment_time, status) VALUES (?, ?, ?, ?, ?)');
    $stmt->bind_param('iisss', $patient_id, $doctor_id, $appointment_date, $appointment_time, $status);
    // Ejecutar la consulta y verificar si fue exitosa
    if ($stmt->execute()) {
        $_SESSION['success1'] = "Cita agendada exitosamente.";
        header('Location: ../../client/views/patient/dashboard.php');
    } else {
        $_SESSION['error1'] = "No se puede agendar.";
        header("Location: ../../client/views/patient/dashboard.php");
        exit();
    }

    // Cerrar la consulta y la conexión
    $stmt->close();
    $conn->close();

?>