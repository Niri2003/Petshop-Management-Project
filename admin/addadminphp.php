<?php
	{
		$name=$_POST["name"];
		$aemail=$_POST["user_email"];
		$phone=$_POST["phone"];
		$password=$_POST["userpass"];
    $email=$_GET['uemail'];
		$sel="SELECT * FROM admintable";
      	$res=mysqli_query($conn, $sel);
      	if ($res==TRUE) {
        $count=mysqli_num_rows($res);
        if ($count<5)
        {
          $user_query = "SELECT * FROM usertable WHERE User_email='$email'";
          $userresult = mysqli_query($conn, $user_query);
          if($userresult->num_rows == 1)
          {
                $_SESSION['add']="Email already in use";
                header("Location: http://localhost/project/signup1.php");
          }
          elseif($userresult->num_rows != 1)
          {  
				    $sql="INSERT INTO admintable (`Admin_name`, `Admin_email`, `Admin_phno`, `Admin_pass`) values('$name','$aemail','$phone','$password')";
				    $res=mysqli_query($conn,$sql) or die(mysqli_error());
				    if ($res==TRUE) 
            {
					    $_SESSION['add']="Admin added succesfully";
					    header("Location: http://localhost/project/admin/Manageadmin.php?email=".$email);
				    }
				    else
            {
					   $_SESSION['add']="Operation unsuccesfull";
					   header("Location: http://localhost/project/admin/add-admin.php?email=".$email);
				    }
		      }
		    }
        else
        {
			   $_SESSION['add']="Maximum no of admins reached";
			   header("Location: http://localhost/project/admin/Manageadmin.php?id=".$id);
        }

		}
	}
?>