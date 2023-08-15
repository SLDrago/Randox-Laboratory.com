<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/appointment_style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <title>Appointment</title>
</head>
<body class="appointment-bg">

<!-- Appointment Section -->
<section class="appointment" id="appointment">

    <h1 class="heading"> <span>appointment</span> now </h1>

    <div class="row">

        <div class="image">
            <img src="/assets/images/appointment/appointment-img.svg" alt="">
        </div>


            <?php
            if (!isset($_POST['next']) || array_key_exists('back', $_POST)){ ?>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <h3>make appointment</h3>
                    <label>Full Name:
                        <input type="text" name="name" placeholder="your name" class="box" value="<?php echo $_POST['name']; ?>"></label>
                    <label>N.I.C:
                        <input type="text" name="nic" placeholder="your NIC" class="box" value="<?php echo $_POST['nic']; ?>"></label>
                    <label>Birthday:
                        <input type="date" name="bd" placeholder="Your Birthday" class="box" value="<?php echo $_POST['bd']; ?>"></label>
                    <label>Phone No:
                        <input type="text" name="number" placeholder="your Phone-number" class="box" value="<?php echo $_POST['pnumber']; ?>"></label>
                    <label>Email:
                    <input type="email" name="email" placeholder="your email" class="box" value="<?php echo $_POST['email']; ?>"></label>
                    <div class="btn-left"><input type="submit" name="next" value="Next" class="btn btn-next"></div>
                </form>
            <?php
            }
            ?>

            <?php
            if (isset($_POST['next'])){
                //capture all data entered previously
                $name = $_POST['name'];
                $nic = $_POST['nic'];
                $bd = $_POST['bd'];
                $pnumber = $_POST['number'];
                $email = $_POST['email'];
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                    <input type="hidden" name="name" value="<?php echo $name; ?>">
                    <input type="hidden" name="nic" value="<?php echo $nic; ?>">
                    <input type="hidden" name="bd" value="<?php echo $bd; ?>">
                    <input type="hidden" name="pnumber" value="<?php echo $pnumber; ?>">
                    <input type="hidden" name="email" value="<?php echo $email; ?>">

                  <label>Report: 
                  <select name="reports" id="report" class="box">
                      <option value="fullblood">Full Blood</option>
                      <option value="whiteblood">White Blood</option>
                      <option value="bloodtyping">Blood typing</option>
                      <option value="urinalysis">Urinalysis</option>
                  </select></label>
                  <p>Price: Rs. 0.00/=</p>
                  <label>Appointment Date:
                      <input type="date" name="appointment" id="date_picker" placeholder="appointment date" class="box"></label>
                  <label>Appointment Time:
                      <select name="timeslot" id="time" class="box">
                          <option>8.00 A.M - 10.00 A.M</option>
                          <option>10.00 A.M - 12.00 P.M</option>
                          <option>1.00 P.M - 3.00 P.M</option>
                  </label>

                  <input type="submit" name="pay" value="Proceed for Payment" class="btn-red btn-proceed">
                  <div class="btn-left"><input type="submit" name="back" value="Back" class="btn btn-back"></div>
                </form>
            <?php
            }
            ?>

    </div>

</section>
<?php
if (array_key_exists('pay', $_POST)){
    echo "Payment Done!";
}
?>
<script type="text/javascript">
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#date_picker').attr('min',today);
</script>
</body>
</html>
