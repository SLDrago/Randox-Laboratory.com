<?php
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PAYMENTS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="assets/css/receptionist_payment.css" type="text/css" rel="stylesheet">

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
                        <a class="nav-link" aria-current="page" href="Receptionist_Dashboard.php"><b>HOME</b></a>
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
                            <li><a class="dropdown-item" href="Receptionist_pricing.php"><b>PRICING</b></a></li>
                            <li>
                            <li><a class="dropdown-item" href="Receptionist_prepare.php"><b>HOW TO PREPARE</b></a></li>
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

                    <!--      <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>-->

                </ul>
            </div>
        </nav>
    </div>
</div>

<br><br>
<div class="container">
    <div class="payments">
        <div class="payment-entry-form">
            <h2 class="header">Payment Entry Form</h2>
            <br><br>
            <form>
                <label for="Appointment" style="float: right;margin-right: 60px;">Please Enter Appointment
                    No:</label><br><br>
                <button class="btn btn-outline-success" type="submit"
                        style="float: right; padding-left: 5px;">Search</button>
                <input class="form-control me-2" type="search" placeholder="" aria-label="Search"
                       style="float: right; width: auto;">
                <br><br>
                <div class="form-group">
                    <label for="patientName">Patient Name</label>
                    <input type="text" id="patientName" placeholder="Enter patient's name">
                </div>
                <div class="form-group">
                    <label for="phone_no">Contact No</label>
                    <input type="text" id="contact" placeholder="Enter contact number" name="contact" required>
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
                    <label for="TestMethod">Test Type</label>
                    <select id="TestMethod">
                        <option value=""> </option>
                        <option value="blood">Blood Report</option>
                        <option value="lipid">Lipid Profile</option>
                        <option value="urine">Urine Report</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="paymentMethod">Payment Method</label>
                    <select id="paymentMethod">
                        <option value="credit"></option>
                        <option value="credit">Credit Card</option>
                        <option value="cash">Cash</option>
                        <option value="online">Online Payment</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="paymentAmount">Payment Amount</label>
                    <input type="number" id="paymentAmount" placeholder="Enter payment amount">
                </div>

                <button type="reset" class="btn btn-secondary" style="margin-left: 10px;float: right;">Cancel
                    Payment</button>
                <button type="submit" class="btn btn-primary" style="float: right;">Submit Payment</button>
            </form>
        </div>
        <!--      <div class="payment-history">
            <h2>Payment History</h2>
            <div class="search">
                <input type="text" id="paymentSearch" placeholder="Search payments">
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Patient Name</th>
                        <th>Payment Method</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2023-10-25</td>
                        <td>Patient 1</td>
                        <td>Credit Card</td>
                        <td>$100</td>
                    </tr>
                    <tr>
                        <td>2023-10-24</td>
                        <td>Patient 2</td>
                        <td>Cash</td>
                        <td>$50</td>
                    </tr>

                </tbody>
            </table>
        </div>-->
    </div>
</div>
</body>

</html>
