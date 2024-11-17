<?php include '../../server/views/header.php'; ?>
<!-- Login Form -->

<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'patient') {
    header("Location: login.php");
    exit;
}

// Datos del paciente desde la sesión
$patient_id = $_SESSION['user_id'];
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$email = $_SESSION['email'];

// Conexión a la base de datos
include_once "../../server/database/conecction.php";

// Obtener citas del paciente
$sql = "SELECT a.appointment_id, d.first_name AS doctor_first_name, d.last_name AS doctor_last_name, 
        a.appointment_date, a.appointment_time, a.status 
        FROM appointments a 
        JOIN doctors d ON a.doctor_id = d.doctor_id 
        WHERE a.patient_id = ? 
        ORDER BY a.appointment_date DESC, a.appointment_time DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $patient_id);
$stmt->execute();
$result = $stmt->get_result();
$citas = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Paciente</title>
</head>
<body>
    <h1>Bienvenido, <?php echo "$first_name $last_name"; ?></h1>
    <p>Email: <?php echo $email; ?></p>

    <hr>

    <h2>Acciones</h2>
    <button onclick="mostrarFormulario('crear')">Crear cita</button>
    <button onclick="mostrarFormulario('modificar')">Modificar cita</button>
    <button onclick="mostrarFormulario('cancelar')">Cancelar cita</button>

    <hr>

    <h2>Historial de Citas</h2>
    <?php if (count($citas) > 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Doctor</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($citas as $cita): ?>
                    <tr>
                        <td><?php echo $cita['appointment_date']; ?></td>
                        <td><?php echo $cita['appointment_time']; ?></td>
                        <td><?php echo "{$cita['doctor_first_name']} {$cita['doctor_last_name']}"; ?></td>
                        <td><?php echo $cita['status']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No tienes citas registradas.</p>
    <?php endif; ?>

    <script>
        function mostrarFormulario(accion) {
            alert(`Formulario para ${accion} cita. Aquí implementas la lógica para mostrar dinámicamente el formulario.`);
        }
    </script>
</body>
</html>



		
		<!-- jquery Min JS -->
        <script src="js/jquery.min.js"></script>
		<!-- jquery Migrate JS -->
		<script src="js/jquery-migrate-3.0.0.js"></script>
		<!-- jquery Ui JS -->
		<script src="js/jquery-ui.min.js"></script>
		<!-- Easing JS -->
        <script src="js/easing.js"></script>
		<!-- Color JS -->
		<script src="js/colors.js"></script>
		<!-- Popper JS -->
		<script src="js/popper.min.js"></script>
		<!-- Bootstrap Datepicker JS -->
		<script src="js/bootstrap-datepicker.js"></script>
		<!-- Jquery Nav JS -->
        <script src="js/jquery.nav.js"></script>
		<!-- Slicknav JS -->
		<script src="js/slicknav.min.js"></script>
		<!-- ScrollUp JS -->
        <script src="js/jquery.scrollUp.min.js"></script>
		<!-- Niceselect JS -->
		<script src="js/niceselect.js"></script>
		<!-- Tilt Jquery JS -->
		<script src="js/tilt.jquery.min.js"></script>
		<!-- Owl Carousel JS -->
        <script src="js/owl-carousel.js"></script>
		<!-- counterup JS -->
		<script src="js/jquery.counterup.min.js"></script>
		<!-- Steller JS -->
		<script src="js/steller.js"></script>
		<!-- Wow JS -->
		<script src="js/wow.min.js"></script>
		<!-- Magnific Popup JS -->
		<script src="js/jquery.magnific-popup.min.js"></script>
		<!-- Counter Up CDN JS -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Main JS -->
		<script src="js/main.js"></script>
    </body>
</html>