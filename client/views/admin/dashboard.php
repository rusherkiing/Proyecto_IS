<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .navbar-nav .nav-link {
            color: #fff;
        }
        .card {
            margin-bottom: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2">
                <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                    <div class="navbar-collapse">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">User Management</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Medical Records</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Appointments</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Notifications</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Audit Logs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Settings</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- Main Content -->
            <div class="col-md-10">
                <div class="container mt-4">
                    <h1>Admin Dashboard</h1>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Patients</h5>
                                    <p class="card-text">100</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Doctors</h5>
                                    <p class="card-text">20</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Upcoming Appointments</h5>
                                    <p class="card-text">15</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="mt-4">User Management</h2>
                    <button class="btn btn-primary mb-2">Add User</button>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Doe</td>
                                <td>Doctor</td>
                                <td>john@example.com</td>
                                <td>Active</td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Deactivate</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Jane Smith</td>
                                <td>Patient</td>
                                <td>jane@example.com</td>
                                <td>Inactive</td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-success btn-sm">Reactivate</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <h2 class="mt-4">Medical Records</h2>
                    <input type="text" class="form-control mb-2" placeholder="Search records">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Patient</th>
                                <th>Doctor</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Doe</td>
                                <td>Dr. Smith</td>
                                <td>2023-10-01</td>
                                <td>
                                    <button class="btn btn-info btn-sm">View</button>
                                    <button class="btn btn-primary btn-sm">Generate Report</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <h2 class="mt-4">Notifications</h2>
                    <button class="btn btn-primary mb-2">Send Notification</button>
                    <h2 class="mt-4">Audit Logs</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Action</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Admin</td>
                                <td>Updated user profile</td>
                                <td>2023-10-01</td>
                            </tr>
                        </tbody>
                    </table>
                    <h2 class="mt-4">Settings</h2>
                    <form>
                        <div class="form-group">
                            <label for="clinicHours">Clinic Operating Hours</label>
                            <input type="text" class="form-control" id="clinicHours" placeholder="9 AM - 5 PM">
                        </div>
                        <div class="form-group">
                            <label for="appointmentTypes">Allowed Appointment Types</label>
                            <input type="text" class="form-control" id="appointmentTypes" placeholder="General, Specialist">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Settings</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
</body>
</html>
