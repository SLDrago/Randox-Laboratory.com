<?php
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Randox-Laboratory | Change Password </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="assets/css/receptionist_Login_style.css" type="text/css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">


</head>

<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

<div class="container">
    <div class="left">
        <img src="assets/images/Login/Reset%20password.png"
             alt="Receptionist Image" width="500px">
    </div>

    <div class="col-md-6">
        <div class="login-box">
            <h2 class="header">Reset Password</h2>

            <br>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="password_new" class="form-label"><i class="fas fa-lock"></i> New Password </label>
                    <input type="text" id="password_new" name="password_new" class="form-control"
                           placeholder="Enter your new password" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label"><i class="fas fa-lock"></i> Confirm Password </label>
                    <input type="password" id="password" name="password" class="form-control"
                           placeholder="Enter your confirm password" required>
                </div>


                <div class="d-grid">
                    <button type="submit" class="btn btn-primary" name="login">Update Password</button>
                </div>
            </form>

        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>


