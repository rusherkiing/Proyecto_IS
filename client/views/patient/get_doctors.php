<?php
require_once '../../../server/database/conection.php';

if (isset($_GET['specialty'])) {
    $specialty = $_GET['specialty'];

    $query = "SELECT id, first_name, last_name FROM doctors WHERE specialty = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $specialty);
    $stmt->execute();
    $result = $stmt->get_result();

    $doctors = [];
    while ($row = $result->fetch_assoc()) {
        $doctors[] = $row;
    }

    echo json_encode($doctors);
}
?>
