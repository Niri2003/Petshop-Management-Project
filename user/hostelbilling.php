<?php include 'config.php';?>
<?php

// Check if the sdate and edate parameters are provided in the URL
if (isset($_GET['sdate']) && isset($_GET['edate'])) {
    // Retrieve the starting and ending dates from URL parameters
    $sdate = $_GET['sdate'];
    $edate = $_GET['edate'];
    $hid = $_GET['hid'];
    $email = $_GET['email'];
    $start_date_obj = new DateTime($sdate);
    $end_date_obj = new DateTime($edate);
    $interval = $start_date_obj->diff($end_date_obj);
    $num_days = $interval->days;

    $daily_rate = 500; // Replace with your daily rate
    $total_amount = $daily_rate * $num_days;

    // Display the billing details
    $billing_details = "<p>Starting Date: $sdate</p>";
    $billing_details .= "<p>Ending Date: $edate</p>";
    $billing_details .= "<p>Number of Days: $num_days</p>";
    $billing_details .= "<p>Daily Rate: $daily_rate</p>";
    $billing_details .= "<p>Total Amount: $total_amount</p>";
} else {
    $billing_details = "<p>Starting date and ending date are not provided.</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Billing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            color: #007bff;
        }

        p {
            margin: 10px 0;
        }

        .total-price {
            font-weight: bold;
            font-size: 18px;
            margin-top: 20px;
        }

        .return-link {
            text-align: center;
            margin-top: 20px;
        }

        .return-link a {
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 3px;
        }

        .return-link a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Booking Billing</h2>
        <?php echo $billing_details; ?>
        
        <!-- Confirm Payment Button -->
        <form action="" method="post">
            <input type="hidden" name="total_amount" value="<?php echo $total_amount; ?>">
            <input type="submit" value="Confirm Payment" class="confirm-payment-button">
        </form>
    </div>
     <?php
    if (!empty($_POST)) {
        $payment_date = date('Y-m-d');
        $sql = "INSERT INTO `paymenthostel`(`HPayment_date`, `HPrice`, `Hostel_Bid`) VALUES ('$payment_date','$total_amount','$hid')";
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        if ($res == TRUE) {
            $sql1 = "UPDATE `hostelbooking` SET `Booking_status`='COMPLETED' WHERE `Hostel_Bid` = $hid";
            $res1 = mysqli_query($conn, $sql1) or die(mysqli_error());
            $_SESSION['paid'] = "Payment Succesfull";
            header("Location: http://localhost/project/user/user-portal.php?email=$email");

        }
    }
    ?>

    <!-- Add additional HTML or links here as needed -->
</body>

</html>
