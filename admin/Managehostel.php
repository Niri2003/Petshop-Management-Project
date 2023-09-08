<html>
<title>Manage Hostel Booking</title>
<?php include 'menuadmin.php';?>
<?php include 'config.php';?>
  <h2>Manage Hostel Booking</h2>
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
      <th>Booking ID</th>
      <th>Starting Date</th>
      <th style=" width:17%;">Ending date</th>
      <th>User Id</th>
      <th>Pet Name</th>
      <th colspan="2" style="text-align: center; width: 29%;">Actions</th> 
    </tr>
    <?php
      $sql="SELECT * FROM hostelbooking";
      $res=mysqli_query($conn, $sql);
      if ($res==TRUE) {
        $count=mysqli_num_rows($res);
        if ($count>0){
            while($rows=mysqli_fetch_assoc($res)){
              $id=$rows['Hostel_Bid'];
              $sdate=$rows['Starting_date'];
              $edate=$rows['Ending_date'];
              $userid=$rows['User_id'];
              $pname=$rows['Pet_name'];
              ?>

            <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $sdate; ?></td>
            <td ><?php echo $edate; ?></td>
            <td><?php echo $userid; ?></td>
            <td><?php echo $pname; ?></td>
           <td style="border-right: solid white 2px;">
              <a href="update-hbooking.php?id=<?php echo $id; ?>&email=<?php echo $email; ?>" class="btnprimary" style="text-decoration: none">UPDATE</a>
            </td>
            <td style="margin:2px">
            <a href="delete-hbooking.php?id=<?php echo $id; ?>&email=<?php echo $email; ?>" class="btnsecondary" style="text-decoration:none">DELETE</a>
            </td>
            </tr>            <?php
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