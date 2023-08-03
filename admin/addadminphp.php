<?php
	{
		$name=$_POST["name"];
		$email=$_POST["user_email"];
		$phone=$_POST["phone"];
		$password=$_POST["userpass"];
    $id=$_GET['uid'];
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
				    $sql="INSERT INTO admintable (`Admin_name`, `Admin_email`, `Admin_phno`, `Admin_pass`) values('$name','$email','$phone','$password')";
				    $res=mysqli_query($conn,$sql) or die(mysqli_error());
				    if ($res==TRUE) 
            {
					    $_SESSION['add']="Admin added succesfully";
					    header("Location: http://localhost/project/admin/Manageadmin.php?id=".$id);
				    }
				    else
            {
					   $_SESSION['add']="Operation unsuccesfull";
					   header("Location: http://localhost/project/admin/add-admin.php?id=".$id);
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