<?php
session_start();
require_once '../../../server/database/conection.php';

// Verificar si el usuario está autenticado y es paciente
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'patients') {
    header("Location: ../login.php");
    exit;
}

// Datos del usuario
$id_usuario = $_SESSION['id'];
$nombre = $_SESSION['nombre'];

$apellido = $_SESSION['apellido'];
$email = $_SESSION['email'];
$foto = $_SESSION['foto'];
?>
<div class="container mt-5">
    <div class="card mt-3">
        <div id="scheduleFormContainer" class="card-body">
            <h3 class="mb-4 text-center">Agendar Cita Médica</h3>
            <form method="POST" action="../../../server/controllers/schedule_appointment.php">
                <div class="mb-3">
                    <label for="appointment_date"><strong>Seleccionar Fecha:</strong></label>
                    <input type="date" id="appointment_date" name="appointment_date" class="form-control"
                        min="<?= date('Y-m-d'); ?>" max="<?= date('Y-m-d', strtotime('+5 days')); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="specialty"><strong>Seleccionar Especialidad:</strong></label>
                        <select id="specialty" name="specialty" class="form-control" required>
                            <option value="" selected disabled>Selecciona una especialidad</option>
                            <option value="Oftalmología">Oftalmología</option>
                            <option value="Cardiología">Cardiología</option>
                            <option value="Pediatría">Pediatría</option>
                            <option value="Ginecología">Ginecología</option>
                            <option value="Dermatología">Dermatología</option>
                            <option value="Medicina General">Medicina General</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="doctor" class="form-label"><strong>Doctor:</strong></label>
                        <select id="doctor" name="doctor" class="form-control" required>
                            <option value="" selected disabled>Selecciona un doctor</option>
                            <?php
                            require_once '../../../server/database/conection.php';

                            $query = "SELECT id, first_name, last_name FROM doctors";
                            $result = $conn->query($query);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row['id'] . '">' . $row['first_name'] . ' ' . $row['last_name'] . '</option>';
                                }
                            } else {
                                echo '<option value="" disabled>No hay doctores disponibles</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="time" class="form-label"><strong>Hora:</strong></label>
                        <select id="time" name="time" class="form-control" required>
                            <option value="" selected disabled>Selecciona un horario</option>
                            <?php
                            $start_time = strtotime('08:00:00');
                            $end_time = strtotime('16:00:00');
                            $interval = 30 * 60; // 30 minutes in seconds

                            for ($time = $start_time; $time <= $end_time; $time += $interval) {
                                echo '<option value="' . date('H:i:s', $time) . '">' . date('H:i:s', $time) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <input type="text" value=<?php echo $id_usuario; ?> name="user_id" hidden>      
                        <button type="submit" class="btn" name="buttonagendar">Confirmar Agenda</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

