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
                    <h2>Sign Up</h2>
                    <form action="../../../server/controllers/signup_process.php" method="post">
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="last">Apellido:</label>
                            <input type="text" id="last" name="last" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Teléfono:</label>
                            <input type="number" id="phone" name="phone" class="form-control" required>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="role">El nuevo usuario es:</label>
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
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="buttonsignup">Sign Up</button>
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
