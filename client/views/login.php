<?php include '../../server/views/header.php'; ?>
<!-- Login Form -->
<head>
<link rel="stylesheet" href="../../client/css/bootstrap.min.css">
<link rel="stylesheet" href="../../client/css/icofont.min.css">
<link rel="stylesheet" href="../../client/css/style.css">
<link rel="stylesheet" href="../../client/css/responsive.css">
</head>

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
						</div>
						<div class="form-check">
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
		<footer id="footer" class="footer ">
			<!-- Footer Top -->
			<div class="footer-top">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer">
								<h2>Clínica<br> Virgen de las Nieves</h2>
								<p>Ubicada camino a Viacha Av. - Nro. 1.</p>
								<!-- Social -->
								<ul class="social">
									<li><a href="#"><i class="icofont-facebook"></i></a></li>
									<li><a href="#"><i class="icofont-twitter"></i></a></li>
									<li><a href="#"><i class="icofont-instagram"></i></i></a></li>
									<li><a href="#"><i class="icofont-brand-whatsapp"></i></i></a></li>
								</ul>
								<!-- End Social -->
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer">
								<h2>Horarios de funcionamiento:</h2>
								<ul class="time-sidual">
									<li class="day">Lunes - Viernes <span>8.00-20.00</span></li>
									<li class="day">Sábado <span>9.00-18.30</span></li>
									<li class="day">Feriados <span>Sólo Emergencia</span></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer">
								<h2>Noticias</h2>
								<p>Suscríbete a nuestro buzón de notificaciones</p>
								<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
									<input name="email" placeholder="Email" class="common-input" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Your email address'" required="" type="email">
									<button class="button"><i class="icofont icofont-paper-plane"></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Footer Top -->
			<!-- Copyright -->
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-12">
							<div class="copyright-content">
								<p>© Copyright 2018  |  All Rights Reserved by <a href="" target="_blank">Python GX</a> </p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Copyright -->
		</footer>
		<!--/ End Footer Area -->
		
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