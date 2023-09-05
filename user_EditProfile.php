<?php

use Classes\DbConnector;
use Classes\UserAccount;

$authToken = '';

session_start();

if(!isset($_SESSION['AUTH_TOKEN'])){
    header("location: user_login.php");
    die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>
    <link rel="stylesheet" href="assets/css/user_webNavbar_style.css">
    <link rel="stylesheet" href="assets/css/user_Editprofile_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<?php
include 'Common/webHeader.php';
?>
<?php
$db = new DbConnector();
$conn = $db->getConnection();
$user = new UserAccount();
$userData = $user->getCustomerDataByAuthToken($conn,$authToken);
if($_SERVER['REQUEST_METHOD']=='post')
{
    if(isset($_POST['picture']))
    {
        $profilepic = $_POST['fileImg'];
        if($user->saveProfilePic($conn,$authToken,"customer",$userData->getUsername(),$userData->getProfilePic(),$profilepic,"storage/User_profile_pic")){
            header("location: userEditProfile.php?msg=Upload Successful!");
            die();
        }else{
            header("location: userEditProfile.php?msg=Upload Failed!");
            die();
        }
    }
    if(isset($_POST['edit'])){
        $name = $_POST['fname'].' '.$_POST['lname'];
        $bd = $_POST['bd'];
        $email = $_POST['email'];
        $pnumber = $_POST['phone'];
        if(isset($_POST['newPW']) && isset($_POST['confirmPW']) ){
            if($_POST['newPW'] == $_POST['confirmPW']){
                $password = $_POST['newPW'];
                $hashedpassword = password_hash($password, PASSWORD_BCRYPT);
            }else{
                header("location: userEditProfile.php?msg=Password Doesnt Match!");
                die();
            }
        }else{
            $hashedpassword = null;
        }
        if($user->updateUser($conn, $name, $bd, $email, $pnumber,$hashedpassword,$authToken)){
            header("location: userEditProfile.php?msg=Data Saved Successful!");
            die();
        }else{
            header("location: userEditProfile.php?msg=Something Wrong!");
            die();
        }
    }
}
?>
<div class="card">
<img src="assets/images/Profile/editProfileImg.png" alt="img">
</div>
<section class="container">
    <header>Account Data</header>
        <section class="upload">
            <form class="form" id="form" action="" enctype="multipart/form-data" method="post">
                <input type="hidden" name="id" value="">
                <div class="upload">
                    <img src="storage/User_profile_pic/default_profile.png<?php /*echo $userData->getProfilePic(); */?>" id="image" alt="image">

                    <div class="rightRound" id="upload">
                        <input type="file" name="fileImg" id="fileImg" accept=".jpg, .jpeg, .png">
                        <i class="fa fa-camera"></i>
                    </div>

                    <div class="leftRound" id="cancel" style="display: none;">
                        <i class="fa fa-times"></i>
                    </div>
                    <div class="rightRound" id="confirm" style="display: none;">
                        <input type="submit" name="picture">
                        <i class="fa fa-check"></i>
                    </div>
                </div>
            </form>
        </section>
    <form action="" class="form">
        <div class="input-box">
            <label for="fname">First Name</label>
            <input type="text" placeholder="Enter first name" id="fname" name="fname" required />
        </div>

        <div class="input-box">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" class="form-control" placeholder="Enter last name" name="lname" id="lname" required />
        </div>

        <div class="input-box">
            <label for="email_address">Email Address</label>
            <input type="text" placeholder="Enter email address" id="email_address" name="email" required />
        </div>

        <div class="column">
            <div class="input-box">
                <label for="phone_no">Phone Number</label>
                <input type="text" placeholder="Enter phone number" id="phone_no" name="phone" required />
            </div>
            <div class="input-box">
                <label for="birth_date">Birth Date</label>
                <input type="date" placeholder="Enter birth date" id="birth_date" name="bd" required />
            </div>
        </div>
        <div class="input-box">
            <label for="newPW">Change Password</label>
            <input type="password" placeholder="New Password" id="newPW" name="newPW"/>
        </div>
        <div class="input-box">
            <input type="password" id="confirm" placeholder="Confirm Password" name="confirmPW"/>
        </div>
        <button type="submit" name="edit">Edit Data</button>
    </form>
</section>


<script type="text/javascript">
    document.getElementById("fileImg").onchange = function() {
        document.getElementById("image").src = URL.createObjectURL(fileImg.files[0]); // Preview new image

        document.getElementById("cancel").style.display = "block";
        document.getElementById("confirm").style.display = "block";

        document.getElementById("upload").style.display = "none";
    }

    var userImage = document.getElementById('image').src;
    document.getElementById("cancel").onclick = function() {
        document.getElementById("image").src = userImage; // Back to previous image

        document.getElementById("cancel").style.display = "none";
        document.getElementById("confirm").style.display = "none";

        document.getElementById("upload").style.display = "block";
    }
</script>

</body>

</html>