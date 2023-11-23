<?php

if (isset($_POST['search'])) {
    $appointmentId = $_POST['appointmentId'];

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/assistantLabTech_Dashboard_style.css">

</head>
<body>


<header>
    <a href="#" class="brand"> <img src="assets/images/logo/logo.png" alt="Logo" width="250px" height="70px"></a>

    <div class="menu-btn">

    </div>
    <div class="navigation">
        <div class="navigation-items">

            <a href="#" class="nav-link"><b>Home</b></a>

            <a href="#"><button><b>Login</button></b></a>
        </div>
    </div>
</header>
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="row text-center mt-col-3">
            <h1>Welcome !</h1>
        </div>

        <div class="col-md-8 mt-5" >
            <form action="" method="post">
            <div class="input-group">
                <input type="text" class="form-control" name="appointmentId" placeholder="Enter Appointment Number Here..">
                <div class="input-group-append ms-2">
                    <button class="btn btn-outline-secondary fw-bold" type="button" name="search">Search</button>
                </div>
            </div>
            </form>
        </div>

    </div>
</div>
</body>
</html>

<!---->