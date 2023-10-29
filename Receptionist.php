<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RECEPTIONIST</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="receptionist.css" type="text/css" rel="stylesheet">

</head>

<body>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>


<div class="container-fluid">
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <img class="navbar-logo" src="assets/images/logo/logo.png" style="border: 3px solid black;border-radius:5px">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" class="nav1">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="Receptionist.php"><b>HOME</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="receptionist_appointment.php"><b>APPOINTMENTS</b></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <b>TESTS</b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="pricing.php"><b>PRICING</b></a></li>
                            <li>
                            <li><a class="dropdown-item" href="prepare.php"><b>HOW TO PREPARE</b></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="receptionist_login.php"><b>REPORTS</b></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="receptionist_payment.php"><b>PAYMENTS</b></a>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <b>LOGIN</b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><b>PROFILE</b></a></li>
                            <li>
                            <li><a class="dropdown-item" href="#"><b>ADMINISTRATION</b></a></li>
                            <li>
                            <li><a class="dropdown-item" href="#"><b>LOG OUT</b></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        </ul>
                    </li>


                </ul>
            </div>
        </nav>
    </div>
</div>


<br><br><br>
<h2 style="margin-left: 10px;"><b>Welcome Randox Laboratory!</b></h2>
<br><br><br>

<div class="container">
    <div class="reports">
        <div class="reports-search">
            <h2 class="header" style="background-color:tomato;">Search Reports</h2><br>
            <label for="Appointment" style="float: right;margin-right: 110px;">Please Enter Report
                ID:</label><br><br>
            <button class="btn btn-outline-success" type="submit"
                    style="float: right; padding-left: 5px;">Search</button>
            <input class="form-control me-2" type="search" placeholder="Search using Report ID" aria-label="Search"
                   style="float: right; width: auto;">
        </div>
    </div>
</div>

<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>





<div class="dashboard">
    <div class="header">
        <h1>Dashboard</h1>
    </div>
    <div class="content">
        <div class="card">
            <h2>Upcoming Appointments</h2>
            <ul>
                <li>Appointment 1 - Date: 10/25/2023</li>
                <li>Appointment 2 - Date: 11/02/2023</li>
                <li>Appointment 3 - Date: 11/15/2023</li>
            </ul>
        </div>
        <div class="card">
            <h2>Recent Activity</h2>
            <ul>
                <li>Action 1 - Date: 10/18/2023</li>
                <li>Action 2 - Date: 10/22/2023</li>
                <li>Action 3 - Date: 10/28/2023</li>
            </ul>
        </div>

    </div>
</div>

<br><br>
<div>
    <div class="container-appointment">
        <div class="form-container">
            <h2 style="background-color: blueviolet;" class="header"><b>Create Appointment</b></h2>

            <br><br>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="patientName">Patient Name</label>
                    <input type="text" id="patientName" name="patientName" required>
                </div>
                <div class="form-group">
                    <label for="AGE">Age</label>
                    <input type="text" id="patientAge" name="patientAge" required>
                </div>
                <div class="form-group">
                    <label for="patientName">Address</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="nic">NIC</label>
                    <input type="text" id="NIC" name="NIC" required>
                </div>
                <div class="form-group">
                    <label for="phone_no">Contact No</label>
                    <input type="text" id="contact" name="contact" required>
                </div>
                <div class="form-group">
                    <label for="appointmentDate">Date</label>
                    <input type="date" id="appointmentDate" name="appointmentDate" required>
                </div>
                <div class="form-group">
                    <label for="appointmentTime">Time</label>
                    <input type="time" id="appointmentTime" name="appointmentTime" required>
                </div>
                <div class="form-group">
                    <button type="reset" class="btn btn-secondary" style="margin-left: 10px;">Cancel
                        Appointment</button>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Schedule Appointment</button>
                    <!--  <button type="submit">Schedule Appointment</button> -->
                </div>

            </form>
        </div>
        <!--     <div class="list-container">
        <h2>Upcoming Appointments</h2>
        <ul class="appointment-list">
            <li>
                <span class="patient-name">John Doe</span>
                <span class="appointment-date">10/25/2023</span>
                <span class="appointment-time">10:00 AM</span>
                <button class="edit-appointment">Edit</button>
                <button class="cancel-appointment">Cancel</button>
            </li>
            <li>
                <span class="patient-name">Jane Smith</span>
                <span class="appointment-date">11/02/2023</span>
                <span class="appointment-time">02:30 PM</span>
                <button class="edit-appointment">Edit</button>
                <button class="cancel-appointment">Cancel</button>
            </li>

        </ul>
    </div>-->
    </div>
</div>

<br><br>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>


</body>

</html>