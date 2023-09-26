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
        <th>User ID</th>
        <th>User Name</th>
    </tr>
    <?php
    $sql = "SELECT U.User_id, U.User_fname, PH.*
            FROM paymenthostel PH
            INNER JOIN hostelbooking HB ON PH.Hostel_Bid = HB.Hostel_Bid
            INNER JOIN USERTABLE U ON HB.User_id = U.User_id;";
    $res = mysqli_query($conn, $sql);
    if ($res == TRUE) {
        $count = mysqli_num_rows($res);
        if ($count > 0) {
            while ($rows = mysqli_fetch_assoc($res)) {
                $hid = $rows['HPayment_id'];
                $hdate = $rows['HPayment_date'];
                $hprice = $rows['HPrice'];
                $hbid = $rows['Hostel_Bid'];
                $uid = $rows['User_id'];
                $uname = $rows['User_fname'];
            ?>
                <tr>
                    <td><?php echo $hid; ?></td>
                    <td><?php echo $hdate; ?></td>
                    <td><?php echo $hprice; ?></td>
                    <td><?php echo $hbid; ?></td>
                    <td><?php echo $uid; ?></td>
                    <td><?php echo $uname; ?></td>
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
        <th>User ID</th>
        <th>User Name</th>
    </tr>
    <?php
    $gsql = "SELECT U.User_id, U.User_fname, PG.*
             FROM paymentgrooming PG
             INNER JOIN groomingbooking GB ON PG.Grooming_Bid = GB.Grooming_Bid
             INNER JOIN USERTABLE U ON GB.User_id = U.User_id";
    $gres = mysqli_query($conn, $gsql);
    if ($gres == TRUE) {
        $gcount = mysqli_num_rows($gres);
        if ($gcount > 0) {
            while ($rows = mysqli_fetch_assoc($gres)) {
                $gid = $rows['GPayment_id'];
                $gdate = $rows['GPayment_date'];
                $gprice = $rows['GPrice'];
                $gbid = $rows['Grooming_Bid'];
                $uid = $rows['User_id'];
                $uname = $rows['User_fname'];
            ?>
                <tr>
                    <td><?php echo $gid; ?></td>
                    <td><?php echo $gdate; ?></td>
                    <td><?php echo $gprice; ?></td>
                    <td><?php echo $gbid; ?></td>
                    <td><?php echo $uid; ?></td>
                    <td><?php echo $uname; ?></td>
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
