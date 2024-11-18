
<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['id'])) {
    header("Location: login.php"); // Redirigir a login si no está autenticado
    exit();
}

// Obtener datos del usuario desde la sesión
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$email = $_SESSION['email'];
$rol = $_SESSION['role'];
$foto = $_SESSION['foto'];

?>
<?php include '../../server/views/navbar.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/bootstrap.css">
</head>
<body>
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
    <div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Citas del Paciente</h3>
            <div>
                <button class="btn btn-success btn-sm" onclick="window.location.href='agendar_cita.php'">Agendar</button>
                <button class="btn btn-warning btn-sm" onclick="window.location.href='modificar_cita.php'">Modificar</button>
                <button class="btn btn-danger btn-sm" onclick="window.location.href='cancelar_cita.php'">Cancelar</button>
            </div>
        </div>
        <div class="card-body">
            <?php
            // Consulta de las citas del paciente
            $sql = "SELECT fecha, hora, motivo, medico FROM citas WHERE paciente_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $_SESSION['id_usuario']); // ID del paciente desde la sesión
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo '<table class="table table-bordered">';
                echo '<thead class="thead-light">';
                echo '<tr>';
                echo '<th>Fecha</th>';
                echo '<th>Hora</th>';
                echo '<th>Motivo</th>';
                echo '<th>Médico</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['fecha'] . '</td>';
                    echo '<td>' . $row['hora'] . '</td>';
                    echo '<td>' . $row['motivo'] . '</td>';
                    echo '<td>' . $row['medico'] . '</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p class="text-muted text-center">No hay citas registradas.</p>';
            }
            $stmt->close();
            ?>
        </div>
    </div>
</div>
</body>
</html>

