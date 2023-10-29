<?php

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APPOINTMENTS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="assets/css/receptionist_appointment.css" type="text/css" rel="stylesheet">

</head>

<body>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>


    <div class="container-fluid" id="navigation">
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

    <body>
        <br><br>

        <div class="container">
            <div class="appointments">
                <h2 class="header">Appointments</h2>
                <br>

                <button class="btn btn-outline-success" type="submit"
                    style="float: right; padding-left: 5px;">Filter</button>

                <div class="form-group" style="float: right;margin-right:5px;border: 1px solid black;">

                    <select id="AppointmentMethod">
                        <option value="">Appointments</option>
                        <option value="tommorow">Tommorrow</option>
                        <option value="today">Today</option>
                        <option value="yesterday">Yesterday</option>
                    </select>
                </div>




                <br><br><br>

                <div class="appointment-list">


                    <table>
                        <thead>
                            <tr>
                                <th>Date & Time</th>
                                <th>Patient Name</th>
                                <th>Appointment Type</th>
                                <th>Appointment ID</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2023-10-25 10:00 AM</td>
                                <td>Kamal Liyanage</td>
                                <td>Online</td>
                                <td>001</td>
                                <td>
                                    <button class="btn btn-success" style="margin-right: 10px;">EDIT</button>
                                    <button class="btn btn-danger">REMOVE</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2023-10-25 11:30 AM</td>
                                <td>Sanath Jayasuriya</td>
                                <td>On Walk</td>
                                <td>002</td>
                                <td>
                                    <button class="btn btn-success" style="margin-right: 10px;">EDIT</button>
                                    <button class="btn btn-danger">REMOVE</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2023-10-25 13:30 AM</td>
                                <td>Amal Shantha</td>
                                <td>On Walk</td>
                                <td>003</td>
                                <td> <button class="btn btn-success" style="margin-right: 10px;">EDIT</button>
                                    <button class="btn btn-danger">REMOVE</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2023-10-25 14:30 AM</td>
                                <td>Kamal Shantha</td>
                                <td>On Call</td>
                                <td>004</td>
                                <td> <button class="btn btn-success" style="margin-right: 10px;">EDIT</button>
                                    <button class="btn btn-danger">REMOVE</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2023-10-25 15:30 AM</td>
                                <td>Angelo Mathews</td>
                                <td>On Walk</td>
                                <td>005</td>
                                <td> <button class="btn btn-success" style="margin-right: 10px;">EDIT</button>
                                    <button class="btn btn-danger">REMOVE</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- <div class="today-appointments">
                <h3>Today's Appointments</h3>
                <ul>
                    <li>Patient 1 - 10:00 AM (Online)</li>
                    <li>Patient 2 - 11:30 AM (On Walk)</li>

                </ul>
            </div>-->
            </div>
        </div>
    </body>

</html>