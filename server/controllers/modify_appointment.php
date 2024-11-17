<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['role']) && $_SESSION['role'] === 'patient') {
    include_once "../database/conecction.php";

    $appointment_id = $_POST['appointment_id'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];

    $sql = "UPDATE appointments SET appointment_date = ?, appointment_time = ? WHERE appointment_id = ? AND patient_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $appointment_date, $appointment_time, $appointment_id, $_SESSION['user_id']);

    if ($stmt->execute()) {
        echo "Cita modificada exitosamente.";
    } else {
        echo "Error al modificar la cita.";
    }

    $stmt->close();
    $conn->close();
}
?>
