<html>
  <head>
    <title>Manage Grooming Booking</title>
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
    <h2>Manage Grooming Booking</h2>
    <br /><br />

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
      
    <table border="1">
      <tr>
        <th >Booking ID</th>
        <th>Grooming Date</th>
        <th style="width: 17%;">Time Slot</th>
        <th>User Id</th>
        <th>Pet Name</th>
        <th colspan="2" style="text-align: center; width: 29%;">Actions</th> 
      </tr>
      <?php
        $sql = "SELECT * FROM groomingbooking";
        $res = mysqli_query($conn, $sql);
        if ($res == TRUE) {
          $count = mysqli_num_rows($res);
          if ($count > 0) {
            while ($rows = mysqli_fetch_assoc($res)) {
              $id = $rows['Grooming_Bid'];
              $date = $rows['Grooming_Date'];
              $time = $rows['Slot_time'];
              $userid = $rows['User_id'];
              $pname = $rows['Pet_name'];
      ?>
              <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $date; ?></td>
                <td><?php echo $time; ?></td>
                <td><?php echo $userid; ?></td>
                <td><?php echo $pname; ?></td>
                <td style="border-right: solid white 2px;">
                  <a href="update-gbooking.php?id=<?php echo $id; ?>&email=<?php echo $email; ?>" class="btn-primary" style="text-decoration: none">UPDATE</a>
                </td>
                <td style="margin:2px">
                  <a href="delete-gbooking.php?id=<?php echo $id; ?>&email=<?php echo $email; ?>" class="btn-secondary" style="text-decoration:none">DELETE</a>
                </td>
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
