<?php
include 'common/header.php'; 
include 'common/navbar.php';
?>
<!-- Login Form -->

<section class="login-form section">
<div class="container"></div>
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-12">
            <div class="form-box">
                <h2>Login</h2>
                <form action="../../server/controllers/login_process.php" method="POST">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" required >
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="buttonlogin">Login</button>
                    </div>
					<div class="form-group ml-5"></div>
						<label for="role">Soy un:</label>
						<div class="form-check ">
						<input class="form-check-input" type="radio" name="role" id="paciente" value="pacientes" required>
							<label class="form-check-label" for="paciente">Paciente</label>
							<input class="form-check-input" type="radio" name="role" id="medico" value="medico" required>
							<label class="form-check-label" for="medico">Médico</label>
						</div>
					</div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
<!-- /End Login Form -->

<!-- Signup Form -->
<section class="signup-form section">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-12">
            <div class="form-box">
                <h2>Sign Up</h2>
                <form action="../../server/controllers/signup_process.php" method="post">
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
					<div class="form-group">
                        <label for="name">Apellido:</label>
                        <input type="text" id="name" name="last" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
					<div class="form-group ml-5"></div>
						<label for="role">Soy un:</label>
						<div class="form-check ">
							<input class="form-check-input" type="radio" name="role" id="paciente" value="pacientes" required>
							<label class="form-check-label" for="paciente">Paciente</label>
							<input class="form-check-input" type="radio" name="role" id="medico" value="medico" required>
							<label class="form-check-label" for="medico">Médico</label>
						</div>
						
					</div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="buttonlogin">Sign Up</button>
                    </div>
					
                </form>
            </div>
        </div>
    </div>
</div>
</section>
<!-- /End Signup Form -->
				</div>
			</div>
		</section>
		<!-- /End Newsletter Area -->
		
		<!-- Footer Area -->
		<?php include 'common/footer.php'; ?>
		<!--/ End Footer Area -->
