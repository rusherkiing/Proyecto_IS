<?php
require_once '../database/conection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fecha = $_POST['fecha'];
    $doctor_id = $_POST['doctor_id'];

    $sql = "SELECT time_slot 
            FROM appointments 
            WHERE doctor_id = ? AND appointment_date = ? AND status = 'scheduled'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $doctor_id, $fecha);
    $stmt->execute();
    $result = $stmt->get_result();
    $horas_ocupadas = [];
    while ($row = $result->fetch_assoc()) {
        $horas_ocupadas[] = $row['time_slot'];
    }
    $stmt->close();

    // Devuelve todas las horas, excluyendo las ocupadas
    $horas_disponibles = array_diff(['09:00', '10:00', '11:00', '13:00'], $horas_ocupadas);
    echo json_encode(['success' => true, 'horas' => $horas_disponibles]);
}
?>
