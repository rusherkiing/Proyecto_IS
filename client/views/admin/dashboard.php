<?php
session_start();
require_once '../../../server/database/conection.php';
$sql = "SELECT id, first_name, last_name, email, phone FROM patients";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en"></html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <link rel="stylesheet" href="../../asset/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php include '../common/navbar.php'; ?>
       
</head>
    <!-- Mostrar los datos del médico -->
    <div class="container mt-5">
        <h1 class="text-center">¡Bienvenid@ Admin</h1>
        <div class="d-flex justify-content-center"></div>
        <div class="card mt-3">
            <div class="card-body">
                <div class="row">   
                    <!-- Columna para los detalles -->
                    <div class="col-md-8">
                        <h3 style="margin-bottom:10px">Pacientes Registrados</h3>
                        <div class="table-responsive text-center"></div></div>
                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Apellido</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Número</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $patient) { ?>
                                <tr>
                                    <td class="text-center"><?= $patient['id']; ?></td>
                                    <td class="text-center"><?= $patient['first_name']; ?></td>
                                    <td class="text-center"><?= $patient['last_name']; ?></td>
                                    <td class="text-center"><?= $patient['email']; ?></td>
                                    <td class="text-center"><?= $patient['phone']; ?></td>
                                    <td class="text-center">
                                        <a href="../../../server/controllers/delete.php?id=<?= $patient['id']; ?>" class="btn" style="padding: 3px">Eliminar</a>
                                    </td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="container mt-5">
        <div class="card mt-3">
        <div class="card-body">
        <h3 class="text">Médicos Registrados</h3>
        <div class="table-responsive text-center">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Apellido</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Número</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_doctors = "SELECT id, first_name, last_name, email, phone FROM doctors";
                    $result_doctors = $conn->query($sql_doctors);
                    foreach ($result_doctors as $doctor) { ?>
                        <tr>
                            <td class="text-center"><?= $doctor['id']; ?></td>
                            <td class="text-center"><?= $doctor['first_name']; ?></td>
                            <td class="text-center"><?= $doctor['last_name']; ?></td>
                            <td class="text-center"><?= $doctor['email']; ?></td>
                            <td class="text-center"><?= $doctor['phone']; ?></td>
                            <td class="text-center">
                                <a href="../../../server/controllers/delete.php?id=<?= $doctor['id']; ?>" class="btn" style="padding: 3px">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <a href="signup.php" class="btn">Crear Usuario</a>
        
</div>
</div>
</div>    
</body>
</html>
