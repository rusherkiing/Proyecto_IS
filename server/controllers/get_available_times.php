<?php
// Configuración de conexión a la base de datos
$host = 'localhost';
$dbname = 'nombre_base_datos';
$user = 'usuario';
$password = 'contraseña';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar que se haya recibido el ID del doctor
    if (!isset($_GET['doctor'])) {
        http_response_code(400); // Error de cliente
        echo json_encode(['error' => 'ID del doctor no proporcionado.']);
        exit;
    }

    $doctorId = $_GET['doctor'];

    // Consulta para obtener los horarios disponibles para el doctor
    $stmt = $pdo->prepare("
        SELECT time 
        FROM schedules 
        WHERE doctor_id = :doctor_id 
        AND available = 1
    ");
    $stmt->bindParam(':doctor_id', $doctorId, PDO::PARAM_INT);
    $stmt->execute();

    $times = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Retornar los datos en formato JSON
    header('Content-Type: application/json');
    echo json_encode($times);

} catch (PDOException $e) {
    http_response_code(500); // Error del servidor
    echo json_encode(['error' => 'Error en la conexión con la base de datos.']);
}
?>
