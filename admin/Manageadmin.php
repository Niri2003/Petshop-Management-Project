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
    <h2>Manage Admin</h2>
    <br /><br />
    <?php
      $email = $_GET['email'];
    ?>
    <?php
      if (isset($_SESSION['add'])) {
        echo '<span style="color: green;">' . $_SESSION['add'] . '</span>';
        unset($_SESSION['add']);
      }
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
    <a href="add-admin.php?email=<?php echo $email; ?>" class="btn-primary" style="text-decoration:none">ADD ADMIN</a>
    <br /><br />
    <table border="1">
      <tr>
        <th >Admin ID</th>
        <th>Admin Name</th>
        <th style="text-align: center;">Admin Email</th>
        <th>Admin Phone</th>
        <th colspan="2" style="text-align: center; width: 28%;">Actions</th> 
      </tr>
      <?php
        $sql="SELECT * FROM admintable";
        $res=mysqli_query($conn, $sql);
        if ($res==TRUE) {
          $count=mysqli_num_rows($res);
          if ($count>0){
              while($rows=mysqli_fetch_assoc($res)){
                $id=$rows['Admin_id'];
                $name=$rows['Admin_name'];
                $aemail=$rows['Admin_email'];
                $phone=$rows['Admin_phno'];
      ?>
                <tr>
                  <td><?php echo $id; ?></td>
                  <td><?php echo $name; ?></td>
                  <td style="padding-right: 10px"><?php echo $aemail; ?></td>
                  <td><?php echo $phone; ?></td>
                  <td style="border-right: solid white 2px;">
                    <a href="update-admin.php?email=<?php echo $email; ?>&id=<?php echo $id; ?>" class="btn-primary" style="text-decoration:none">UPDATE</a>
                  </td>
                  <td style="margin:2px">
                    <?php if ($aemail!=$email) { ?>
                      <a href="delete-admin.php?email=<?php echo $email; ?>&aemail=<?php echo $aemail; ?>" class="btn-secondary" style="text-decoration:none">DELETE</a>
                    <?php } ?>
                  </td>
                </tr>
      <?php
              }
            }
            else{
              //No data
            }
          }
        ?>
    </table>

    <?php include 'footeradmin.php';?>
  </body>
</html>
