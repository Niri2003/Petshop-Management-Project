<?php
include 'config.php';

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
            background: white;
            max-width: 769px;
            min-height: 287px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 4.5rem 1.5rem;
            margin: 0 auto;
            margin-top: 8px;
            box-shadow: 6px 4px 10px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        .left {
            flex-basis: 50%;
        }

        .right {
            flex-basis: 40%;
        }

        form {
            padding: 1rem;
        }

        h3 {
            margin-top: 1rem;
            color: #2c3e50;
        }

        form input[type="text"] {
            width: 100%;
            padding: 0.5rem 0.7rem;
            margin: 0.5rem 0;
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            padding: 0.7rem 1.5rem;
            background: #34495e;
            color: white;
            border: none;
            outline: none;
            margin-top: 1rem;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #2c3e50;
        }

        form input[name="cnum"] {
            width: 100%;
            padding: 0.5rem 0.7rem;
            margin: 0.5rem 0;
            outline: none;
        }

        /* Style for CVV */
        form input[name="cvv"] {
            width: 100%;
            padding: 0.5rem 0.7rem;
            margin: 0.5rem 0;
            outline: none;
        }

        @media only screen and (max-width: 770px) {
            .container {
                flex-direction: column;
            }
            body {
                overflow-x: hidden;
            }
        }
        .cnum {
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left">
            <h3>BILLING ADDRESS</h3>
            <?php echo $billing_details; ?>
           <form action="invoicehostel.php" method="POST">
    <input type="hidden" name="billing_details" value="<?php echo htmlspecialchars($billing_details); ?>">
    Full name
    <input type="text" name="name" placeholder="Enter name" required>
    Email
    <input type="text" name="bemail" placeholder="Enter email" required>
    Address
    <input type="text" name="address" placeholder="Enter address" required>
    Credit card number
    <input class="cnum" type="password" name="cnum" placeholder="Enter card number" required>
    <div id="zip">
        <label>
            CVV
            <input class="cnum" type="password" name="cvv" placeholder="CVV" maxlength="3" required>
        </label>
    </div>
    <!-- Hidden fields -->
    <input type="hidden" name="total_amount" value="<?php echo $total_amount; ?>">
    <input type="hidden" name="email" value="<?php echo $email; ?>">
    <input type="hidden" name="hid" value="<?php echo $hid; ?>">
    <!-- Rest of your form -->
    <input type="submit" name="submit" value="Proceed to Checkout">
</form>

    </div>
</div>
</body>
</html>
