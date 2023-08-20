<?php
include 'app/Config/priceList.php';
include 'app/Config/dbh.php';
$reportTypes = fetchReportTypesFromDatabase();

use Models\UserAccount;
use Models\Appointment;
require_once 'vendor/autoload.php';

if (isset($_POST['pay']) && isset($conn)){
    if ($_POST['fname'] != '' && $_POST['bd'] != '' && $_POST['pnumber'] != '' && $_POST['appointDate'] != '' && $_POST['timeslot'] != ''){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $nic = $_POST['nic'];
    $bd = $_POST['bd'];
    $pnumber = $_POST['pnumber'];
    $email = $_POST['email'];
    $reporttype= $_POST['reporttype'];
    $date = $_POST['appointDate'];
    $timeslot = $_POST['timeslot'];
    $name = $fname." ".$lname;

        $report = "";
        $amount = 0;

        foreach ($reportTypes as $reportTypeData) {
            if ($reportTypeData['id'] == $reporttype) {
                $report = $reportTypeData['name'];
                $amount = $reportTypeData['price'];
                break;
            }
        }

        if (empty($report)) {
            header("location: user_Appointment.php?msg=Some data are missing...");
            exit();
        }

    switch ($timeslot){
        case 1:
            $timePeriod = "8.00 A.M - 10.00 A.M";
            break;
        case 2:
            $timePeriod = "10.00 A.M - 12.00 P.M";
            break;
        case 3:
            $timePeriod = "1.00 P.M - 3.00 P.M";
            break;
        default:
            header("location: user_Appointment.php?msg=Some data are missing...");
            exit();
    }

    $appointment = new Appointment($conn);

    $merchant_id = "1223771";
    $order_id = $appointment->getUniqueAppointmentID();
    $currency = "LKR";
    $merchant_secret="MzM4ODU2MTU0NDY3MTQyNDE5MjI4NDAzNDM0MDkyODI0NzMyODUw";

    $hash = strtoupper(
        md5(
            $merchant_id .
            $order_id .
            number_format($amount, 2, '.', '') .
            $currency .
            strtoupper(md5($merchant_secret))
        )
    );

    $obj = new UserAccount($fname);
    $uname = $obj->createUserName();
    $password  = $obj->createPW();
        $options = [
            'cost' => 12,
        ];
    $hashedpassword = password_hash($password, PASSWORD_BCRYPT, $options);

    $check = "SELECT * FROM customer WHERE customer_pnumber = ?";
        $stmt = $conn->prepare($check);
        $stmt->bind_param('s', $pnumber);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $query = "UPDATE customer SET customer_name = ?,customer_bd = ?,customer_nic = ?,customer_pnumber = ?, username = ?, password = ? WHERE customer_pnumber = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('sssssss', $name, $bd, $nic, $pnumber, $uname, $hashedpassword, $pnumber);
            $stmt->execute();
        }else{
            $query = "INSERT INTO customer (customer_name,customer_bd,customer_nic,customer_pnumber,customer_email,username,password) VALUES (?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('sssssss', $name, $bd, $nic, $pnumber, $email, $uname, $hashedpassword);
            $stmt->execute();
        }

        $currentDateTime = new DateTime('now');
        $currentDate = $currentDateTime->format('Y-m-d');
        date_default_timezone_set("Asia/Colombo");
        $currentTime = date("H:i:s");

        $customerquery = "SELECT * FROM customer WHERE customer_pnumber = ?";
        $stmt = $conn->prepare($customerquery);
        $stmt->bind_param('s', $pnumber);
        $stmt->execute();
        $customerquery_run = $stmt->get_result();
        if ($customerquery_run) {
            foreach ($customerquery_run as $row) {
                $customerId = $row['customer_id'];
                $check = "SELECT * FROM payment WHERE appointment_id = ?";
                $stmt = $conn->prepare($check);
                $stmt->bind_param('s', $order_id);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows === 0) {
                    $query = "INSERT INTO payment (customer_id,appointment_id,payment_date,payment_time,payment_amount) VALUES (?,?,?,?,?)";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param('sssss', $customerId, $order_id, $currentDate, $currentTime, $amount);
                    $stmt->execute();
                }
            }
        }

        $customerquery = "SELECT * FROM customer WHERE customer_pnumber = ?";
        $stmt = $conn->prepare($customerquery);
        $stmt->bind_param('s', $pnumber);
        $stmt->execute();
        $customerquery_run = $stmt->get_result();
        if ($customerquery_run) {
            foreach ($customerquery_run as $row) {
                $customerId = $row['customer_id'];
                $paymentquery = "SELECT * FROM payment WHERE appointment_id = ?";
                $stmt = $conn->prepare($paymentquery);
                $stmt->bind_param('s', $order_id);
                $stmt->execute();
                $paymentquery_run = $stmt->get_result();
                if ($paymentquery_run) {
                    foreach ($paymentquery_run as $data) {
                        $paymentId = $data['payment_id'];
                        $query = "INSERT INTO appointment (appointment_id,payment_id,customer_id,report_type,appinment_date,appointment_time) VALUES (?,?,?,?,?,?)";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param('siiisi', $order_id, $paymentId, $customerId, $reporttype, $date, $timeslot);
                        $stmt->execute();
                    }
                }
            }
        }


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/appointment_style.css">
    <title>Payment</title>
