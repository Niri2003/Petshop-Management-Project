<!DOCTYPE html>
<html>
<title>User Portal</title>
<body>
<?php include 'usermenu.php';?>
<?php include 'config.php';?>

<?php
      if($_GET){
        $email= $_GET['email'];
              
      }
      $sql="SELECT * FROM usertable WHERE User_email='$email'";
      $res=mysqli_query($conn, $sql);
      if ($res==TRUE) {
        $count=mysqli_num_rows($res);
        if ($count>0){
            while($rows=mysqli_fetch_assoc($res)){
              $name=$rows['User_fname'];
            }
          }
        }
?>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Quicksand&display=swap');
</style>
<h1 style="font-family: 'Quicksand', sans-serif;"><?php echo "Welcome ".$name; ?></h1>

<link rel="stylesheet" href="http://localhost/project/user/myst.css">
<img style=" position: absolute;
    top: 380px;
    left: 990px;
    height: 450px;
    width: 400px;" src="http://localhost/project/user/images/niridog.png" >


<div class="our-services section-padding20">
            <div class="container">
                
                    <div class="section-tittle text-center mb-70">
                            
                            <h2 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">User Services</h2>
                        </div>
                
                <div class="row1">
                    <div class=" col-lg-4 col-md-6 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="card">
                                <img src="http://localhost/project/admin/images/mandog.png" class="circle-image">
                            </div>
                            <div class="services-cap">
                                <h5><a href="http://localhost/project/admin/Manageadmin.php?id=<?php echo $id; ?>" style="text-decoration:none">Hostel Booking</a></h5>
                                <p>Book slot for using services</p>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-4 col-md-6 col-sm-6">
                                            <div class="single-services text-center mb-30">
                                                <div class="card">
                                                    <img src="http://localhost/project/admin/images/mandog.png" class="circle-image">
                                                </div>
                                                <div class="services-cap">
                                                    <h5><a href="http://localhost/project/admin/Manageadmin.php?id=<?php echo $id; ?>" style="text-decoration:none">Grooming Booking</a></h5>
                                                    <p>Book slot for grooming services</p>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                    <div class="row">  
                    <div class=" col-lg-4 col-md-6 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="card">
                                <img src="http://localhost/project/admin/images/mandog.png" class="circle-image">
                            </div>
                        <div class="services-cap">
                            <h5><a href="http://localhost/project/admin/Manageadmin.php?id=<?php echo $id; ?>" style="text-decoration:none">Billing</a></h5>
                            <p>Complete or view payments.</p>
                         </div>
                        </div>
                    </div>
                    <div class=" col-lg-4 col-md-6 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="card">
                                <img src="http://localhost/project/admin/images/mandog.png" class="circle-image">
                            </div>
                            <div class="services-cap">
                                <h5><a href="http://localhost/project/admin/Manageadmin.php?id=<?php echo $id; ?>" style="text-decoration:none">Give Feedback</a></h5>
                                <p>Write your opinion about us</p>
                            </div>
                        </div>
                    </div>
                  </div>
  
                </div>
            </div>
        </div>
<?php include 'footeruser.php';?>
</body>
</html>