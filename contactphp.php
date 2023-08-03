<?php
$name=$_POST["fullname"];
$phone=$_POST["phonenumber"];
$email=$_POST["email"];
$message=$_POST["message"];
$host="localhost";
$user="root";
$pass="";
$database="project";
$con=new mysqli($host,$user,$pass,$database);
if($con->connect_error){
    echo("unsuccesfully Connected");
}
else{
    $q="INSERT INTO callback (`name`, `phonenumber`, `email`, `message`) values('$name','$phone','$email','$message')";
    if($con->query($q)==TRUE){
        header("Location: http://localhost/project/login1.php");
    }else{
        echo "Failure";
    }  
}


?>