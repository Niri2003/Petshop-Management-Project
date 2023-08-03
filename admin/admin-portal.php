<!DOCTYPE html>
<html>
<body>
<?php include 'menuadmin.php';?>
<?php include 'config.php';?>

<?php
      if($_GET){
        $email= $_GET['email'];
              
      }
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
<h1><?php echo "Welcome ".$name; ?></h1> 

<section class="slider_section">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>

        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-5 offset-md-1">
                  <div class="detail-box">
                    <div class="number">
                    </div>
                    <h1>
                      <span>
                        Manage Admin <br>                        
                      </span>
                    </h1>
                    <h3>
                      Add, Delete or Update admin information
                    </h3>
                    <div class="btn-box">
                      <a href="http://localhost/project/admin/Manageadmin.php?id=<?php echo $id; ?>" class="btn-1" style="text-decoration:none">
                      MANAGE
                       </a>
                  </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box1">
                    <img src="http://localhost/project/images/manageadmin.png">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-5 offset-md-1">
                  <div class="detail-box">
                    <div class="number">
                    </div>
                    <h1>
                      <span>
                        Manage Hostel Booking <br>                        
                      </span>
                    </h1>
                    <h3>
                      Delete or Update booking slots
                    </h3>
                    <div class="btn-box">
                      <a href="http://localhost/project/signup1.php" class="btn-1" style="text-decoration:none">
                        MANAGE
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="http://localhost/project/images/hostel.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-5 offset-md-1">
                  <div class="detail-box">
                    <div class="number">
                    </div>
                    <h1>
                      <span>
                        Manage Grooming Booking <br>                        
                      </span>
                    </h1>
                    <h3>
                      Delete or Update booking slots
                    </h3>
                    <div class="btn-box">
                      <a href="http://localhost/project/signup1.php" class="btn-1" style="text-decoration:none">
                        MANAGE
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="http://localhost/project/images/groom.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-5 offset-md-1">
                  <div class="detail-box">
                    <div class="number">
                    </div>
                    <h1>
                      <span>
                        View Payment <br>                        
                      </span>
                    </h1>
                    <h3>
                      View payment details
                    </h3>
                    <div class="btn-box">
                      <a href="http://localhost/project/signup1.php" class="btn-1" style="text-decoration:none">
                        VIEW
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="http://localhost/project/images/payment.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>         
          <div class="carousel-item">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-5 offset-md-1">
                  <div class="detail-box">
                    <div class="number">
                    </div>
                    <h1>
                      <span>
                        View Feedback <br>                        
                      </span>
                    </h1>
                    <h3>
                      View feedback details
                    </h3>
                    <div class="btn-box">
                      <a href="http://localhost/project/signup1.php" class="btn-1" style="text-decoration:none">
                        VIEW
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/frontpuppy.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="carousel-item">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-5 offset-md-1">
                  <div class="detail-box">
                    <div class="number">
                    </div>
                    <h1>
                      <span>
                        View Callback <br>                        
                      </span>
                    </h1>
                    <h3>
                      View callback details
                    </h3>
                    <div class="btn-box">
                      <a href="http://localhost/project/signup1.php" class="btn-1" style="text-decoration:none">
                        VIEW
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="http://localhost/project/images/payment.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section>
<?php include 'footeradmin.php';?>
</body>
</html>