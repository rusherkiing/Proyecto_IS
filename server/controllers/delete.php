<?php
require_once '../database/conection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Intentar eliminar de la tabla doctors primero
    $sql_doctors = "DELETE FROM doctors WHERE id = ?";
    $stmt = $conn->prepare($sql_doctors);

    if (!$stmt) {
        echo "Error preparando consulta: " . $conn->error;
        exit;
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            // Eliminación exitosa en doctors
            header("Location: ../../client/views/admin/dashboard.php");
            $stmt->close();
            $conn->close();
            exit;
        }
    }

    // Si no se eliminó en doctors, intentar en patients
    $sql_patients = "DELETE FROM patients WHERE id = ?";
    $stmt = $conn->prepare($sql_patients);

    if (!$stmt) {
        echo "Error preparando consulta: " . $conn->error;
        exit;
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            // Eliminación exitosa en patients
            header("Location: ../../client/views/admin/dashboard.php");
        } else {
            echo "No se encontró el registro en ninguna tabla.";
        }
    } else {
        echo "Error eliminando registro: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Solicitud inválida.";
}
?>
