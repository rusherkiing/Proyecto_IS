<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['role']) && $_SESSION['role'] === 'patient') {
    include_once "../database/conecction.php";

    $appointment_id = $_POST['appointment_id'];

    $sql = "UPDATE appointments SET status = 'cancelled' WHERE appointment_id = ? AND patient_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $appointment_id, $_SESSION['user_id']);

    if ($stmt->execute()) {
        echo "Cita cancelada exitosamente.";
    } else {
        echo "Error al cancelar la cita.";
    }

    $stmt->close();
    $conn->close();
}
?>
