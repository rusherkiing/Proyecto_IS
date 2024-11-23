<?php
session_start();

// Destruir todos los datos de la sesión
session_unset();
session_destroy();

// Redirigir a la página principal
header("Location: ../../client/index.php");
exit();
?>
