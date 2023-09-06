<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <style>

        body {
            background-color: lightcyan;
        }
        .form-section {
            margin-top: 20px;
        }

        body {
            /* background-image: url('2.jpg');*/
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
            background-color:#95b8f0; /* Fallback background color */
        }
        .container {

            justify-content: center;
            align-items: center;


        }

        .navbar-nav .nav-items .nav-link:hover {
            background: #ffa500;
            color: white;
            padding: 5px 20px;
            border-radius: 20px;
        }
        .header .navigation .navigation-items a button:hover{
            background-color: #ffa500;
            padding: 6px 27px;
        }
        .custom-navbar-bg {
            background-color:#a1bff0;

        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg custom-navbar-bg">
    <div class="container-fluid">
        <img src="../../assets/images/logo/logo.png" alt="Logo">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">How to Prepare</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Appointment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Download</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Hover effect for navigation links */
    .navbar-nav .nav-link:hover {
        background-color: #ffa500;
    }
</style>

<div class="container mt-5 custom-bg-color">
    <div class="row">
        <!-- Left Section - Select Test Type -->
        <div class="col-md-4">
            <div class="form-section">
                <h2>Select Test Type</h2>
                <button class="btn btn-primary" onclick="showUrineTestForm()">Urine Test</button>
                <button class="btn btn-primary" onclick="showFullBloodTestForm()">Full Blood Test</button>
                <button class="btn btn-primary" onclick="showLipidTestForm()">Lipid Test</button>
            </div>
        </div>

        <!-- Right Section - Display and Submit Forms -->
        <div class="col-md-8">
            <div class="form-section" id="formSection">

            </div>
        </div>
    </div>
</div>
<form class="d-flex justify-content-end" role="search">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="max-width: 200px;">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>

<!-- Urine Test Form Template -->
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-box">
                <div id="urineTestForm" class="form-template" style="align-items: center;">
                    <h2>Urine Test</h2>
                    <input type="text" name="fname" placeholder="First Name" class="form-control" required><br>
                    <input type="text" name="lname" placeholder="Last Name" class="form-control" required><br>
                    <input type="text" name="age" placeholder="Age" class="form-control"><br>
                    <input type="text" name="gender" placeholder="Gender" class="form-control"><br>
                    <input type="text" name="fullBloodCount" placeholder="Ketones" class="form-control"><br>
                    <input type="text" name="neutrophilLevel" placeholder="Glucose" class="form-control"><br>
                    <textarea name="healthCondition" placeholder="Health Condition" class="form-control"></textarea><br>
                    <button style="float:right;" class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Full Blood Test Form Template -->
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-box">
                <div id="fullBloodTestForm" class="form-template" style="display: none;">
                    <h2>Full Blood Test </h2><br>
                    <input type="text" name="fname" placeholder="First Name" class="form-control" required><br>
                    <input type="text" name="lname" placeholder="Last Name" class="form-control" required><br>
                    <input type="text" name="age" placeholder="Age" class="form-control"><br>
                    <input type="text" name="gender" placeholder="Gender" class="form-control"><br>
                    <input type="text" name="Red Blood Cell Count (RBC)" placeholder="Red Blood Cell Count (RBC)" class="form-control"><br>
                    <input type="text" name="Hemoglobin (Hb)" placeholder="Hemoglobin (Hb)" class="form-control"><br>
                    <textarea name="healthCondition" placeholder="Health Condition" class="form-control"></textarea><br>
                    <button style="float:right;" class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Lipid Test Form Template -->
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-box">
                <div id="lipidTestForm" class="form-template" style="display: none;">
                    <h2>Lipid profileTest</h2><br>
                    <input type="text" name="fname" placeholder="First Name" class="form-control" required><br>
                    <input type="text" name="lname" placeholder="Last Name" class="form-control" required><br>
                    <input type="text" name="age" placeholder="Age" class="form-control"><br>
                    <input type="text" name="Total Cholesterol" placeholder="Total Cholesterol" class="form-control"><br>
                    <input type="text" name="Low-Density Lipoprotein (LDL) Cholesterol" placeholder="Low-Density Lipoprotein (LDL) Cholesterol" class="form-control"><br>
                    <input type="text" name="High-Density Lipoprotein (HDL) Cholesterol" placeholder="High-Density Lipoprotein (HDL) Cholesterol" class="form-control"><br>
                    <textarea name="healthCondition" placeholder="Health Condition" class="form-control"></textarea><br>
                    <button style="float:right;" class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    function showUrineTestForm() {
        hideAllForms();
        document.getElementById('urineTestForm').style.display = 'block';
    }

    function showFullBloodTestForm() {
        hideAllForms();
        document.getElementById('fullBloodTestForm').style.display = 'block';
    }

    function showLipidTestForm() {
        hideAllForms();
        document.getElementById('lipidTestForm').style.display = 'block';
    }

    function hideAllForms() {
        document.querySelectorAll('.form-template').forEach(function(form) {
            form.style.display = 'none';
        });
    }
</script>

</body>
</html>
