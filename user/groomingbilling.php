<?php include 'config.php'; ?>

<?php
// Check if the date, time, and gid parameters are provided in the URL
if (isset($_GET['date']) && isset($_GET['time']) && isset($_GET['gid'])) {
    // Retrieve the date, time, gid, and email from URL parameters
    $date = $_GET['date'];
    $time = $_GET['time'];
    $gid = $_GET['gid'];
    $email = $_GET['email'];

    // You can add more details and customize your billing logic here
    // For example, calculate the amount based on the selected date and time
    $booking_fee = 50; // Replace with your fee calculation logic

    // Display the billing details
    $billing_details = "<p>Grooming Date: $date</p>";
    $billing_details .= "<p>Time Slot: $time</p>";
    $billing_details .= "<p>Booking Fee: $booking_fee</p>";
} else {
    $billing_details = "<p>Date, time, and GID are not provided.</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Grooming Billing</title>
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
        <h2>Grooming Billing</h2>
        <?php echo $billing_details; ?>
        
        <!-- Confirm Payment Button -->
        <form action="" method="post">
            <input type="hidden" name="booking_fee" value="<?php echo $booking_fee; ?>">
            <input type="submit" value="Confirm Payment" class="confirm-payment-button">
        </form>
    </div>
    <?php
    if (!empty($_POST)) {
        $payment_date = date('Y-m-d');
        $sql = "INSERT INTO `paymentgrooming`(`GPayment_date`, `GPrice`, `Grooming_Bid`) VALUES ('$payment_date','$booking_fee','$gid')";
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        if ($res == TRUE) {
            $sql1 = "UPDATE `groomingbooking` SET `Booking_status`='COMPLETED' WHERE `Grooming_Bid` = $gid";
            $res1 = mysqli_query($conn, $sql1) or die(mysqli_error());
            $_SESSION['paid'] = "Payment Successful";
            header("Location: http://localhost/project/user/user-portal.php?email=$email");
        }
    }
    ?>

    <!-- Add additional HTML or links here as needed -->
</body>
</html>
