<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/user_webNavbar_style.css">
    <link rel="stylesheet" href="assets/css/user_home_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
<?php
include 'Common/webHeader.php';
?>
<section class="home">
    <video class="video-slide active" src="assets/videos/video1.mp4"  autoplay muted loop></video>
    <video class="video-slide" src="assets/videos/video2.mp4"  autoplay muted loop></video>
    <video class="video-slide" src="assets/videos/video3.mp4" autoplay muted loop></video>
    <video class="video-slide" src="assets/videos/video4.mp4" autoplay muted loop></video>
    <video class="video-slide" src="assets/videos/video5.mp4" autoplay muted loop></video>

    <!-- this div class should include content active -->
    <!-- <div class="content active" style="background-image: url('pexels-chokniti.jpg');"> -->
    <div class="content active">

        <h1>Randox<br><span>Laboratories</span></h1>
        <p>
        <h3>Your Health. Our Commitment.</h3><br><br>

        Welcome to Randox Laboratories, your trusted partner in healthcare. Experience precision and care with our
        comprehensive urine tests, full blood reports, and more. Your well-being is our top priority, and we're
        dedicated to providing accurate results, promptly. Discover the essence of reliable diagnostics at Randox
        Laboratories. </p>

        <a href="#">Appoint Now</a>
    </div>
    <div class="content">
        <h1>Randox<br><span>Laboratories</span></h1>
        <p>
        <h3>Your Health. Our Commitment.</h3><br><br>

        Welcome to Randox Laboratories, your trusted partner in healthcare. Experience precision and care with our
        comprehensive urine tests, full blood reports, and more. Your well-being is our top priority, and we're
        dedicated to providing accurate results, promptly. Discover the essence of reliable diagnostics at Randox
        Laboratories. </p>
        <a href="#">Appoint Now</a>
    </div>
    <div class="content">
        <h1>Randox<br><span>Laboratories</span></h1>
        <p>
        <h3>Your Health. Our Commitment.</h3><br><br>

        Welcome to Randox Laboratories, your trusted partner in healthcare. Experience precision and care with our
        comprehensive urine tests, full blood reports, and more. Your well-being is our top priority, and we're
        dedicated to providing accurate results, promptly. Discover the essence of reliable diagnostics at Randox
        Laboratories. </p>
        <a href="#">Appoint Now</a>
    </div>
    <div class="content">
        <h1>Randox<br><span>Laboratories</span></h1>
        <p>
        <h3>Your Health. Our Commitment.</h3><br><br>

        Welcome to Randox Laboratories, your trusted partner in healthcare. Experience precision and care with our
        comprehensive urine tests, full blood reports, and more. Your well-being is our top priority, and we're
        dedicated to providing accurate results, promptly. Discover the essence of reliable diagnostics at Randox
        Laboratories. </p>
        <a href="#">Appoint Now</a>
    </div>
    <div class="content">
        <h1>Randox<br><span>Laboratories</span></h1>
        <p>
        <h3>Your Health. Our Commitment.</h3><br><br>

        Welcome to Randox Laboratories, your trusted partner in healthcare. Experience precision and care with our
        comprehensive urine tests, full blood reports, and more. Your well-being is our top priority, and we're
        dedicated to providing accurate results, promptly. Discover the essence of reliable diagnostics at Randox
        Laboratories. </p>
        <a href="#">Appoint Now</a>
    </div>

    <div class="media-icons">
        <a href="#"><i class="bi bi-facebook"></i></a><br>
        <a href="#"><i class="bi bi-messenger"></i></a><br>
        <a href="#"><i class="bi bi-whatsapp"></i></i></a><br>
        <a href="#"><i class="bi bi-instagram"></i></a><br>
        <a href="#"><i class="bi bi-twitter"></i></a>
    </div>
    <div class="slider-navigation">
        <div class="nav-btn active"></div>
        <div class="nav-btn "></div>
        <div class="nav-btn"></div>
        <div class="nav-btn"></div>
        <div class="nav-btn"></div>
    </div>
</section>
<script type="text/javascript">
    const btns = document.querySelectorAll(".nav-btn");
    const slides = document.querySelectorAll(".video-slide");
    const contents = document.querySelectorAll(".content");

    let currentSlide = 0;
    let slideInterval;

    // Function to show the current slide
    const showSlide = () => {
        // Reset all slides and buttons
        slides.forEach((slide) => {
            slide.classList.remove("active");
        });
        btns.forEach((btn) => {
            btn.classList.remove("active");
        });
        contents.forEach((content) => {
            content.classList.remove("active");
        });

        // Show the current slide and activate the corresponding button and content
        slides[currentSlide].classList.add("active");
        btns[currentSlide].classList.add("active");
        contents[currentSlide].classList.add("active");
    };

    // Function to start the slide interval
    const startSlideInterval = () => {
        slideInterval = setInterval(() => {
            currentSlide = (currentSlide + 1) % slides.length; // Move to the next slide
            showSlide();
        }, 10000); // Change slide every 10 seconds (adjust this value as needed)
    };

    // Function to stop the slide interval
    const stopSlideInterval = () => {
        clearInterval(slideInterval);
    };

    // Event listener for each button
    btns.forEach((btn, i) => {
        btn.addEventListener("click", () => {
            stopSlideInterval(); // Stop the slide interval when a button is clicked
            currentSlide = i; // Set the current slide to the clicked button index
            showSlide();
            startSlideInterval(); // Start the slide interval again
        });
    });

    // Initial setup
    showSlide();
    startSlideInterval();


</script>

</body>
</html>