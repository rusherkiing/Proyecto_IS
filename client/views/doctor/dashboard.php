<?php
session_start();
require_once '../../../server/database/conection.php';

// Verificar si el usuario está autenticado y es paciente
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'doctors') {
    header("Location: ../login.php");
    exit;
}


// Datos del usuario
$id_usuario = $_SESSION['id'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$email = $_SESSION['email'];
$foto = $_SESSION['foto'];

// Consultar citas previas con información del paciente
$sql_citas = "SELECT a.appointment_id, a.appointment_date, a.appointment_time, 
              p.first_name AS patient_first_name, p.last_name AS patient_last_name, 
              a.status 
              FROM appointments a
              JOIN patients p ON a.patient_id = p.id
              WHERE a.doctor_id = ?
              ORDER BY a.appointment_date DESC, a.appointment_time DESC";
$stmt_citas = $conn->prepare($sql_citas);
$stmt_citas->bind_param("i", $id_usuario);
$stmt_citas->execute();
$citas_previas = $stmt_citas->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt_citas->close();

$hora_actual = date("H:i"); // Hora actual del servidor en formato 24 horas



?>


    <style>
    /* Asegura que todas las celdas tengan una altura consistente */
        table td {
            vertical-align: middle;
        }
        .modify-btn, .cancel-btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            height: 28px;
            width: auto;
            box-sizing: border-box;
        }
    </style>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Médico</title>
    <link rel="stylesheet" href="../../asset/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php include '../common/navbar.php'; ?>
            
</head>
<body>
    <!-- Mostrar los datos del médico -->
    <div class="container mt-5">
        <h1 class="text-center">¡Bienvenid@, <?php echo $nombre . ' ' . $apellido; ?>!</h1>
        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <!-- Columna para los detalles -->
                    <div class="col-md-8">
                        <h3 style="margin-bottom:10px">Detalles del Usuario</h3>
                        <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
                        <p><strong>Apellido:</strong> <?php echo $apellido; ?></p>
                        <p><strong>Email:</strong> <?php echo $email; ?></p>
                        <p><strong>Teléfono:</strong> <?php echo $email; ?></p>
                       
                    </div>
                    <!-- Columna para la foto -->
                    <div class="col-md-4 text-center">
                        <?php if (!empty($foto)) { ?>
                            <img src="../../asset/img/favicon.png alt="Foto de <?php echo $nombre; ?>" class="img-fluid rounded-circle" style="max-width: 150px;">
                        <?php } else { ?>
                            <img src="../../uploads/default-profile.png" alt="Foto por defecto" class="img-fluid rounded-circle" style="max-width: 150px;">
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
    <!-- Card de encabezado -->
    <div class="card mt-3">
        <div class="card-body">
            <div class="row">
                <!-- Columna para el título -->
                <div class="col-md-6">
                    <h3>Citas Pendientes</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- mensaje de erro o de success -->
    <?php if (isset($_SESSION['error'])): ?>
    <div class="container mt-2">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $_SESSION['error']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    </div>
    <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
    <div class="container mt-2">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $_SESSION['success']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    </div>
    <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <!-- Card para la tabla de citas -->

    <div class="card mt-3">
        <div class="card-body">
            <?php if (!empty($citas_previas)) { ?>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Hora</th>
                                <th class="text-center">Paciente</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($citas_previas as $cita) { ?>
                                <tr>
                                    <td class="text-center"><?= $cita['appointment_date']; ?></td>
                                    <td class="text-center"><?= $cita['appointment_time']; ?></td>
                                    <td class="text-center"><?= $cita['patient_first_name'] . ' ' . $cita['patient_last_name']; ?></td>
                                    <td class="text-center"><?= ucfirst($cita['status']); ?></td>
                                    <td class="text-center">
                                        <?php if (isset($cita['status']) && $cita['status'] === 'scheduled' && strtotime($hora_actual) >= strtotime($cita['appointment_time']) ) { ?>
                                        <a href="records.php?id=<?=$cita['appointment_id']; ?>" class="btn" style="padding: 3px">Generar Reporte</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <p class="text-center">No tienes citas Pendientes.</p>
            <?php } ?>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <div class="row">
                <!-- Columna para el título -->
                <div class="col-md-6">
                    <h3>Expedientes</h3>
                </div>
            </div>
            <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Paciente</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql_expedientes = "SELECT mr.record_date, p.first_name AS patient_first_name, p.last_name AS patient_last_name
                                                FROM medical_records mr
                                                JOIN patients p ON mr.patient_id = p.id
                                                WHERE mr.doctor_id = ?
                                                ORDER BY mr.record_date DESC";
                            $stmt_expedientes = $conn->prepare($sql_expedientes);
                            $stmt_expedientes->bind_param("i", $id_usuario);
                            $stmt_expedientes->execute();
                            $expedientes = $stmt_expedientes->get_result()->fetch_all(MYSQLI_ASSOC);
                            $stmt_expedientes->close();

                            foreach ($expedientes as $expediente) {
                                echo "<tr>";
                                echo "<td class='text-center'>" . $expediente['record_date'] . "</td>";
                                echo "<td class='text-center'>" . $expediente['patient_first_name'] . " " . $expediente['patient_last_name'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
        </div>

    </div>
</div>
</body>
</html>