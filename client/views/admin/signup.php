<?php
//include 'common/header.php'; 
include '../common/navbar.php';
?>
<!-- Signup Form -->
<section class="signup-form section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-12">
                <div class="form-box">
                    <h2>Nuevo Usuario</h2>
                    <form class="mt-4" action="../../../server/controllers/signup_process.php" method="post">
                        <div class="form-group">
                            <label for="name">Nombre<span style="color: red;">*</span></label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="last">Apellido<span style="color: red;">*</span></label>
                            <input type="text" id="last" name="last" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label for="gender">Sexo<span style="color: red;">*</span></label>
                            <div class="row">
                                <div class="col-10">  
                                    <select id="gender" name="gender" class="form-control" required>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="age">Edad<span style="color: red;">*</span></label>
                            <input type="number" id="age" name="age" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email<span style="color: red;">*</span></label>
                            <input type="email" id="email" name="email" class="form-control" required>
                            <small id="emailHelp" class="form-text text-muted" style="color: red; display: none;">Por favor, ingrese un correo electrónico válido de Gmail, Hotmail o Outlook.</small>
                        </div>
                        <script>
                            document.getElementById('email').addEventListener('input', function() {
                                const emailInput = this;
                                const emailHelp = document.getElementById('emailHelp');
                                const emailPattern = /^[^\s@]+@(gmail\.com|hotmail\.com|outlook\.com)$/i;
                                if (!emailPattern.test(emailInput.value)) {
                                    emailHelp.style.display = 'block';
                                } else {
                                    emailHelp.style.display = 'none';
                                }
                            });
                        </script>
                        <div class="form-group">
                            <label for="phone">Teléfono<span style="color: red;">*</span></label>
                            <input type="tel" id="phone" name="phone" class="form-control" maxlength="8" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password<span style="color: red;">*</span></label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <script>
                            document.getElementById('password').addEventListener('input', validatePasswords);
                            document.getElementById('confirm_password').addEventListener('input', validatePasswords);

                            function validatePasswords() {
                                const passwordInput = document.getElementById('password');
                                const confirmPasswordInput = document.getElementById('confirm_password');
                                const confirmPasswordHelp = document.getElementById('confirmPasswordHelp');

                                if (confirmPasswordInput.value !== passwordInput.value) {
                                    confirmPasswordHelp.style.display = 'block';
                                } else {
                                    confirmPasswordHelp.style.display = 'none';
                                }
                            }
                        </script>
                        
                        <div class="row">
                        <div class="col-10" id="specialty" style="display: none;">
                        <label for="specialty">Especialidades</label><br>
                                    <select id="specialty" name="specialty" class="form-control">
                                        <option value="Oftalmología">Oftalmología</option>
                                        <option value="Cardiología">Cardiología</option>
                                        <option value="Pediatría">Pediatría</option>
                                        <option value="Ginecología">Ginecología</option>
                                        <option value="Dermatología">Dermatología</option>
                                        <option value="Medicina General" select>Medicina General</option>
                                    </select>
                        </div>   
                        </div>
                        <div class="form-group">
                            <label for="role">El nuevo usuario es<span style="color: red;">*</span></label>
                            <div class="row ml-2">
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="role" id="patients" value="patients" required>
                                        <label class="form-check-label" for="paciente">Paciente</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="role" id="doctors" value="doctors" required>
                                        <label class="form-check-label" for="medico">Médico</label>
                                    </div>
                                </div>
                               
                                <script>
                                    document.getElementById('doctors').addEventListener('change', function() {
                                        document.getElementById('specialty').style.display = 'block';
                                    });
                                    document.getElementById('patients').addEventListener('change', function() {
                                        document.getElementById('specialty').style.display = 'none';
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="buttonsignup">Crear Usuario</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer Area -->
<?php //include 'common/footer.php'; ?>
<!-- jquery Min JS -->
<script src="../asset/js/jquery.min.js"></script>
		<!-- jquery Migrate JS -->
		<script src="../asset/js/jquery-migrate-3.0.0.js"></script>
		<!-- jquery Ui JS -->
		<script src="../asset/js/jquery-ui.min.js"></script>
		<!-- Easing JS -->
        <script src="../asset/js/easing.js"></script>
		<!-- Color JS -->
		<script src="../asset/js/colors.js"></script>
		<!-- Popper JS -->
		<script src="../asset/js/popper.min.js"></script>
		<!-- Bootstrap Datepicker JS -->
		<script src="../asset/js/bootstrap-datepicker.js"></script>
		<!-- Jquery Nav JS -->
        <script src="../asset/js/jquery.nav.js"></script>
		<!-- Slicknav JS -->
		<script src="../asset/js/slicknav.min.js"></script>
		<!-- ScrollUp JS -->
        <script src="../asset/js/jquery.scrollUp.min.js"></script>
		<!-- Niceselect JS -->
		<script src="../asset/js/niceselect.js"></script>
		<!-- Tilt Jquery JS -->
		<script src="../asset/js/tilt.jquery.min.js"></script>
		<!-- Owl Carousel JS -->
        <script src="../asset/js/owl-carousel.js"></script>
		<!-- counterup JS -->
		<script src="../asset/js/jquery.counterup.min.js"></script>
		<!-- Steller JS -->
		<script src="../asset/js/steller.js"></script>
		<!-- Wow JS -->
		<script src="../asset/js/wow.min.js"></script>
		<!-- Magnific Popup JS -->
		<script src="../asset/js/jquery.magnific-popup.min.js"></script>
		<!-- Counter Up CDN JS -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="../asset/js/bootstrap.min.js"></script>
		<!-- Main JS -->
		<script src="../asset/js/main.js"></script>

<!-- /End Signup Form -->
