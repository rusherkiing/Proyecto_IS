<?php 
include("../database/conection.php");
if (isset($_POST["buttonrecord"])) {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $sexo = $_POST["sex"];
    $fecha = $_POST["fecha"];
    $doctor_id = $_POST["doctor_id"];
    $specialty = $_POST["specialty"];
    $diagnostico = $_POST["diagnostico"];
    $tratamiento = $_POST["tratamiento"];
    $obs = $_POST["observaciones"];
                    
}
    // Preparar la consulta
    $sql = "INSERT INTO medical_records (patient_id, doctor_id, record_date, diagnosis, treatment, obs) 
    VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
    // Enlazar los parámetros
    $stmt->bind_param(
    "iissss", // Tipos de datos: i (integer), s (string)
    $id, 
    $doctor_id, 
    $fecha, 
    $diagnostico, 
    $tratamiento, 
    $obs
    );

    // Ejecutar la consulta
    if ($stmt->execute()) {
    //echo "El registro médico se ha guardado exitosamente.";
    header("../../client/views/doctor/dasboard.php");
    } else {
    echo "Error al guardar el registro: " . $stmt->error;
    }

    // Cerrar el statement
    $stmt->close();
    } else {
    echo "Error al preparar la consulta: " . $conn->error;
    }
?>
