<?php
session_start();
include_once '../../../../server/database/conection.php';

header('Content-Type: application/json');

// Verificar si el usuario está autenticado
if (!isset($_SESSION['id']) || !isset($_POST['fecha']) || !isset($_POST['especialidad']) || !isset($_POST['doctor_id']) || !isset($_POST['hora'])) {
    echo json_encode(['success' => false, 'error' => 'Datos insuficientes o sesión expirada.']);
    exit();
}

// Obtener los datos enviados
$patient_id = $_SESSION['id']; // ID del paciente desde la sesión
$fecha = $_POST['fecha'];
$especialidad = $_POST['especialidad'];
$doctor_id = $_POST['doctor_id'];
$hora = $_POST['hora'];

// Verificar si ya tiene una cita en la misma fecha
$sql = "SELECT COUNT(*) as total FROM appointments WHERE patient_id = ? AND appointment_date = ? AND status = 'scheduled'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $patient_id, $fecha);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row['total'] > 0) {
    echo json_encode(['success' => false, 'error' => 'Ya tienes una cita agendada en esta fecha.']);
    exit();
}

// Verificar si la hora ya está ocupada para el médico
$sql = "SELECT COUNT(*) as total FROM appointments WHERE doctor_id = ? AND appointment_date = ? AND appointment_time = ? AND status = 'scheduled'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $doctor_id, $fecha, $hora);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row['total'] > 0) {
    echo json_encode(['success' => false, 'error' => 'La hora seleccionada ya está ocupada.']);
    exit();
}

// Insertar la cita en la base de datos
$sql = "INSERT INTO appointments (patient_id, doctor_id, appointment_date, appointment_time, status) VALUES (?, ?, ?, ?, 'scheduled')";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiss", $patient_id, $doctor_id, $fecha, $hora);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Error al agendar la cita. Inténtalo nuevamente.']);
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>

