<html>
  <head>
    <title>Manage Admin</title>
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
    </style>
  </head>
  <body>
    <h2>Manage Admin</h2>
    <br /><br />
    <?php
      $email = $_GET['email'];
    ?>

    <table border="1">
      <tr>
        <th>Feedback ID</th>
        <th>Feedback Message</th>
        <th style="text-align: center;">User Id</th>
      </tr>
      <?php
        $sql = "SELECT * FROM feedback";
        $res = mysqli_query($conn, $sql);
        if ($res == TRUE) {
          $count = mysqli_num_rows($res);
          if ($count > 0) {
            while ($rows = mysqli_fetch_assoc($res)) {
              $id = $rows['Feedback_id'];
              $message = $rows['Feedback_msg'];
              $uid = $rows['User_id'];
      ?>
              <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $message; ?></td>
                <td style="padding-right: 10px"><?php echo $uid; ?></td>
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
