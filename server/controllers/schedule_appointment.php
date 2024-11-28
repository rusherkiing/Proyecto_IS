<?php
require '../database/conection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patient_id = $_SESSION['user_id']; // Asume que el paciente está logueado
    $appointment_date = $_POST['appointment_date'];
    $specialty = $_POST['specialty'];
    $doctor_id = $_POST['doctor'];
    $appointment_time = $_POST['time'];

    // 1. Verificar que la fecha sea válida
    $day_of_week = date('N', strtotime($appointment_date));
    $today = date('Y-m-d');
    $max_date = date('Y-m-d', strtotime('+3 days'));

    if ($appointment_date < $today || $appointment_date > $max_date || $day_of_week >= 6) {
        die('La fecha debe ser entre hoy y 3 días hábiles (lunes a viernes).');
    }

    // 2. Verificar que el paciente no tenga otra cita programada ese día
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM appointments WHERE patient_id = ? AND appointment_date = ? AND status = 'scheduled'");
    $stmt->execute([$patient_id, $appointment_date]);
    if ($stmt->fetchColumn() > 0) {
        die('Ya tienes una cita programada para esta fecha.');
    }

    // 3. Insertar la cita en la base de datos
    $stmt = $pdo->prepare("INSERT INTO appointments (patient_id, doctor_id, appointment_date, appointment_time, status) VALUES (?, ?, ?, ?, 'scheduled')");
    if ($stmt->execute([$patient_id, $doctor_id, $appointment_date, $appointment_time])) {
        echo 'Cita agendada con éxito.';
    } else {
        echo 'Error al agendar la cita.';
    }
}
?>
