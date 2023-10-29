<?php
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RECEPTIONIST</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="assets/css/receptionist_Login_style.css" type="text/css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">


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
<br><br><br>

<body>
<!--  <div class="container">

<div class="right">
    <div class="login-box">
        <h2>Receptionist Login</h2>
        <form action="#" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary" style="float: right;">Submit Payment</button>
        </form>
        <div class="forget-password">
            <a href="#">Forgot your password?</a>
        </div>
    </div>
</div>s
</div>-->



<div class="container">
    <div class="left">
        <img src="https://i.pinimg.com/originals/d1/54/66/d154660a6ae3104de2b0a314667a5ab6.png"
             alt="Receptionist Image" width="500px">
    </div>

    <div class="col-md-6">
        <div class="login-box">
            <h2 class="header">Sign in</h2>
            <form action="#" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username <i class="fas fa-user"></i></label>
                    <input type="text" id="username" name="username" class="form-control"
                           placeholder="Enter your username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password <i class="fas fa-lock"></i></label>
                    <input type="password" id="password" name="password" class="form-control"
                           placeholder="Enter your password" required>
                </div>

                <div class="forget-password mt-3">
                    <a href="#">Forgot your password?</a>
                </div>
                <br>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>

        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
