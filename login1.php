<!DOCTYPE html>
<html>
<body>
<?php include 'menu.php';?>
<?php include 'config.php';?>
<section class="contact_section layout_padding-top">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5 offset-md-1">
          <div class="form_container">
            <div class="heading_container">
              <img src="images/heading-img.png" alt="">
              <h2>
                Log in to your account
              </h2>              
            </div>
            <form method="POST" action="loginphp.php"> 
    <p>Email:</p>
    <input type = "email" name="email" required>
    <p>Password:</p>
    <input type = "password" name="password" maxlength="8" required>
    <button class="btn"  style="text-decoration:none">SUBMIT</button>
   </form>
    <a href="http://localhost/project/signup1.php" class="btn-1" style="text-decoration:none">
                        SIGN UP

                      </a>
    <?php
  if (isset($_SESSION['wrong'])) {
      echo '<span style="color: red;">' . $_SESSION['wrong'] . '</span>';
      unset($_SESSION['wrong']);
  }
  ?>

          </div>
        </div>
        <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/dog-png-15.png" alt="">
                  </div>
        </div>
      </div>
    </div>
  </section>




<?php include 'footer.php';?>
</body>
</html>