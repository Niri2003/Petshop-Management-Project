<html>
<?php include 'config.php';?>
<?php
$email=$_POST["email"];
$password=$_POST["password"];
$host="localhost";
$user = "root";
$pass = "";
$database = "project";
// Create connection
$conn = mysqli_connect($host, $user, $pass, $database);
if ($conn->connect_error) {
  echo "connection not established";
}
else
{
		$user_query = "SELECT * FROM usertable WHERE User_email='$email' and User_pass='$password'";
		$userresult = $conn->query($user_query);
		$admin_query = "SELECT * FROM admintable WHERE Admin_email='$email' and Admin_pass='$password'";
		$adminresult = $conn->query($admin_query);

		if($userresult->num_rows == 1)
		{
				header("Location: http://localhost/project/user/user-portal.php?email=".$email);
		}
		elseif($adminresult->num_rows ==1)
		{
				header("Location: http://localhost/project/admin/admin-portal.php?email=".$email);
		}
		else {
  		$_SESSION['wrong']="Password or Username Wrong";
  		header("Location: http://localhost/project/login1.php");
  		
		}
}
mysqli_close($conn);
?>
</html>
