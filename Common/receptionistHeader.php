<?php

?>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<div class="container-fluid">
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <img class="navbar-logo" alt="randox-laboratory logo" src="assets/images/logo/logo.png" width="350px">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="receptionist_Dashboard.php"><b>HOME</b></a>
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
                            <li><a class="dropdown-item" href="receptionist_Prepare.php"><b>HOW TO PREPARE</b></a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="receptionist_Payment.php"><b>PAYMENTS</b></a>
                    </li>


                    <li class="nav-item dropstart">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <b><?php echo $uname; ?></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="receptionist_EditProfile.php"><b><i class="bi bi-person-lines-fill"></i> &nbsp;PROFILE</b></a></li>
                            <li><a class="dropdown-item" href="Admin.php"><b><i class="bi bi-gear-wide-connected"></i> &nbsp;Staff Account</b></a></li>
                            <li><a class="dropdown-item" href="Admin_ContactUs.php"><b><i class="bi bi-gear-wide-connected"></i> ContactUs</b></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="staff_Logout.php"><b><i class="bi bi-box-arrow-left"></i> &nbsp;LOGOUT</b></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
