<?php
include 'config.php';

// Define a fixed invoice number and use the current date
$invoice_number = 'INV' . mt_rand(10000, 99999);
$invoice_date = date('Y-m-d');

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values from the form
    $billing_details = $_POST["billing_details"];
    $name = $_POST["name"];
    $bemail = $_POST["bemail"];
    $address = $_POST["address"];
    $cnum = $_POST["cnum"];
    $booking_fee = $_POST["booking_fee"];
    $gid = $_POST["gid"];
    $email = $_POST["email"];

    // You can now use these variables for further processing, such as database operations
    // Make sure to sanitize and validate the data before using it in SQL queries

    // For example, to insert data into the database
    $payment_date = date('Y-m-d');
    $sql = "INSERT INTO `paymentgrooming`(`GPayment_date`, `GPrice`, `Grooming_Bid`) VALUES ('$payment_date','$booking_fee','$gid')";
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    if ($res == TRUE) {
        $sql1 = "UPDATE `groomingbooking` SET `Booking_status`='COMPLETED' WHERE `Grooming_Bid` = $gid";
        $res1 = mysqli_query($conn, $sql1) or die(mysqli_error());
        $_SESSION['paid'] = "Payment Successful";
    }
} else {
    // Handle the case where the form hasn't been submitted
    echo "Form not submitted.";
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>
<body>
    <div class="invoice">
        <div class="invoice-header">
            <h1>Invoice</h1>
        </div>
        <div class="invoice-details">
            <p><strong>Invoice Number:</strong> <?php echo $invoice_number; ?></p>
            <p><strong>Invoice Date:</strong> <?php echo $invoice_date; ?></p>
            <p><strong>Due Date:</strong> 2023-10-10</p>
        </div>
        Name: <?php echo $name; ?><br><br>
        Email: <?php echo $bemail; ?><br><br>
        Credit Card Number: <?php echo $cnum; ?><br>
        <?php echo $billing_details; ?>
        <div class="invoice-footer">
            <p><strong>Payment Instructions:</strong> Please make payment by the due date.</p>
        </div>
        <div class="print-button">
            <button onclick="window.print()">Print Invoice</button>
            <a href="http://localhost/project/user/user-portal.php?email=<?php echo $email; ?>" class="btn-primary" style="text-decoration:none">Go to User Portal</a>
        </div>
    </div>
</body>
</html>
