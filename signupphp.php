<?php include 'config.php';?>
<?php
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$email=$_POST["user_email"];
$phone=$_POST["phone"];
$password=$_POST["userpass"];
$host="localhost";
$user="root";
$pass="";
$database="project";
$con=new mysqli($host,$user,$pass,$database);
if($con->connect_error){
    echo("unsuccesfully Connected");
}
else{
    $user_query = "SELECT * FROM usertable WHERE User_email='$email'";
    $userresult = $con->query($user_query);
    if($userresult->num_rows == 1)
        {
                $_SESSION['inuse']="Email already in use";
                header("Location: http://localhost/project/signup1.php");
        }
    elseif($userresult->num_rows != 1){
        $q="INSERT INTO usertable (`User_fname`,`User_lname` ,`User_email`, `User_phno`, `User_pass`) values('$fname','$lname','$email','$phone','$password')";
        if($con->query($q)==TRUE){
            header("Location: http://localhost/project/front.php");
        }
    }
    else{
            echo "Failure";
    }  
}
 

?>