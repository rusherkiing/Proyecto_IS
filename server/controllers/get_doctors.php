<?php
require_once '../database/conecction.php';

$specialty = $_POST['specialty'];

$sql = "SELECT doctor_id, first_name, last_name FROM doctors WHERE specialty = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $specialty);
$stmt->execute();
$result = $stmt->get_result();

$options = "<option value='' selected disabled>Selecciona un doctor</option>";
while ($row = $result->fetch_assoc()) {
    $options .= "<option value='{$row['doctor_id']}'>{$row['first_name']} {$row['last_name']}</option>";
}
echo $options;
$stmt->close();
