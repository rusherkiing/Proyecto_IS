<?php
// Incluir la conexión a la base de datos
include_once '../../../../server/database/conection.php';

// Verificar si se recibió la fecha desde el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';

    // Si la fecha no fue proporcionada
    if (empty($fecha)) {
        echo json_encode(['success' => false, 'error' => 'Fecha no proporcionada']);
        exit();
    }

    // Depuración: Mostrar la fecha recibida
    // var_dump($fecha);

    // Consulta SQL para verificar si ya existe una cita en esa fecha
    $query = "SELECT COUNT(*) AS total FROM appointments WHERE appointment_date = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$fecha]);

    // Obtener el resultado de la consulta
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si hay citas en esa fecha
    if ($result['total'] > 0) {
        // Si ya existe una cita, devolver un mensaje de error
        echo json_encode(['success' => false, 'error' => 'Ya tienes una cita agendada para esa fecha']);
    } else {
        // Si no hay citas, devolver un mensaje de éxito
        echo json_encode(['success' => true]);
    }
}
?>
