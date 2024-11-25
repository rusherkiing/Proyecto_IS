<?php
require_once '../database/conecction.php';

$patient_id = $_SESSION['id'];
$doctor_id = $_POST['doctor'];
$date = $_POST['date'];
$time = $_POST['time'];

// Verificar si el paciente ya tiene una cita en esa fecha
$sql = "SELECT COUNT(*) AS count FROM appointments WHERE patient_id = ? AND appointment_date = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $patient_id, $date);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();

if ($result['count'] > 0) {
    echo "Ya tienes una cita agendada en esta fecha.";
    exit;
}

// Insertar nueva cita
$sql = "INSERT INTO appointments (patient_id, doctor_id, appointment_date, appointment_time) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiss", $patient_id, $doctor_id, $date, $time);
if ($stmt->execute()) {
    echo "Cita agendada exitosamente.";
} else {
    echo "Error al agendar la cita.";
}
$stmt->close();
