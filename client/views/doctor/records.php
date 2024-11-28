<?php
// Include database connection
require_once '../../../server/database/conection.php';

session_start();
require_once '../../../server/database/conection.php';

// Verificar si el usuario está autenticado y es médico
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'doctors') {
    header("Location: ../login.php");
    exit;
}



// Datos del usuario
if (isset($_GET['id'])) {
    // Obtener el valor del parámetro 'id'
    $appointment_id = $_GET['id'];
}
else {
    echo'error';
}
$sql = "SELECT 
            p.id AS patient_id, 
            p.first_name AS first_name, 
            p.last_name AS last_name, 
            p.gender AS gender, 
            p.age AS age, 
            d.id AS doctor_id, 
            d.specialty AS doctor_specialty
        FROM appointments a
        JOIN patients p ON a.patient_id = p.id
        JOIN doctors d ON a.doctor_id = d.id
        WHERE a.appointment_id = ?;";

// Preparar la consulta
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Enlazar el parámetro
    $stmt->bind_param("i", $appointment_id);
    // Ejecutar la consulta
    $stmt->execute();
    // Obtener el resultado
    $result = $stmt->get_result();
    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        // Extraer los datos
        $dato = $result->fetch_assoc();
        $id = $dato["patient_id"];
        $first_name = $dato['first_name'];
        $last_name = $dato['last_name'];
        $gender = $dato['gender'];
        $age = $dato['age'];
        $doctor_id = $dato['doctor_id'];
        $doctor_specialty = $dato['doctor_specialty'];
    } else {
        echo "No se encontraron datos para el ID de cita proporcionado.";
    }
    
   
    // Cerrar el statement
    $stmt->close();
}else {
    echo "Error al preparar la consulta: " . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reportes Médicos</title>
    <link rel="stylesheet" href="../../asset/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php include '../common/navbar.php'; ?>
</head>
<body>
<div class="container mt-5">
<!-- Card de encabezado -->
    <div class="card mt-3">
        <div class="card-body">
            <div class="row">
                <!-- Columna para el título -->
                <div class="col-md-6">
                    <h3>Crear Reporte</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
        <div class="col-md-8" style="margin: 0 auto; float: none;">
            <div style="text-align: center;">
            <h3 style="margin-bottom:10px">REPORTE MÉDICO</h3>
            <img src="../../asset/img/logo.png" alt="">
            </div>
            <form action="../../../server/controllers/save_records.php" method="post">
                <div class="form-group">
                    <input type="hidden" value="<?php echo $id?>" name="id">
                    <input type="hidden" value="<?php echo $doctor_id?>" name="doctor_id">
                    <input type="hidden" value="<?php echo $doctor_specialty?>" name="specialty">
                    <label for="nombre"><strong>Nombre:</strong></label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $first_name . ' ' .$last_name; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="edad"><strong>Edad:</strong></label>
                    <input type="number" class="form-control" id="edad" name="edad" value="<?php echo $age ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="sexo"><strong>Sexo:</strong></label>
                    <input type="text" class="form-control" id="sex" name="sex" value="<?php echo $gender ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="fecha"><strong>Fecha:</strong></label>
                    <input type="text" class="form-control" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="diagnostico"><strong>Diagnóstico:</strong></label>
                    <textarea class="form-control" id="diagnostico" name="diagnostico" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="tratamiento"><strong>Tratamiento:</strong></label>
                    <textarea class="form-control" id="tratamiento" name="tratamiento" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="observaciones"><strong>Observaciones:</strong></label>
                    <textarea class="form-control" id="observaciones" name="observaciones" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="buttonrecord">Guardar Reporte</button>
            </form>
        </div>
        
    </div>
</div>
    <button onclick="exportPDF()">Export to PDF</button>

    <script>
        function exportPDF() {
            window.location.href = 'export_pdf.php';
        }
    </script>
    <div class="container mt-5">
    
   
</body>
</html>