<!DOCTYPE html>
<html>
<title>Admin Portal</title>
<body>
<?php include 'menuadmin.php';?>
<?php include 'config.php';?>

<?php
      
        $email= $_GET['email'];
              
      
      $sql="SELECT * FROM admintable WHERE Admin_email='$email'";
      $res=mysqli_query($conn, $sql);
      if ($res==TRUE) {
        $count=mysqli_num_rows($res);
        if ($count>0){
            while($rows=mysqli_fetch_assoc($res)){
              $name=$rows['Admin_name'];
              $id=$rows['Admin_id'];
            }
          }
        $_SESSION['active']="Password or Username Wrong";

        }
?>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Quicksand&display=swap');
</style>
<?php
    $_SESSION['useremail']=$email;
if(isset($_SESSION['useremail'])){
    echo '<h1 style="font-family: \'Quicksand\', sans-serif;">Welcome ' . $name . '</h1>';
}
else{
    header("Location: http://localhost/project/login1.php");
}
if (isset($_GET['logout'])) {
    session_unset();   // Unset all session variables
    session_destroy();
    header("Location: http://localhost/project/login1.php"); // Redirect to the login page or another suitable page
    exit();
}


?>


<link rel="stylesheet" href="http://localhost/project/admin/myst1.css">



<div class="our-services section-padding20">
            <div class="container">
                
                    <div class="section-tittle text-center mb-70">
                            
                            <h2 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Admin Services</h2>
                        </div>
                
                <div class="row">
                    <div class=" col-lg-4 col-md-6 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="card">
                                <a href="http://localhost/project/admin/Manageadmin.php?email=<?php echo $email; ?>">
                                <img src="http://localhost/project/admin/images/mandog.png" class="circle-image">
                            </div>
                            <div class="services-cap">
                                <h5><a href="http://localhost/project/admin/Manageadmin.php?email=<?php echo $email; ?>" style="text-decoration:none">Manage Admin</a></h5>
                                <p>Add, Delete or Update admin data.</p>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-4 col-md-6 col-sm-6">
                                            <div class="single-services text-center mb-30">
                                                <div class="card">
                                                    <a href="http://localhost/project/admin/Managehostel.php?email=<?php echo $email; ?>">
                                                    <img src="http://localhost/project/admin/images/mandog.png" class="circle-image">
                                                </div>
                                                <div class="services-cap">
                                                    <h5><a href="http://localhost/project/admin/Managehostel.php?email=<?php echo $email; ?>" style="text-decoration:none">Manage Booking Slots</a></h5>
                                                    <p>Delete or Update slots.</p>
                                                </div>
                                            </div>
                                        </div>
                    <div class=" col-lg-4 col-md-6 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="card">
                                <a href="http://localhost/project/admin/Managegrooming.php?email=<?php echo $email; ?>">
                                <img src="http://localhost/project/admin/images/mandog.png" class="circle-image">
                            </div>
                        <div class="services-cap">
                            <h5><a href="http://localhost/project/admin/Managegrooming.php?email=<?php echo $email; ?>" style="text-decoration:none">Manage Grooming Slots</a></h5>
                            <p>Delete or Update slots.</p>
                         </div>
                        </div>
                    </div>
                    <div class=" col-lg-4 col-md-6 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="card">
                                <a href="http://localhost/project/admin/viewpayments.php?email=<?php echo $email; ?>&id=<?php echo $id; ?>">
                                <img src="http://localhost/project/admin/images/mandog.png" class="circle-image">
                            </div>
                            <div class="services-cap">
                                <h5><a href="http://localhost/project/admin/viewpayments.php?email=<?php echo $email; ?>&id=<?php echo $id; ?>" style="text-decoration:none">View Payments</a></h5>
                                <p>View payment information</p>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-4 col-md-6 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="card">
                                 <a href="http://localhost/project/admin/viewfeedback.php?email=<?php echo $email; ?>">
                                <img src="http://localhost/project/admin/images/mandog.png" class="circle-image">
                            </div>
                            <div class="services-cap">
                                <h5><a href="http://localhost/project/admin/viewfeedback.php?email=<?php echo $email; ?>" style="text-decoration:none">View Feedback</a></h5>
                                <p>View feedback information</p>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-4 col-md-6 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="card">
                                <a href="http://localhost/project/admin/viewcallback.php?email=<?php echo $email; ?>">
                                <img src="http://localhost/project/admin/images/mandog.png" class="circle-image">
                            </div>
                            <div class="services-cap">
                                <h5><a href="http://localhost/project/admin/viewcallback.php?email=<?php echo $email; ?>" style="text-decoration:none">View Callback</a></h5>
                                <p>View callback information</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
<?php include 'footeradmin.php';?>
</body>
</html>