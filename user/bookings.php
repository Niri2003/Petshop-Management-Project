<html>
  <head>
    <title>Your Bookings</title>
    <?php include 'menuuser.php';?>
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
    <h2>Your Bookings</h2>
    <br /><br />
<?php
      $email = $_GET['email'];
      $id=$_GET['id'];
    ?>
    
    <?php

      if (isset($_SESSION['delete'])) {
        echo '<span style="color: red;">' . $_SESSION['delete'] . '</span>';
        unset($_SESSION['delete']);
      }
      if (isset($_SESSION['update'])) {
        echo '<span style="color: green;">' . $_SESSION['update'] . '</span>';
        unset($_SESSION['update']);
      }
      if (isset($_SESSION['max'])) {
        echo '<span style="color: red;">' . $_SESSION['max'] . '</span>';
        unset($_SESSION['max']);
      }
    ?>
    
    <!-- Add button !-->
    <h5>Hostel Booking</h5>  
    <table border="1">
      <tr>
        <th>Booking ID</th>
        <th>Starting Date</th>
        <th style="width: 17%;">Ending date</th>
        
        <th>Pet Name</th>
        <th>Booking Status</th>
        <th colspan="2" style="text-align: center; width: 29%;">Actions</th> 
      </tr>
      <?php
        $sql = "SELECT * FROM hostelbooking WHERE User_id = '$id'";
        $res = mysqli_query($conn, $sql);
        if ($res == TRUE) {
          $count = mysqli_num_rows($res);
          if ($count > 0) {
            while ($rows = mysqli_fetch_assoc($res)) {
              $hid = $rows['Hostel_Bid'];
              $sdate = $rows['Starting_date'];
              $edate = $rows['Ending_date'];
              $phname = $rows['Pet_name'];
              $hstatus = $rows['Booking_status'];
      ?>
              <tr>
                <td><?php echo $hid; ?></td>
                <td><?php echo $sdate; ?></td>
                <td><?php echo $edate; ?></td>
                <td><?php echo $phname; ?></td>
                <td><?php echo $hstatus; ?></td>

                <?php if ($hstatus === 'UNPAID'): ?>
        <td style="border-right: solid white 2px;">
            <a href="hostelbilling.php?sdate=<?php echo $sdate; ?>&edate=<?php echo $edate; ?>&hid=<?php echo $hid; ?>&email=<?php echo $email; ?>" class="btn-primary" style="text-decoration: none">PAY</a>
        </td>
        <td style="margin:2px">
            <a href="delete-hbooking.php?hid=<?php echo $hid; ?>&email=<?php echo $email; ?>&id=<?php echo $id; ?>" class="btn-secondary" style="text-decoration:none">DELETE</a>
        </td>
    <?php else: ?>
        <td colspan="2">Payment Completed</td>
    <?php endif; ?>
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
    
    <h5>Grooming Booking</h5>
    <?php

      if (isset($_SESSION['deleteg'])) {
        echo '<span style="color: red;">' . $_SESSION['deleteg'] . '</span>';
        unset($_SESSION['deleteg']);
      }
      if (isset($_SESSION['update'])) {
        echo '<span style="color: green;">' . $_SESSION['update'] . '</span>';
        unset($_SESSION['update']);
      }
      if (isset($_SESSION['max'])) {
        echo '<span style="color: red;">' . $_SESSION['max'] . '</span>';
        unset($_SESSION['max']);
      }
    ?>
    <table border="1">
    <tr>
        <th>Booking ID</th>
        <th>Grooming Date</th>
        <th style="width: 17%;">Time Slot</th>
        <th>Pet Name</th>
        <th>Booking Status</th>
        <th colspan="2" style="text-align: center; width: 29%;">Actions</th>
    </tr>
    <?php
    $gsql = "SELECT * FROM groomingbooking WHERE User_id = '$id'"; // Use a different variable name
    $gres = mysqli_query($conn, $gsql);
    if ($gres == TRUE) {
        $gcount = mysqli_num_rows($gres);
        if ($gcount > 0) {
            while ($grows = mysqli_fetch_assoc($gres)) { // Use $grows here
                $gid = $grows['Grooming_Bid']; // Use $gid here
                $date = $grows['Grooming_Date'];
                $time = $grows['Slot_time'];
                $pgname = $grows['Pet_name'];
                $gstatus = $grows['Booking_status'];
    ?>
                <tr>
                    <td><?php echo $gid; ?></td>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $time; ?></td>
                    <td><?php echo $pgname; ?></td>
                    <td><?php echo $gstatus; ?></td>
                    <?php if ($gstatus === 'UNPAID'): ?>
        <td style="border-right: solid white 2px;">
            <a href="groomingbilling.php?date=<?php echo $date; ?>&time=<?php echo $time; ?>&gid=<?php echo $gid; ?>&email=<?php echo $email; ?>" class="btn-primary" style="text-decoration: none">PAY</a>
        </td>
        <td style="margin:2px">
            <a href="delete-hbooking.php?hid=<?php echo $hid; ?>&email=<?php echo $email; ?>&id=<?php echo $id; ?>" class="btn-secondary" style="text-decoration:none">DELETE</a>
        </td>
    <?php else: ?>
        <td colspan="2">Payment Completed</td>
    <?php endif; ?>
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
