<?php
//include 'common/header.php'; 
//include 'common/navbar.php';
?>
        <head>
            <!-- Title -->
            <title>Clínica Virgen de las Nieves</title>
            
            <!-- Favicon -->
            <link rel="icon" href="../asset/img/favicon.png">
            
            <!-- Google Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
            <!-- Nice Select CSS -->
            <link rel="stylesheet" href="../asset/css/nice-select.css">
            <!-- Font Awesome CSS -->
            <link rel="stylesheet" href="../asset/css/font-awesome.min.css">
            <!-- icofont CSS -->
            <link rel="stylesheet" href="../asset/css/icofont.css">
            <!-- Slicknav -->
            <link rel="stylesheet" href="../asset/css/slicknav.min.css">
            <!-- Owl Carousel CSS -->
            <link rel="stylesheet" href="../asset/css/owl-carousel.css">
            <!-- Datepicker CSS -->
            <link rel="stylesheet" href="../asset/css/datepicker.css">
            <!-- Animate CSS -->
            <link rel="stylesheet" href="../asset/css/animate.min.css">
            <!-- Magnific Popup CSS -->
            <link rel="stylesheet" href="../asset/css/magnific-popup.css">
        
            <!-- Medipro CSS -->
            <link rel="stylesheet" href="../asset/css/normalize.css">
            <link rel="stylesheet" href="../asset/css/style.css">
            <link rel="stylesheet" href="../asset/css/responsive.css">
            
        </head>
	 <body>
	 
		 <!-- Preloader -->
		 <div class="preloader">
			 <div class="loader">
				 <div class="loader-outter"></div>
				 <div class="loader-inner"></div>
 
				 <div class="indicator"> 
					 <svg width="16px" height="12px">
						 <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
						 <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
					 </svg>
				 </div>
			 </div>
		 </div>
		 <!-- End Preloader -->

<!-- Login Form -->
 <?php include 'common/navbar.php'; ?>
<section class="login-form section">
    <div class="container">
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
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Soy un:</label>
                            <div class="row ml-2">
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="role" id="paciente" value="pacientes" required>
                                        <label class="form-check-label" for="paciente">Paciente</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="role" id="medico" value="medico" required>
                                        <label class="form-check-label" for="medico">Médico</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="buttonlogin">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /End Login Form -->
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

<!-- Footer Area -->
<?php //include 'common/footer.php'; ?>
<!-- /End Footer Area -->
