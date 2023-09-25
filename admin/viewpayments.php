<html>
  <head>
    <title>View Payments</title>
    <?php include 'menuadmin.php';?>
    <?php include 'config.php';?>

    <style>
      table {
        width: 100%;
        border-collapse: collapse;
      }

      th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
      }

      th {
        background-color: #f2f2f2;
      }

      tr:hover {
        background-color: #f5f5f5;
      }

      .btn-primary {
        background-color: #0a2050;;
        color: white;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        border-radius: 5px;
      }

      .btn-secondary {
        background-color: #e7d619;
        color: white;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        border-radius: 5px;
      }
    </style>
  </head>
  <body>
    <h2>View Completed Payments</h2>
    <br /><br />
<!-- ... (Previous HTML and CSS code) ... -->

<h5>Hostel Payment</h5>
<table border="1">
    <tr>
        <th>Payment ID</th>
        <th>Payment Date</th>
        <th>Booking Price</th>
        <th>Hostel Booking ID</th>
    </tr>
    <?php
    $sql = "SELECT * FROM paymenthostel";
    $res = mysqli_query($conn, $sql);
    if ($res == TRUE) {
        $count = mysqli_num_rows($res);
        if ($count > 0) {
            while ($rows = mysqli_fetch_assoc($res)) {
                $hid = $rows['HPayment_id'];
                $hdate = $rows['HPayment_date'];
                $hprice = $rows['HPrice'];
                $hbid = $rows['Hostel_Bid'];
            ?>
                <tr>
                    <td><?php echo $hid; ?></td>
                    <td><?php echo $hdate; ?></td>
                    <td><?php echo $hprice; ?></td>
                    <td><?php echo $hbid; ?></td>
                </tr>
            <?php
            } // Close the while loop here
        } else {
            // No data
        }
    }
    ?>
</table>
<br><br>

<h5>Grooming Payment</h5>
<table border="1">
    <tr>
        <th>Payment ID</th>
        <th>Payment Date</th>
        <th>Booking Price</th>
        <th>Grooming Booking ID</th>
    </tr>
    <?php
    $gsql = "SELECT * FROM paymentgrooming";
    $gres = mysqli_query($conn, $gsql);
    if ($gres == TRUE) {
        $gcount = mysqli_num_rows($gres);
        if ($gcount > 0) {
            while ($rows = mysqli_fetch_assoc($gres)) {
                $gid = $rows['GPayment_id'];
                $gdate = $rows['GPayment_date'];
                $gprice = $rows['GPrice'];
                $gbid = $rows['Grooming_Bid'];
            ?>
                <tr>
                    <td><?php echo $gid; ?></td>
                    <td><?php echo $gdate; ?></td>
                    <td><?php echo $gprice; ?></td>
                    <td><?php echo $gbid; ?></td>
                </tr>
            <?php
            } // Close the while loop here
        } else {
            // No data
        }
    }
    ?>
</table>

    <?php include 'footeradmin.php';?>
  </body>
</html>
