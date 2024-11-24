<?php
if (isset($_POST['modify_appointment'])) {
    $appointment_id = $_POST['appointment_id'];
    $new_date = $_POST['new_date'];
    $new_time = $_POST['new_time'];

    // Verificar tiempo restante
    $sql_check = "SELECT TIMESTAMPDIFF(HOUR, NOW(), CONCAT(appointment_date, ' ', appointment_time)) AS hours_left 
                  FROM appointments WHERE appointment_id = ?";
    $stmt = $conn->prepare($sql_check);
    $stmt->bind_param("i", $appointment_id);
    $stmt->execute();
    $stmt->bind_result($hours_left);
    $stmt->fetch();

    if ($hours_left > 6) {
        $sql_update = "UPDATE appointments SET appointment_date = ?, appointment_time = ? WHERE appointment_id = ?";
        $stmt = $conn->prepare($sql_update);
        $stmt->bind_param("ssi", $new_date, $new_time, $appointment_id);
        if ($stmt->execute()) {
            echo "<script>alert('Cita modificada exitosamente.');</script>";
        }
    } else {
        echo "<script>alert('No se puede modificar la cita con menos de 6 horas de antelación.');</script>";
    }
}

if (isset($_POST['cancel_appointment'])) {
    $appointment_id = $_POST['appointment_id'];

    $sql_check = "SELECT TIMESTAMPDIFF(HOUR, NOW(), CONCAT(appointment_date, ' ', appointment_time)) AS hours_left 
                  FROM appointments WHERE appointment_id = ?";
    $stmt = $conn->prepare($sql_check);
    $stmt->bind_param("i", $appointment_id);
    $stmt->execute();
    $stmt->bind_result($hours_left);
    $stmt->fetch();

    if ($hours_left > 6) {
        $sql_delete = "DELETE FROM appointments WHERE appointment_id = ?";
        $stmt = $conn->prepare($sql_delete);
        $stmt->bind_param("i", $appointment_id);
        if ($stmt->execute()) {
            echo "<script>alert('Cita cancelada exitosamente.');</script>";
        }
    } else {
        echo "<script>alert('No se puede cancelar la cita con menos de 6 horas de antelación.');</script>";
    }
}
?>