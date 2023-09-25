<?php include 'config.php';?>
<?php
$email=$_GET['email'];
$hid=$_GET['hid'];
$id=$_GET['id'];
$sql="DELETE FROM hostelbooking WHERE Hostel_Bid='$hid'";
$res=mysqli_query($conn,$sql) or die(mysqli_error());
if ($res==TRUE) {
	$_SESSION['delete']="Booking deleted succesfully";
	header("Location: http://localhost/project/user/bookings.php?email=".$email."&id=".$id);
}
else{
	$_SESSION['delete']="Deletion unsuccesfull";
	header("Location: http://localhost/project/user/bookings.php?email=".$email."&id=".$id);
}
?>

d