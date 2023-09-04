
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>
    <link rel="stylesheet" href="assets/css/user_Editprofile_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<div class="card">
    <section class="upload">
        <form class="form" id="form" action="" enctype="multipart/form-data" method="post">
            <input type="hidden" name="id" value="">
            <div class="upload">
                <img src="assets/images/Profile/noprofil.jpg" id="image" alt="image">

                <div class="rightRound" id="upload">
                    <input type="file" name="fileImg" id="fileImg" accept=".jpg, .jpeg, .png">
                    <i class="fa fa-camera"></i>
                </div>

                <div class="leftRound" id="cancel" style="display: none;">
                    <i class="fa fa-times"></i>
                </div>
                <div class="rightRound" id="confirm" style="display: none;">
                    <input type="submit">
                    <i class="fa fa-check"></i>
                </div>
            </div>
        </form>
    </section>
</div>
<section class="container">
    <header>Account Data</header>
    <form action="#" class="form">

        <div class="input-box">
            <label for="fname">First Name</label>
            <input type="text" placeholder="Enter first name" id="fname" required />
        </div>

        <div class="input-box">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" class="form-control" name="lname" id="lname" />
        </div>

        <div class="input-box address">
            <label for="address">Address</label>
            <input type="text" placeholder="Enter address" id="address" required />
        </div>

        <div class="input-box">
            <label for="email_address">Email Address</label>
            <input type="text" placeholder="Enter email address" id="email_address" required />
        </div>

        <div class="column">
            <div class="input-box">
                <label for="phone_no">Phone Number</label>
                <input type="number" placeholder="Enter phone number" id="phone_no" required />
            </div>
            <div class="input-box">
                <label for="birth_date">Birth Date</label>
                <input type="date" placeholder="Enter birth date" id="birth_date" required />
            </div>
        </div>

        <button>Edit Data</button>
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