<?php
$servername="localhost";
$username="root";
$password="";
$dbname="project";
$conn= new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    echo "Error connecting to server";
}

if(isset($_POST['user_email']))
{
 $emailId=$_POST['user_email'];

 $checkdata=" SELECT User_email FROM usertable WHERE User_email='$emailId' ";
 $checkdataadmin=" SELECT Admin_email FROM admintable WHERE Admin_email='$emailId' ";
 $result = $conn->query($checkdata);
 $result1 = $conn->query($checkdataadmin);

 if($result->num_rows > 0)
 {
  echo "Email Already Exist";
 }
 elseif($result1->num_rows > 0)
 {
  echo "Email Already Exist";  
 }
 else
 {
  echo "OK";
 }
 exit();
}
?>