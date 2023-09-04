<?php
session_start();

use Classes\{DbConnector, UserAccount};

require_once 'vendor/autoload.php';

include 'app/Config/priceList.php';

$msg = '';

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
}
$db = new DbConnector();
$user = new UserAccount();
$conn = $db->getConnection();
$details = new UserAccount();

if (isset($_SESSION['AUTH_TOKEN'])) {
    $authToken = $_SESSION['AUTH_TOKEN'];
    $details = $user->getCustomerDataByAuthToken($conn, $authToken);
    $name = explode(" ", $details->getCustomerName());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/user_appointment_style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

    <title>Appointment</title>
</head>
<body class="appointment-bg">

<!-- Appointment Section -->
<section class="appointment" id="appointment">

    <h1 class="heading"><span>appointment</span> now </h1>

    <div class="row">

        <div class="image">
            <img src="/assets/images/appointment/appointment-img.svg" alt="">
        </div>
        <?php
        $formStep = $_POST['formStep'] ?? 'step1';

        if (isset($_POST['next'])) {
            $formStep = 'step2';
        } elseif (isset($_POST['back'])) {
            $formStep = 'step1';
        }
        ?>



        <?php if ($formStep === 'step1') { ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <h3>make appointment</h3>
                <div class="msg"><?php echo $msg; ?></div>
                <label>Full Name:
                    <input type="text" name="fname" placeholder="First name" class="box"
                           value="<?php echo $name[0] ?? ''; ?>" required>
                    <input type="text" name="lname" placeholder="Last name" class="box"
                           value="<?php echo $name[1] ?? ''; ?>" required></label>
                <label>N.I.C:
                    <input type="text" name="nic" placeholder="Your NIC" class="box"
                           value="<?php echo $details->getCustomerNIC(); ?>" required></label>
                <label>Birthday:
                    <input type="date" name="bd" placeholder="Your Birthday" class="box"
                           value="<?php echo $details->getCustomerBD(); ?>" required></label>
                <label>Phone No:
                    <input type="text" name="number" placeholder="your Phone-number" class="box"
                           value="<?php echo $details->getCustomerPNumber(); ?>" required></label>
                <label>Email:
                    <input type="email" name="email" placeholder="your email" class="box"
                           value="<?php echo $details->getCustomerEmail(); ?>" required></label>
                <input type="hidden" name="formStep" value="step1">
                <div class="btn-left"><input type="submit" name="next" value="Next" class="btn btn-next"></div>
            </form>
        <?php } ?>

        <?php if ($formStep === 'step2') { ?>
            <form action="user_AppointmentPay.php" method="post">
                <h3>make appointment</h3>
                <div class="msg"><?php echo $msg; ?></div>

                <input type="hidden" name="fname" value="<?php echo $_POST['fname']; ?>">
                <input type="hidden" name="lname" value="<?php echo $_POST['lname']; ?>">
                <input type="hidden" name="nic" value="<?php echo $_POST['nic']; ?>">
                <input type="hidden" name="bd" value="<?php echo $_POST['bd']; ?>">
                <input type="hidden" name="pnumber" value="<?php echo $_POST['number']; ?>">
                <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">

                <label>Report:
                    <select name="reporttype" id="report" class="box" required>
                        <option value="default">Select Report Type</option>
                        <?php
                        $reportTypes = fetchReportTypesFromDatabase(); // Replace with your actual function
                        foreach ($reportTypes as $reportType) {
                            echo "<option value='" . $reportType['id'] . "'>" . $reportType['name'] . "</option>";
                        }
                        ?>
                    </select>
                </label>
                <p>Price: Rs. <span id="price">0.00/=</span></p>
                <label>Appointment Date:
                    <input type="date" name="appointDate" id="date_picker" placeholder="appointment date" class="box"
                           required></label>
                <label>Appointment Time:
                    <select name="timeslot" id="time" class="box" required>
                        <option value="1">8.00 A.M - 10.00 A.M</option>
                        <option value="2">10.00 A.M - 12.00 P.M</option>
                        <option value="3">1.00 P.M - 3.00 P.M</option>
                </label>
                <input type="hidden" name="formStep" value="step2">
                <input type="submit" name="pay" value="Proceed for Payment" class="btn-red btn-proceed">
                <div class="btn-left"><input type="button" id="back-button" name="back" value="Back"
                                             class="btn btn-back"></div>
            </form>
        <?php } ?>
    </div>
</section>


<script type="text/javascript">
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#date_picker').attr('min', today);

    const reportSelect = document.getElementById('report');
    const priceSpan = document.getElementById('price');

    // Define the prices for each report type
    const reportPrices = {
        <?php
        $reportTypes = fetchReportTypesFromDatabase();
        foreach ($reportTypes as $reportType) {
            echo $reportType['id'] . ': ' . $reportType['price'] . ',';
        }
        ?>
    };

    // Add an event listener to the select element
    reportSelect.addEventListener('change', function () {
        const selectedReport = this.value;
        const selectedPrice = reportPrices[selectedReport];

        // Update the price displayed
        priceSpan.textContent = selectedPrice.toFixed(2) + '/=';
    });

    document.addEventListener('DOMContentLoaded', function () {
        const backButton = document.getElementById('back-button');

        if (backButton) {
            backButton.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent the form from submitting
                history.back(); // Simulate browser back button
            });
        }
    });

    // Attach an event listener to the date picker
    document.getElementById("date_picker").addEventListener("change", function () {
        const selectedDate = this.value;

        // Send AJAX request to fetch available time slots
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "get_available_time_slots.php?date=" + selectedDate, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                const timeSlots = JSON.parse(xhr.responseText);
                updateTimeSlotsDropdown(timeSlots);
            }
        };
        xhr.send();
    });

    function updateTimeSlotsDropdown(timeSlots) {
        const timeDropdown = document.getElementById("time");
        timeDropdown.innerHTML = "";

        for (const slot of timeSlots) {
            const option = document.createElement("option");
            option.value = slot.id;
            option.textContent = slot.slotLabel;
            timeDropdown.appendChild(option);
        }
    }
</script>
<noscript>
    <h1>Your browser does not support JavaScript!</h1>
</noscript>
</body>
</html>
