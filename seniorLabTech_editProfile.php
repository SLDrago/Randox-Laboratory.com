<?php
?>

<?php

if (isset($_POST['EditProfile'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['newPW'];
    $confPassword = $_POST['confirmPW'];


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receptionist | EditProfile</title>
    <link rel="stylesheet" href="assets/css/assistantLabtec_editProfile_Style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<div class="card">
    <img src="assets/images/Profile/receptionistEditProfile.jpg" alt="img">
</div>
<section class="container">
    <header>Lab Technician Edit Profile</header>
    <form action="" class="form" method="post" id="">

        <div class="input-box">
            <label for="name">Name</label>
            <input type="text" placeholder="Enter name" id="name" name="name" value="" required />
        </div>
        <div class="input-box">
            <label for="email_address">Email Address</label>
            <input type="text" placeholder="Enter email address" id="email_address" name="email" value=""  required />
        </div>

        <div class="input-box">
            <label for="newPW">Change Password</label>
            <input type="password" placeholder="New Password" id="newPW" name="newPW"/>
        </div>
        <div class="input-box">
            <input type="password" id="confirm" placeholder="Confirm Password" name="confirmPW"/>
        </div>
        <input name="edit" type="submit" value="EditProfile" id="edit">
    </form>
</section>

</body>

</html>

