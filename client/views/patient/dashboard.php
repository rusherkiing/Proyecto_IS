<?php
session_start();

// Verificar autenticación
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();
}

// Datos de sesión
$id_usuario = $_SESSION['id'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$email = $_SESSION['email'];
$rol = $_SESSION['role'];
$foto = $_SESSION['foto'];

// Incluir conexión
include_once '../../../server/database/conection.php';

// Consultar citas activas
$sql = "SELECT a.appointment_id, a.appointment_date, a.appointment_time, 
        d.first_name AS doctor_name, d.last_name AS doctor_lastname, d.specialty
        FROM appointments a
        JOIN doctors d ON a.doctor_id = d.doctor_id
        WHERE a.patient_id = ? AND a.status = 'scheduled'
        ORDER BY a.appointment_date, a.appointment_time";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$citas = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>

<?php include '../common/navbar.php'; ?>

<div class="container mt-5">
    <h1 class="text-center">¡Bienvenido, <?php echo $nombre . ' ' . $apellido; ?>!</h1>
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
    

    <!-- Formulario para agendar citas -->
    <div class="card mt-5">
        <div class="card-body">
            <h3>Agendar Cita</h3>
            <form id="form-agendar-cita">
                <!-- Paso 1: Fecha -->
                <div id="step-1">
                    <label for="fecha"><strong>Fecha:</strong></label>
                    <input type="date" id="fecha" name="fecha" min="<?= date('Y-m-d', strtotime('+1 day')) ?>" max="<?= date('Y-m-d', strtotime('+2 days')) ?>" required>
                    <p id="error-fecha" class="text-danger"></p>
                </div>

                <!-- Paso 2: Especialidad -->
                <div id="step-2" style="display: none;">
                    <label for="especialidad"><strong>Especialidad:</strong></label>
                    <select id="especialidad" name="especialidad" required>
                        <option value="">Selecciona una especialidad</option>
                    </select>
                </div>

                <!-- Paso 3: Médico -->
                <div id="step-3" style="display: none;">
                    <label for="doctor"><strong>Médico:</strong></label>
                    <select id="doctor" name="doctor" required>
                        <option value="">Selecciona un médico</option>
                    </select>
                </div>

                <!-- Paso 4: Hora -->
                <div id="step-4" style="display: none;">
                    <label for="hora"><strong>Hora:</strong></label>
                    <select id="hora" name="hora" required>
                        <option value="">Selecciona una hora</option>
                    </select>
                </div>

                <!-- Botón de confirmación -->
                <button type="button" id="btn-confirmar" class="btn btn-primary mt-3" style="display: none;">Confirmar Cita</button>
            </form>
        </div>
    </div>
    <!-- Sección de Citas -->
    <div class="card mt-3">
        <div class="card-body">
            <h3 class="text-center">Mis Citas</h3>
            <?php if (empty($citas)) { ?>
                <p class="text-center">No tienes citas programadas.</p>
            <?php } else { ?>
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Médico</th>
                            <th>Especialidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($citas as $cita) { ?>
                            <tr>
                                <td><?php echo $cita['appointment_date']; ?></td>
                                <td><?php echo $cita['appointment_time']; ?></td>
                                <td><?php echo $cita['doctor_name'] . ' ' . $cita['doctor_lastname']; ?></td>
                                <td><?php echo $cita['specialty']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Script para manejar los pasos y la verificación de la fecha -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Paso 1: Verificar la fecha seleccionada
    $("#next-step-1").click(function() {
        var fechaSeleccionada = $("#fecha").val();

        if (fechaSeleccionada == "") {
            $("#error-fecha").text("Por favor selecciona una fecha.");
            return;
        }

        // Llamar al archivo verificar_fecha.php para verificar si ya hay una cita
        $.ajax({
            url: "actions/verificar_fecha.php", // Ruta del archivo PHP
            type: "POST",
            data: { fecha: fechaSeleccionada },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    $("#step-2").show();
                    $("#step-1").hide();
                    $("#error-fecha").text(""); // Limpiar el error
                } else {
                    $("#error-fecha").text(response.error); // Mostrar error si ya hay cita
                }
            },
            error: function() {
                alert("Hubo un error al verificar la fecha.");
            }
        });
    });

    // Paso 2: Cargar las especialidades disponibles
    $("#next-step-2").click(function() {
        var especialidad = $("#especialidad").val();

        // Asegurarse de que se haya seleccionado una especialidad
        if (especialidad == "") {
            alert("Por favor selecciona una especialidad.");
            return;
        }

        // Llamar al archivo AJAX para cargar doctores según la especialidad seleccionada
        $.ajax({
            url: "actions/cargar_doctores.php",
            type: "POST",
            data: { especialidad: especialidad },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    var doctorSelect = $("#doctor");
                    doctorSelect.empty(); // Limpiar opciones anteriores
                    $.each(response.doctores, function(index, doctor) {
                        doctorSelect.append("<option value='" + doctor.id + "'>" + doctor.nombre + "</option>");
                    });
                    $("#step-3").show();
                    $("#step-2").hide();
                }
            },
            error: function() {
                alert("Hubo un error al cargar los doctores.");
            }
        });
    });

    // Paso 3: Cargar las horas disponibles
    $("#next-step-3").click(function() {
        var doctorId = $("#doctor").val();

        // Asegurarse de que se haya seleccionado un doctor
        if (doctorId == "") {
            alert("Por favor selecciona un doctor.");
            return;
        }

        // Llamar al archivo AJAX para cargar las horas disponibles según el doctor
        $.ajax({
            url: "actions/cargar_horas.php",
            type: "POST",
            data: { doctor_id: doctorId, fecha: $("#fecha").val() },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    var horaSelect = $("#hora");
                    horaSelect.empty(); // Limpiar opciones anteriores
                    $.each(response.horas, function(index, hora) {
                        horaSelect.append("<option value='" + hora + "'>" + hora + "</option>");
                    });
                    $("#step-4").show();
                    $("#step-3").hide();
                }
            },
            error: function() {
                alert("Hubo un error al cargar las horas.");
            }
        });
    });

    // Enviar el formulario para agendar la cita
    $("#form-agendar-cita").submit(function(e) {
        e.preventDefault();

        var fecha = $("#fecha").val();
        var especialidad = $("#especialidad").val();
        var doctor = $("#doctor").val();
        var hora = $("#hora").val();

        // Enviar los datos al servidor para guardar la cita
        $.ajax({
            url: "actions/agendar_cita.php",
            type: "POST",
            data: {
                fecha: fecha,
                especialidad: especialidad,
                doctor: doctor,
                hora: hora
            },
            success: function(response) {
                alert("Cita agendada con éxito.");
                location.reload(); // Recargar la página para mostrar la nueva cita
            },
            error: function() {
                alert("Hubo un error al agendar la cita.");
            }
        });
    });
});
</script>
