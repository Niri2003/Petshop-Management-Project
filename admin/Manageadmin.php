<html>
<title>Manage Admin</title>
<?php include 'menuadmin.php';?>
<?php include 'config.php';?>
  <h2>Manage Admin</h2>
  <br /><br />
  <?php
  $uid = $_GET['id'];
?>
<?php
    $_SESSION['usermail']=$uid;
  if(isset($_SESSION['usermail'])){
    
  }
  else{
    header("Location: http://localhost/project/login1.php");
  }
  if (isset($_GET['logout'])) {
    session_unset();   // Unset all session variables
    session_destroy(); 
    header("Location: http://localhost/project/login1.php"); // Redirect to the login page or another suitable page
    exit();
  }
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
    <a href="add-admin.php?uid=<?php echo $uid; ?>" class="btnprimary" style="text-decoration:none">ADD ADMIN</a>
  <br /><br />
  <table border="1">
    <tr>
      <th>Admin ID</th>
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
              $email=$rows['Admin_email'];
              $phone=$rows['Admin_phno'];
              ?>

            <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $name; ?></td>
            <td style="padding-right: 10px"><?php echo $email; ?></td>
            <td><?php echo $phone; ?></td>
           <td style="border-right: solid white 2px;">
              <a href="update-admin.php?id=<?php echo $id; ?>&uid=<?php echo $uid; ?>" class="btnprimary" style="text-decoration:none">UPDATE</a>
            </td>
            <td style="margin:2px">
              <?php if ($uid!=$id) { ?>
            <a href="delete-admin.php?id=<?php echo $id; ?>&uid=<?php echo $uid; ?>" class="btnsecondary" style="text-decoration:none">DELETE</a>
            <?php } ?>
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