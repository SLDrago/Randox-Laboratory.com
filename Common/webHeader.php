<?php

require 'vendor/autoload.php';

use Classes\DbConnector;
use Classes\UserAccount;

$db = new DbConnector();
$conn = $db->getConnection();
$user = new UserAccount();


?>
<header>
    <a href="#" class="brand"> <img src="../assets/images/logo/logo.png" alt="Logo" width="250px" height="70px"></a>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="menu-btn">

    </div>
    <div class="navigation">
        <div class="navigation-items">

            <a href="user_home.php" class="nav-link"><b>Home</b></a>
            <a href="#" class="nav-link"><b>How to prepare</b></a>
            <a href="user_Appointment.php" class="nav-link"><b>Appointment</b></a>
            <a href="#" class="nav-link"><b>Download</b></a>
            <a href="#" class="nav-link"><b>Contact us</b></a>
            <?php
            if (!isset($_SESSION['AUTH_TOKEN'])) {
                ?>
                <a href="User_Login.php">
                    <button><b>Login</button>
                    </b></a>
            <?php
            }else{
            $authToken = $_SESSION['AUTH_TOKEN'];
            $data = new UserAccount();
            $data = $user->getCustomerDataByAuthToken($conn,$authToken);
            ?>

                <div class="dropdown">
                    <button class="dropbtn" onclick="myFunction()"><?php echo $data->getUsername(); ?>
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content" id="myDropdown">
                        <a href="user_EditProfile.php">Edit Profile</a>
                        <a href="user_Download.php">Download</a>
                        <a href="user_Logout.php">Log out</a>
                    </div>
                </div>


                <script>
                    /* When the user clicks on the button,
                    toggle between hiding and showing the dropdown content */
                    function myFunction() {
                        document.getElementById("myDropdown").classList.toggle("show");
                    }

                    // Close the dropdown if the user clicks outside of it
                    window.onclick = function (e) {
                        if (!e.target.matches('.dropbtn')) {
                            var myDropdown = document.getElementById("myDropdown");
                            if (myDropdown.classList.contains('show')) {
                                myDropdown.classList.remove('show');
                            }
                        }
                    }
                </script>


            <?php
            }
            ?>


        </div>
    </div>
</header>
