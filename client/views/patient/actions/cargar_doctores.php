<?php
include_once '../../../../server/database/conection.php';

// Obtener la especialidad seleccionada
$especialidad = isset($_POST['especialidad']) ? $_POST['especialidad'] : '';

// Verificar si se ha proporcionado la especialidad
if (empty($especialidad)) {
    echo json_encode(['success' => false, 'message' => 'Especialidad no proporcionada']);
    exit();
}

// Consultar los doctores disponibles para la especialidad seleccionada
$query = "SELECT id, nombre FROM doctors WHERE especialidad_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$especialidad]);

$doctores = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Devolver la respuesta en formato JSON
if ($doctores) {
    echo json_encode(['success' => true, 'doctores' => $doctores]);
} else {
    echo json_encode(['success' => false, 'message' => 'No se encontraron doctores']);
}
?>
