<!DOCTYPE html>
<html>

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
                Sign up Here To use our services
              </h2>              
            </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
  </script>

<script type="text/javascript">

function checkemail()
{
 var email=document.getElementById( "user_email" ).value;
  
 if(email)
 {
  $.ajax({
  type: 'post',
  url: 'checkdata.php',
  data: {
   user_email:email,
  },
  success: function (response) {
   $( '#email_status' ).html(response);
   if(response=="OK") 
   {
    return true;  
   }
   else
   {
    return false; 
   }
  }
  });
 }
 else
 {
  $( '#email_status' ).html("");
  return false;
 }
}

</script>
</head>
<body>
    
<form method="POST" action="signupphp.php" onsubmit="return checkall();">
 <label>First name:</label>
 <input type="text" name="fname" id="fname" required onkeyup="checkname();">
 <label>Last name:</label>
 <input type="text" name="lname" id="lname" required onkeyup="checkname();">
 <span id="name_status"></span>
 <label>Email:</label>
 <input type="email" name="user_email" id="user_email" required onkeyup="checkemail();">
 <span id="email_status"></span>
 <br>
 <label>Phone:</label>
 <input type="text" name="phone" id="phone" maxlength="10" minlength="10" required onkeyup="checkphone();">
 <span id="email_status"></span>
 <label>Password:</label>
 <input type="password" name="userpass" id="userpass" maxlength="8" required>
 <input type="submit" name="submit_form" value="Submit">
</form>
  <?php
  if (isset($_SESSION['inuse'])) {
      echo '<span style="color: red;">' . $_SESSION['inuse'] . '</span>';
      unset($_SESSION['inuse']);
  }
  ?>
          </div>
        </div>
        <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/dog-png-16.png" alt="">
                  </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->


<?php include 'footer.php';?>