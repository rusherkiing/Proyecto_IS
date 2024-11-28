<?php
require_once '../database/connection.php';

if (isset($_GET['doctor_id']) && isset($_GET['date'])) {
    $doctor_id = $_GET['doctor_id'];
    $date = $_GET['date'];

    $all_times = [];
    for ($hour = 8; $hour < 18; $hour++) {
        $all_times[] = sprintf("%02d:00:00", $hour);
        $all_times[] = sprintf("%02d:30:00", $hour);
    }

    $stmt = $conn->prepare("SELECT appointment_time FROM appointments WHERE doctor_id = ? AND appointment_date = ?");
    $stmt->bind_param("is", $doctor_id, $date);
    $stmt->execute();
    $result = $stmt->get_result();

    $occupied_times = [];
    while ($row = $result->fetch_assoc()) {
        $occupied_times[] = $row['appointment_time'];
    }

    $available_times = array_diff($all_times, $occupied_times);
    echo json_encode(array_values($available_times));
} else {
    http_response_code(400);
    echo json_encode(["error" => "Doctor ID and date are required"]);
}
?>
