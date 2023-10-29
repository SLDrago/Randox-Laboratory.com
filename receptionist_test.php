<?php
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PRICING</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="assets/css/receptionist_test_style.css" type="text/css" rel="stylesheet">

</head>

<body>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>


<div class="container-fluid">
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <img class="navbar-logo" src="assets/images/logo/logo.png" width="350px" style="border: 2px solid black;border-radius: 10px">
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
                        <a class="nav-link" href="receptionist_Appointment.php"><b>APPOINTMENTS</b></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <b>TESTS</b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="receptionist_test.php"><b>PRICING</b></a></li>
                            <li>
                            <li><a class="dropdown-item" href="receptionist_Prepare.php"><b>HOW TO PREPARE</b></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="receptionist_Login.php"><b>REPORTS</b></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="receptionist_Payment.php"><b>PAYMENTS</b></a>
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




<div class="container">
    <h1 class="text-center mt-4">Medical Test Pricing</h1>
    <br>
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Full Blood Report</h5>
                    <p class="card-text">Includes complete blood count and more.</p>
                    <h6 class="card-subtitle mb-2 text-muted">Price: Rs.850/=</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Urinalysis</h5>
                    <p class="card-text">Analysis of urine for various medical purposes.</p>
                    <h6 class="card-subtitle mb-2 text-muted">Price: Rs.450/=</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Lipid Profile</h5>
                    <p class="card-text">Analysis of Cholestrol level of human body.</p>
                    <h6 class="card-subtitle mb-2 text-muted">Price: Rs.950/=</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Liver Profile</h5>
                    <p class="card-text">Analysis of SGPT & SGOT Hormone level in Blood.</p>
                    <h6 class="card-subtitle mb-2 text-muted">Price: Rs.1450/=</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">TSH3</h5>
                    <p class="card-text">Analysis of Thyroid level in Blood.</p>
                    <h6 class="card-subtitle mb-2 text-muted">Price: Rs.1550/=</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">ECG</h5>
                    <p class="card-text">Analysis of Heart pulse rate and Basic heart problems.</p>
                    <h6 class="card-subtitle mb-2 text-muted">Price: Rs.550/=</h6>
                </div>
            </div>
        </div>
    </div>
</div>
