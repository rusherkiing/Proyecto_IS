<?php include 'common/header.php'; ?>
<head>
	<style>
	/* Asegura que los radio buttons estén centrados en el contenedor */
	.form-check-inline {
		display: inline-block; /* Los radio buttons se mantienen en línea */
		margin-right: 20px; /* Añadir espacio entre ellos */
		margin-left: 50px; /* Añadir un pequeño margen a la izquierda para centrar los radio buttons */
	}

	/* Reducir el tamaño del botón de ver/ocultar contraseña para que coincida con el campo de la contraseña */
	.input-group .btn {
		padding: 5px 10px; /* Reduce el padding para que el botón sea más pequeño */
		font-size: 16px; /* Ajusta el tamaño de la fuente */
		height: 38px; /* Asegura que el botón tenga la misma altura que el campo */
	}

	/* Ajustar el tamaño de la caja del campo de contraseña */
	.input-group .form-control {
		height: 38px; /* Asegura que el campo de contraseña tenga la misma altura que el botón */
	}

	/* Estilo del botón de contraseña en el login */
	#toggle-password, #toggle-password-signup {
		font-size: 18px; /* Hace el ícono más pequeño */
	}
	/* Aumentar el tamaño de los radio buttons */
	.form-check-input {
		transform: scale(1.5); /* Aumenta el tamaño de los radio buttons */
		margin-right: 10px; /* Añade algo de espacio entre el radio button y la etiqueta */
	}
	/* Reducir el margen y padding en el contenedor */
	body {
		margin-top: 0; /* Eliminar margen superior del body */
	}

	/* Reducir el espacio superior de la sección de login */
	.login-form.section {
		padding-top: 30px; /* Ajusta este valor según sea necesario */
	}

	</style>
</head>
<body>
<section class="login-form section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-12">
                <!-- Card for Login -->
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-left">Login</h1>
                        <form action="../../server/controllers/login_process.php" method="POST">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <div class="input-group">
                                    <input type="password" id="password" name="password" class="form-control" required>
                                    <div class="input-group-append">
                                        <button type="button" id="toggle-password" class="btn btn-outline-light">
                                            <i class="icofont-eye-blocked"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-left">
                                <label for="role">Soy un:</label>
							</div>
							<div class="form-group text-center">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" id="patients" value="patients" required>
                                    <label class="form-check-label" for="patients">Paciente</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" id="doctors" value="doctors" required>
                                    <label class="form-check-label" for="doctors">Médico</label>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-light" name="buttonlogin">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include 'common/footer.php'; ?>

<script>
// Mostrar/Ocultar Contraseña en Login
document.getElementById("toggle-password").addEventListener("click", function() {
    var passwordField = document.getElementById("password");
    var icon = this.querySelector("i");
    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.remove("icofont-eye-blocked");
        icon.classList.add("icofont-eye");
    } else {
        passwordField.type = "password";
        icon.classList.remove("icofont-eye");
        icon.classList.add("icofont-eye-blocked");
    }
});

// Mostrar/Ocultar Contraseña en Sign Up
document.getElementById("toggle-password-signup").addEventListener("click", function() {
    var passwordField = document.getElementById("password-signup");
    var icon = this.querySelector("i");
    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.remove("icofont-eye-blocked");
        icon.classList.add("icofont-eye");
    } else {
        passwordField.type = "password";
        icon.classList.remove("icofont-eye");
        icon.classList.add("icofont-eye-blocked");
    }
});
</script>

</body>
</html>
