<html>
  <head>
    <title>View callback</title>
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
    <h2>View Callback </h2>
    <br /><br />
    <?php
      $email = $_GET['email'];

    ?>

    <table border="1">
      <tr>
        <th style="text-align: center;">Callback ID</th>
        <th style="text-align: center;">Users Name</th>
        <th style="text-align: center;">Phone number</th>
        <th style="text-align: center;">Email</th>
        <th style="text-align: center;">Message</th>
      </tr>
      <?php
        $sql = "SELECT * FROM callback";
        $res = mysqli_query($conn, $sql);
        if ($res == TRUE) {
          $count = mysqli_num_rows($res);
          if ($count > 0) {
            while ($rows = mysqli_fetch_assoc($res)) {
              $id = $rows['cbid'];
              $name = $rows['name'];
              $phno = $rows['phonenumber'];
              $cbemail = $rows['cbemail'];
              $message = $rows['message'];
      ?>
              <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $phno; ?></td>
                <td><?php echo $cbemail; ?></td>
                <td style="padding-right: 10px"><?php echo $message; ?></td>
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
