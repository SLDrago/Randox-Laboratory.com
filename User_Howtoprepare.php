<!DOCTYPE html>
<html>
<head>
    <title>How to Prepare</title>
    <link rel="stylesheet" type="text/css" href="user_Howto prepare.css">
    <style>
        body {
            background-image: url("assets/images/Labtechnision/2.jpg");
            background-size: auto;
            background-position: center;
            background-repeat: no-repeat;
            background-color: rgba(173,216,230,0.5); /* Adjust the transparency by changing the last value (0.5) */
        }
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;

        }
        header{
            z-index: 999;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 200px;
            transition: 0.5s ease;

        }
        header .brand{
            color: #fff;
            font-size: 1.5rem;
            font-weight: 700;
            text-transform: uppercase;
            text-decoration: none;

        }

        header .navigation{
            position: relative;

        }

        header .navigation .navigation-items a{
            position: relative;
            color:#000D4D;
            font-size: 1rem;
            font-weight: 500;
            text-decoration: none;
            margin-left: 27px;
            transition: 0.3s ease;

        }

        header .navigation .navigation-items .nav-link:hover {
            background: #ffa500;
            color: white;
            padding: 5px 20px;
            border-radius: 20px;
        }

        header .navigation .navigation-items a button{
            padding: 5px 25px;
            border-radius: 25px;
            background-color: #000D4D;
            border: none;
            color: #fff;
        }

        header .navigation .navigation-items a button:hover{
            background-color: #ffa500;
            padding: 6px 27px;
        }


        header .navigation .navigation-items a::before{
            content: '';
            position: absolute;
            background: #fff;
            width: 0;
            height: 3px;
            bottom: 0;
            left: 0;
            transition: 0.3s ease;
        }
        header.navigation .navigation-items a:hover:before{
            width: 100%;

        }

        .nav-links {
            list-style-type: none;
            margin: 0;
            padding: 0;
            float: right;
        }

        .nav-links li {
            display: inline;
            margin-left: 10px;
        }

        .nav-links li a {
            text-decoration: none;
        }


        .image-section {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding: 25px 30px; /* we can Adjust the top and bottom padding */
            background-color: rgba(255, 255, 255, 0.8); /* Background color for the description */
        }



        .side-image {
            max-width: 43%;
            height: auto;

            padding-block: inherit;
            padding: 30px 100px 30px 200px;
            /* border: 2px solid #000; */
            border-radius: 10px;
        }

        .image-description {
            width: 50%; /* we Adjust the description width as needed */
            padding: 20px 0px 30px 30px;
            border: 2px solid #000;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            justify-content: center;

        }

        .image-description h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .image-description p {
            font-size: 1rem;
        }

    </style>
</head>
<body>
<header>
    <a href="#" class="brand"> <img src="assets/images/logo/logo.png" alt="Logo" width="250px" height="70px"></a>

    <div class="menu-btn">

    </div>
    <div class="navigation">
        <div class="navigation-items">

            <a href="#" class="nav-link"><b>Home</b></a>
            <a href="#" class="nav-link"><b>How to prepare</b></a>
            <a href="#" class="nav-link"><b>Appointment</b></a>
            <a href="#" class="nav-link"><b>Download</b></a>
            <a href="#" class="nav-link"><b>Contact us</b></a>
            <a href="#"><button><b>Login</button></b></a>

        </div>
    </div>
</header>

<hr>
<div class="image-section">


</div>
<div class="image-section">
    <div class="image-description">
        <h2>Full blood Count</h2>
        <p> The Full Blood Count (FBC) test provides essential insights into your blood composition, including red blood cells, white blood cells, and platelets. This test aids in diagnosing conditions like anemia and infections, supporting your overall health assessment.</p>
    </div>
    <img src="assets/images/howtoprepare/image1.jpg" alt="Image Description" class="side-image" onmouseover="imageHover(this,true)" onmouseout="imageHover(this, false)">
</div>
<hr>
<div class="image-section">
    <div class="image-description">
        <h2>Urine Test</h2>
        <p>Our comprehensive urine tests provide valuable insights into your health by analyzing various components present in your urine. These tests can help detect conditions such as urinary tract infections, kidney problems, and metabolic disorders. Trust our accurate urine test results to contribute to your overall well-being.</p>
    </div>
    <img src="assets/images/howtoprepare/image2.jpg" alt="Image Description" class="side-image" onmouseover="imageHover(this, true)" onmouseout="imageHover(this,false)">
</div>
<script>
    function imageHover(image, isHover){
        if(isHover){
            image.style.transform = 'scale(1.05)';
        }
        else{
            image.style.transform = 'scale(1)';
        }
    }
</script>

</body>
</html>