</head>
<body>
<section class="appointment" id="appointment">

    <div class="row">

        <div class="image">
            <img src="/assets/images/appointment/appointment-img.svg" alt="">
        </div>


            <form method="post" action="https://sandbox.payhere.lk/pay/checkout">
                <div class="container">
                    <h3>Appointment Summery</h3>
                    <table>
                        <tr>
                            <td class="btn-left mx-auto p-2"><b>Name:</b></td>
                            <td class="btn-left"><?php echo $name; ?></td>
                        </tr>
                        <tr>
                            <td class="btn-left mx-auto p-2"><b>N.I.C:</b></td>
                            <td class="btn-left"><?php echo $nic; ?></td>
                        </tr>
                        <tr>
                            <td class="btn-left mx-auto p-2"><b>Birthday:</b></td>
                            <td class="btn-left"><?php echo $bd; ?></td>
                        </tr>
                        <tr>
                            <td class="btn-left mx-auto p-2"><b>Phone Number:</b></td>
                            <td class="btn-left"><?php echo $pnumber; ?></td>
                        </tr>
                        <tr>
                            <td class="btn-left mx-auto p-2"><b>Email:</b></td>
                            <td class="btn-left"><?php echo $email; ?></td>
                        </tr>
                        <tr>
                            <td class="btn-left mx-auto p-2"><b>Report Type:</b></td>
                            <td class="btn-left"><?php echo $report; ?></td>
                        </tr>
                        <tr>
                            <td class="btn-left mx-auto p-2"><b>Appointment Date:</b></td>
                            <td class="btn-left"><?php echo $date; ?></td>
                        </tr>
                        <tr>
                            <td class="btn-left mx-auto p-2"><b>Time Slot:</b></td>
                            <td class="btn-left"><?php echo $timePeriod; ?></td>
                        </tr>
                        <tr>
                            <td class="btn-left mx-auto p-2"><b>Appointment ID:</b></td>
                            <td class="btn-left"><?php echo $order_id; ?></td>
                        </tr>
                        <tr>
                            <td class="btn-left mx-auto p-2"><b>Bill Value:</b></td>
                            <td class="btn-left">Rs.<?php echo number_format((float)$amount, 2, '.', ''); ?>/=</td>
                        </tr>
                    </table>
                </div>
                <input type="hidden" name="merchant_id" value="<?php echo $merchant_id; ?>">
                <input type="hidden" name="return_url" value="http://localhost:8080/Randox-Laboratory.com/user_AppointmentPay.php">
                <input type="hidden" name="cancel_url" value="http://localhost:8080/Randox-Laboratory.com/user_AppointmentPay.php">
                <input type="hidden" name="notify_url" value="http://localhost:8080/Randox-Laboratory.com/success.php">
                <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                <input type="hidden" name="items" value="<?php echo $reporttype; ?>">
                <input type="hidden" name="currency" value="LKR">
                <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                <input type="hidden" name="first_name" value="<?php echo $fname; ?>">
                <input type="hidden" name="last_name" value="<?php echo $lname; ?>">
                <input type="hidden" name="email" value="<?php echo $email; ?>">
                <input type="hidden" name="phone" value="<?php echo $pnumber; ?>">
                <input type="hidden" name="address" value="">
                <input type="hidden" name="city" value="">
                <input type="hidden" name="country" value="Sri Lanka">
                <input type="hidden" name="hash" value="<?php echo $hash; ?>">    <!-- Replace with generated hash -->
                <input type="submit" value="Pay Now" class="btn-red btn-proceed" onclick="sendEmail()">
            </form>
        </div>

</section>

<script>
    function sendEmail() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                // Handle the response from the server if needed
                console.log(this.responseText);
            }
        };
        xhttp.open("GET", "send_email.php?email=<?php echo $email; ?>&uname=<?php echo $uname; ?>&password=<?php echo $password; ?>&appointmentID=<?php echo $order_id; ?>", true);
        xhttp.send();
    }
</script>

</body>
</html>
<?php
}else{
        header("location: user_Appointment.php?msg=Some data are missing...");
        exit();
    }
}

if (isset($_GET['order_id'])){
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/appointment_style.css">
        <title>Payment Done!</title>
    </head>
    <body>
    <div>
        <form>
        <p>Your Payment is Processed! If Payment is completed successfully You will receive a SMS and Email.</p>
        <p>Order ID: <?php echo $_GET['order_id']; ?></p>
        </form>
    </div>
    </body>
    </html>

<?php
}
?>