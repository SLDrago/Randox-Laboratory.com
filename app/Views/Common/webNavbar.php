<?php
session_start();
//use Classes\DbConnector;
//use Classes\UserAccount;
//require_once 'vendor/autoload.php';
//use PDO;
//
//$db = new DbConnector();
//$conn = $db->getConnection();
?>
<header>
        <a href="#" class="brand"> <img src="../../../assets/images/logo/logo.png" alt="Logo" width="250px" height="70px"></a>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <div class="menu-btn">
            
        </div>
        <div class="navigation">
            <div class="navigation-items">
              
                <a href="#" class="nav-link"><b>Home</b></a>
                <a href="#" class="nav-link"><b>How to prepare</b></a>
                <a href="#" class="nav-link"><b>Appointment</b></a>
                <a href="#" class="nav-link"><b>Download</b></a>
                <a href="#" class="nav-link"><b>Contact us</b></a>
             <?php
//                if(!isset($_SESSION['AUTH_TOKEN'])){
             ?>
                    <a href="User_Login.php" ><button><b>Login</button></b></a>
            <?php
//                }else{
//                    $authToken = $_SESSION['AUTH_TOKEN'];
//
//                    $con = mysqli_connect("localhost", "root", "", "");
//
//                    //Check the connection
//                    if($con->connect_error){
//                        die("connection failed" .$con->connect_error);
//                    }
//                    $query = "SELECT * FROM customer WHERE auth_token = ?;";
//                    $stmt = $conn->prepare($query);
//                    $stmt->bindParam(1, $authToken);
//
//                    if($result->num_rows > 0){
//                        while($row = $result->fetch_assoc()){
//                            // Output the data or do something with it
//                            echo "id:" .$row["id"] . "Name:". $row["name"]. "<br>";
//
//          ?>

                    <div class="dropdown">
                        <button class="dropbtn" onclick="myFunction()">More
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content" id="myDropdown">
                            <a href="#">Edit Profile</a>
                            <a href="#">Download</a>
                            <a href="#">Log out</a>
                        </div>
                    </div>


                <script>
                    /* When the user clicks on the button,
                    toggle between hiding and showing the dropdown content */
                    function myFunction() {
                        document.getElementById("myDropdown").classList.toggle("show");
                    }

                    // Close the dropdown if the user clicks outside of it
                    window.onclick = function(e) {
                        if (!e.target.matches('.dropbtn')) {
                            var myDropdown = document.getElementById("myDropdown");
                            if (myDropdown.classList.contains('show')) {
                                myDropdown.classList.remove('show');
                            }
                        }
                    }
                </script>


                <?php
//
//                        }
//                    }else{
//                        echo " No record found";
//                    }
//                    $con->close();
//                }
                ?>

          

            </div>
        </div>
    </header>
