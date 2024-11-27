<?php
session_start();
require_once '../../../server/database/conection.php';

// Verificar si el usuario está autenticado y es paciente
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'patients') {
    header("Location: ../../client/views/login.php");
    exit;
}

// Datos del usuario
$id_usuario = $_SESSION['id'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$email = $_SESSION['email'];
$foto = $_SESSION['foto'];

// Consultar citas previas
$sql_citas = "SELECT a.appointment_id, a.appointment_date, a.appointment_time, 
              d.first_name AS doctor_first_name, d.last_name AS doctor_last_name, 
              d.specialty, a.status 
              FROM appointments a
              JOIN doctors d ON a.doctor_id = d.id
              WHERE a.patient_id = ?
              ORDER BY a.appointment_date DESC, a.appointment_time DESC";
$stmt_citas = $conn->prepare($sql_citas);
$stmt_citas->bind_param("i", $id_usuario);
$stmt_citas->execute();
$citas_previas = $stmt_citas->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt_citas->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Paciente</title>
    <link rel="stylesheet" href="../../asset/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php include '../common/navbar.php'; ?>

     <!-- CSS específico para esta página -->
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
</head>
<body>
    <!-- Mostrar los datos del paciente -->
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
                    </div>
                    <!-- Columna para la foto -->
                    <div class="col-md-4 text-center">
                        <?php if (!empty($foto)) { ?>
                            <img src="../../uploads/<?php echo $foto; ?>" alt="Foto de <?php echo $nombre; ?>" class="img-fluid rounded-circle" style="max-width: 150px;">
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
                    <h3>Citas Previas</h3>
                </div>
                <!-- Columna para el botón -->
                <div class="col-md-6 text-end">
                    <a href="#agendar-cita" class="btn btn-primary" style="float: right;">Agendar Cita</a>
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
                                <th class="text-center">Doctor</th>
                                <th class="text-center">Especialidad</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($citas_previas as $cita) { ?>
                                <tr>
                                    <td class="text-center"><?= $cita['appointment_date']; ?></td>
                                    <td class="text-center"><?= $cita['appointment_time']; ?></td>
                                    <td class="text-center"><?= $cita['doctor_first_name'] . ' ' . $cita['doctor_last_name']; ?></td>
                                    <td class="text-center"><?= $cita['specialty']; ?></td>
                                    <td class="text-center"><?= ucfirst($cita['status']); ?></td>
                                    <td>
                                    <?php if (isset($cita['status']) && $cita['status'] === 'scheduled') { ?>
                                        <!-- Botones Modificar y Cancelar -->
                                        <a href="modificar_cita.php?id=<?=$cita['appointment_id']; ?>" class="btn btn-warning modify-btn" style="float: left; padding: 4px">Modificar</a>
                                        <a href="cancelar_cita.php?id=<?=$cita['appointment_id']; ?>" class="btn btn-danger cancel-btn" style="float: right; padding: 4px">Cancelar</a>
                                    <?php } ?>

                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <p class="text-center">No tienes citas previas.</p>
            <?php } ?>
        </div>
    </div>
</div>



    <!-- Agendar cita-->
    <div class="container mt-5">
        <div class="card mt-3">
            <div class="card-body">
                <h3 class="mb-4 text-center">Completa los datos para agendar tu cita</h3>
                <form id="create-appointment-form">
                    <div class="row mb-3">
                        <!-- Primera fila: Fecha -->
                        <div class="col-md-4 d-flex align-items-center">
                            <label for="date" class="form-label"><strong>Fecha:</strong> (máximo 3 días desde hoy)</label>
                        </div>
                        <div class="col-md-8">
                            <input type="date" id="date" name="date" class="form-control" 
                                min="<?= date('Y-m-d'); ?>" max="<?= date('Y-m-d', strtotime('+3 days')); ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <!-- Segunda fila: Especialidad -->
                        <div class="col-md-4 d-flex align-items-center">
                            <label for="specialty" class="form-label"><strong>Especialidad:</strong></label>
                        </div>
                        <div class="col-md-8">
                            <select id="specialty" name="specialty" class="form-control" required>
                                <option value="" selected disabled>Selecciona una especialidad</option>
                                <?php
                                $sql_specialties = "SELECT DISTINCT specialty FROM doctors";
                                $result_specialties = $conn->query($sql_specialties);
                                while ($row = $result_specialties->fetch_assoc()) {
                                    echo "<option value='{$row['specialty']}'>{$row['specialty']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <!-- Tercera fila: Doctor -->
                        <div class="col-md-4 d-flex align-items-center">
                            <label for="doctor" class="form-label"><strong>Doctor:</strong></label>
                        </div>
                        <div class="col-md-8">
                            <select id="doctor" name="doctor" class="form-control" required>
                                <option value="" selected disabled>Selecciona un doctor</option>
                            </select>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <!-- Cuarta fila: Hora -->
                        <div class="col-md-4 d-flex align-items-center">
                            <label for="time" class="form-label"><strong>Hora:</strong></label>
                        </div>
                        <div class="col-md-8">
                            <select id="time" name="time" class="form-control" required>
                                <option value="" selected disabled>Selecciona una hora</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Quinta fila: Botón -->
                        <div class="col-md-4"></div> <!-- Columna vacía para alinear -->
                        <div class="col-md-8 text-left">
                            <button type="submit" class="btn btn-primary">Agendar cita</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../../asset/js/appointment.js"></script>
</body>
</html>
