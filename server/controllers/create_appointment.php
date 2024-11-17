<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['role']) && $_SESSION['role'] === 'patient') {
    include_once "../database/conecction.php";

    $patient_id = $_SESSION['user_id'];
    $doctor_id = $_POST['doctor_id'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];

    $sql = "INSERT INTO appointments (patient_id, doctor_id, appointment_date, appointment_time) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiss", $patient_id, $doctor_id, $appointment_date, $appointment_time);

    if ($stmt->execute()) {
        echo "Cita creada exitosamente.";
    } else {
        echo "Error al crear la cita.";
    }

    $stmt->close();
    $conn->close();
}
?>
