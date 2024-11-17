<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
<body>
    <div class="container">
        <div class="row">
            <!-- Profile Management -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="profile.jpg" alt="Profile Picture" class="profile-img">
                        <h5 class="card-title">Dr. John Doe</h5>
                        <p class="card-text">Specialty: Cardiology</p>
                        <button class="btn btn-primary btn-block">Update Profile</button>
                    </div>
                </div>
            </div>
            <!-- Main Dashboard -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4>Upcoming Appointments</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Time</th>
                                    <th>Purpose</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Jane Smith</td>
                                    <td>10:00 AM</td>
                                    <td>Check-up</td>
                                    <td>
                                        <button class="btn btn-info btn-sm">View</button>
                                        <button class="btn btn-warning btn-sm">Reschedule</button>
                                    </td>
                                </tr>
                                <!-- More rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Schedule Management -->
                <div class="card">
                    <div class="card-header">
                        <h4>Schedule Management</h4>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-success">View Schedule</button>
                        <button class="btn btn-danger">Block Time Slot</button>
                    </div>
                </div>
                <!-- Patient Records -->
                <div class="card">
                    <div class="card-header">
                        <h4>Patient Records</h4>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary">Access Records</button>
                    </div>
                </div>
                <!-- Notifications -->
                <div class="card">
                    <div class="card-header">
                        <h4>Notifications</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">Appointment with Jane Smith rescheduled to 11:00 AM</li>
                            <!-- More notifications as needed -->
                        </ul>
                    </div>
                </div>
                <!-- Analytics and Reports -->
                <div class="card">
                    <div class="card-header">
                        <h4>Analytics and Reports</h4>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-info">View Reports</button>
                    </div>
                </div>
                <!-- Secure Communication -->
                <div class="card">
                    <div class="card-header">
                        <h4>Secure Communication</h4>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-secondary">Send Message</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </body>
</html>