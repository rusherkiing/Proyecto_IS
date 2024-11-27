<?php
session_start();
require_once '../../../server/database/conection.php';

if (!isset($_GET['id'])) {
    $_SESSION['error'] = "No se proporcionó el ID de la cita.";
    header("Location: dashboard.php");
    exit();
}

$appointment_id = $_GET['id'];

// Consultar detalles de la cita
$query = "SELECT appointment_date, appointment_time FROM appointments WHERE appointment_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $appointment_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $_SESSION['error'] = "La cita no existe.";
    header("Location: dashboard.php");
    exit();
}

$cita = $result->fetch_assoc();
$appointment_datetime = $cita['appointment_date'] . ' ' . $cita['appointment_time'];
$current_datetime = date('Y-m-d H:i:s');

// Verificar si la cita es cancelable
$datetime1 = new DateTime($current_datetime);
$datetime2 = new DateTime($appointment_datetime);
$interval = $datetime1->diff($datetime2);
$hours_difference = ($interval->invert ? -1 : 1) * (($interval->days * 24) + $interval->h);

if ($hours_difference < 6) {
    $_SESSION['error'] = "No se puede cancelar esta cita dado a que su hora es demasiado próxima.";
    header("Location: dashboard.php");
    exit();
}

// Confirmar cancelación
if (isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
    $update_query = "UPDATE appointments SET status = 'cancelled' WHERE appointment_id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("i", $appointment_id);
    if ($update_stmt->execute()) {
        $_SESSION['success'] = "Cita cancelada exitosamente.";
        header("Location: dashboard.php");
    } else {
        $_SESSION['error'] = "Error al cancelar la cita.";
        header("Location: dashboard.php");
    }
    exit();
}
?>