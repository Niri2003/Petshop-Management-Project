<?php include 'config.php';?>
<?php
$email=$_GET['email'];
$id=$_GET['id'];
$sql="DELETE FROM groomingbooking WHERE Grooming_Bid='$id'";
$res=mysqli_query($conn,$sql) or die(mysqli_error());
if ($res==TRUE) {
	$_SESSION['delete']="Booking deleted succesfully";
	header("Location: http://localhost/project/admin/Managegrooming.php?email=".$email);
}
else{
	$_SESSION['delete']="Deletion unsuccesfull";
	header("Location: http://localhost/project/admin/Managegrooming.php?email=".$email);
}
?>

