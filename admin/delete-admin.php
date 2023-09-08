<?php include 'config.php';?>
<?php
$aemail=$_GET['aemail'];
$email=$_GET['email'];
$sql="DELETE FROM admintable WHERE Admin_email='$aemail'";
$res=mysqli_query($conn,$sql) or die(mysqli_error());
if ($res==TRUE) {
	$_SESSION['delete']="Admin deleted succesfully";
	header("Location: http://localhost/project/admin/Manageadmin.php?email=".$email);
}
else{
	$_SESSION['delete']="Deletion unsuccesfull";
	header("Location: http://localhost/project/admin/Manageadmin.php?email=".$email);
}
?>

