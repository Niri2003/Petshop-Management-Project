<!DOCTYPE html>
<html>
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
<h1><?php echo "Welcome ".$name; ?></h1>

<section class="slider_section">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
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
                        Book Hostel <br>                        
                      </span>
                    </h1>
                    <h3>
                      Book an appoinment fro hostel services
                    </h3>
                    <div class="btn-box">
                      <a href="http://localhost/project/admin/bookhostel.php" class="btn-1" style="text-decoration:none">
                        BOOK
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="http://localhost/project/images/hostel.png">
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
                        Book Grooming <br>                        
                      </span>
                    </h1>
                    <h3>
                      Book an appoinment for grooming services
                    </h3>
                    <div class="btn-box">
                      <a href="http://localhost/project/signup1.php" class="btn-1" style="text-decoration:none">
                        BOOK
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
                        Add Feedback <br>                        
                      </span>
                    </h1>
                    <h3>
                      Give us a feedback to improve our services
                    </h3>
                    <div class="btn-box">
                      <a href="http://localhost/project/signup1.php" class="btn-1" style="text-decoration:none">
                        ADD
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
        </div>

      </div>

    </section>
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script>
    function openNav() {
      document.getElementById("myNav").classList.toggle("menu_width")
      document.querySelector(".custom_menu-btn").classList.toggle("menu_btn-style")
    }
  </script>
</body>
</html>