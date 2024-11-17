<head>
            <!-- Title -->
            <title>Clínica Virgen de las Nieves</title>
            
            <!-- Favicon -->
            <link rel="icon" href="../asset/img/favicon.png">
            
            <!-- Google Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="../../asset/css/bootstrap.min.css">
            <!-- Nice Select CSS -->
            <link rel="stylesheet" href="../../asset/css/nice-select.css">
            <!-- Font Awesome CSS -->
            <link rel="stylesheet" href="../../asset/css/font-awesome.min.css">
            <!-- icofont CSS -->
            <link rel="stylesheet" href="../../asset/css/icofont.css">
            <!-- Slicknav -->
            <link rel="stylesheet" href="../../asset/css/slicknav.min.css">
            <!-- Owl Carousel CSS -->
            <link rel="stylesheet" href="../../asset/css/owl-carousel.css">
            <!-- Datepicker CSS -->
            <link rel="stylesheet" href="../../asset/css/datepicker.css">
            <!-- Animate CSS -->
            <link rel="stylesheet" href="../../asset/css/animate.min.css">
            <!-- Magnific Popup CSS -->
            <link rel="stylesheet" href="../../asset/css/magnific-popup.css">
    
            <!-- Medipro CSS -->
            <link rel="stylesheet" href="../../asset/css/normalize.css">
            <link rel="stylesheet" href="../../asset/css/style.css">
            <link rel="stylesheet" href="../../asset/css/responsive.css">
            
        </head>
        <?php //include '../common/navbar.php'; ?>
    

<body>

<div class="container mt-5">
    <div class="row">
        <!-- Dashboard Summary -->
        <div class="col-md-12">
            <h2>Dashboard</h2>
            <div class="card">
                <div class="card-header">
                    Proximas Citas
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Date:</strong> 2023-10-15 <br>
                            <strong>Time:</strong> 10:00 AM <br>
                            <strong>Doctor:</strong> Dr. John Doe
                        </li>
                        <!-- Add more appointments as needed -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Recent Medical Records -->
        <div class="col-md-6">
            <h3>Recientes Registros Medicos</h3>
            <div class="card">
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Date:</strong> 2023-09-20 <br>
                            <strong>Diagnosis:</strong> Flu <br>
                            <strong>Treatment:</strong> Rest and hydration
                        </li>
                        <!-- Add more records as needed -->
                    </ul>
                </div>
            </div>
        </div>

        <!-- Notifications -->
        <div class="col-md-6">
            <h3>Notifications</h3>
            <div class="card">
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Reminder:</strong> Your next appointment is on 2023-10-15 at 10:00 AM.
                        </li>
                        <!-- Add more notifications as needed -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Schedule Appointment -->
        <div class="col-md-12">
            <h3>Programar Cita</h3>
            <div class="card">
                <div class="card-body">
                    <form>
                        <label for="specialty">Especialidad:</label>
                        <div class="form-group">    
                            <select class="form-control" id="specialty">
                                <option>Cardiology</option>
                                <option>Dermatology</option>
                                <option>Neurology</option>
                                <!-- Add more specialties as needed -->
                            </select>
                        </div>
                        <label for="doctor">Medico</label>
                        <div class="form-group">
                            <select class="form-control" id="doctor">
                                <option>Dr. John Doe</option>
                                <option>Dr. Jane Smith</option>
                                <!-- Add more doctors as needed -->
                            </select>
                        </div>
                        <div class="form-group text-center">
                            <label for="date">Día:</label>
                            <input type="date" class="form-control" id="date">
                        </div>
                        <div class="form-group">
                            <label for="time">Hora:</label>
                            <input type="time" class="form-control" id="time">
                        </div>
                        <button type="submit" class="btn btn-primary">Schedule</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Profile Management -->
        <div class="col-md-12">
            <h3>Profile Management</h3>
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" value="John Doe">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" value="john.doe@example.com">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password">
                        </div>
                        <div class="form-group">
                            <label for="profilePicture">Profile Picture</label>
                            <input type="file" class="form-control" id="profilePicture">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Contact and FAQs -->
        <div class="col-md-12">
            <h3>Contact & FAQs</h3>
            <div class="card">
                <div class="card-body">
                    <h4>Contact Us</h4>
                    <p>Email: support@clinic.com</p>
                    <p>Phone: +123 456 7890</p>
                    <h4>FAQs</h4>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Q:</strong> How do I schedule an appointment? <br>
                            <strong>A:</strong> Use the form above to select a specialty, doctor, date, and time.
                        </li>
                        <!-- Add more FAQs as needed -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<!-- jquery Min JS -->
<script src="../../asset/js/jquery.min.js"></script>
		<!-- jquery Migrate JS -->
		<script src="../../asset/js/jquery-migrate-3.0.0.js"></script>
		<!-- jquery Ui JS -->
		<script src="../../asset/js/jquery-ui.min.js"></script>
		<!-- Easing JS -->
		<script src="../../asset/js/easing.js"></script>
		<!-- Color JS -->
		<script src="../../asset/js/colors.js"></script>
		<!-- Popper JS -->
		<script src="../../asset/js/popper.min.js"></script>
		<!-- Bootstrap Datepicker JS -->
		<script src="../../asset/js/bootstrap-datepicker.js"></script>
		<!-- Jquery Nav JS -->
		<script src="../../asset/js/jquery.nav.js"></script>
		<!-- Slicknav JS -->
		<script src="../../asset/js/slicknav.min.js"></script>
		<!-- ScrollUp JS -->
		<script src="../../asset/js/jquery.scrollUp.min.js"></script>
		<!-- Niceselect JS -->
		<script src="../../asset/js/niceselect.js"></script>
		<!-- Tilt Jquery JS -->
		<script src="../../asset/js/tilt.jquery.min.js"></script>
		<!-- Owl Carousel JS -->
		<script src="../../asset/js/owl-carousel.js"></script>
		<!-- counterup JS -->
		<script src="../../asset/js/jquery.counterup.min.js"></script>
		<!-- Steller JS -->
		<script src="../../asset/js/steller.js"></script>
		<!-- Wow JS -->
		<script src="../../asset/js/wow.min.js"></script>
		<!-- Magnific Popup JS -->
		<script src="../../asset/js/jquery.magnific-popup.min.js"></script>
		<!-- Counter Up CDN JS -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="../../asset/js/bootstrap.min.js"></script>
		<!-- Main JS -->
		<script src="../../asset/js/main.js"></script>

<?php //include '../common/footer.php'; ?>
<!-- Login Form -->
