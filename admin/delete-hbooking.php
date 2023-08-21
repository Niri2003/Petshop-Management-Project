<?php include 'config.php';?>
<?php
$uid=$_GET['id'];
$id=$_GET['uid'];
$sql="DELETE FROM hostelbooking WHERE Hostel_Bid='$uid'";
$res=mysqli_query($conn,$sql) or die(mysqli_error());
if ($res==TRUE) {
  $_SESSION['delete']="Admin deleted succesfully";
  header("Location: http://localhost/project/admin/Managehostel.php?id=".$id);
}
else{
  $_SESSION['delete']="Deletion unsuccesfull";
  header("Location: http://localhost/project/admin/Managehostel.php?id=".$id);
}
?>