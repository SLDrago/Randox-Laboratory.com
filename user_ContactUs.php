<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="stylesheet" href="assets/css/user_webNavbar_style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/user_ContactUs_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Contact Us Form</title>
</head>

<body>
<?php
    include 'Common/webHeader.php';
?>
<div class="container">
<div class="contact-form">
    <h1>Contact Us</h1>
    <div class="form">
        <label>Username :</label>
        <input type="text" name="username" placeholder="Enter Your Username">
    </div>

    <div class="form">
        <label>Email :</label>
        <input type="email" name="email" placeholder="Enter Your Email">
    </div>

    <div class="form">
        <label>Message :</label>
        <textarea></textarea>
    </div>

    <a href="" class="button">Send</a>

</div>
</div>
</body>

</html>