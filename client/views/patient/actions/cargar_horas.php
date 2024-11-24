<?php
include_once '../../../../server/database/conection.php';

// Obtener los datos de la petición
$doctor_id = isset($_POST['doctor_id']) ? $_POST['doctor_id'] : '';
$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';

// Verificar que se haya recibido tanto el doctor como la fecha
if (empty($doctor_id) || empty($fecha)) {
    echo json_encode(['success' => false, 'message' => 'Datos incompletos']);
    exit();
}

// Consultar las horas disponibles para ese doctor en esa fecha
$query = "SELECT hora FROM available_hours WHERE doctor_id = ? AND fecha = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$doctor_id, $fecha]);

$horas = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Devolver la respuesta en formato JSON
if ($horas) {
    echo json_encode(['success' => true, 'horas' => $horas]);
} else {
    echo json_encode(['success' => false, 'message' => 'No hay horas disponibles']);
}
?>
