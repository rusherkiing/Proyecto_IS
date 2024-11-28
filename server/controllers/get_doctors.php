<?php
require_once '../database/connection.php';

if (isset($_GET['specialty'])) {
    $specialty = $_GET['specialty'];

    $sql = "SELECT id, first_name, last_name FROM doctors WHERE specialty = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $specialty);
    $stmt->execute();
    $result = $stmt->get_result();

    $doctors = [];
    while ($row = $result->fetch_assoc()) {
        $doctors[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($doctors);
} else {
    http_response_code(400);
    echo json_encode(["error" => "Specialty is required"]);
}
?>

