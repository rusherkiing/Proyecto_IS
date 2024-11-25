<?php
require_once '../database/conection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fecha = $_POST['fecha'];

    // Validar la fecha
    $fecha_actual = date('Y-m-d');
    $fecha_maxima = date('Y-m-d', strtotime('+3 days'));

    if ($fecha >= $fecha_actual && $fecha <= $fecha_maxima) {
        // Obtener especialidades disponibles
        $sql = "SELECT DISTINCT specialty FROM doctors";
        $result = $conn->query($sql);
        $especialidades = [];
        while ($row = $result->fetch_assoc()) {
            $especialidades[] = $row['specialty'];
        }

        echo json_encode(['success' => true, 'especialidades' => $especialidades]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Fecha fuera de rango permitido.']);
    }
}
?>
