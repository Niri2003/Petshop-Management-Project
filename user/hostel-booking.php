<html>
<title>Hostel Booking</title>
<?php include 'menuuser.php';?>
<?php include 'config.php';?>
<section class="contact_section layout_padding-top">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5 offset-md-1">
          <div class="form_container">
            <div class="heading_container">
              <img src="images/heading-img.png" alt="">
              <h2>
                Hostel Booking
              </h2>              
            </div>

    <?php
    $email= $_GET['email'];
    ?>
    <body>
<script>
    function validateDate() {
      var selectedDate = new Date(document.getElementById('sdate').value);
      var today = new Date();
      selectedDate.setHours(0, 0, 0, 0);

      if (selectedDate.getTime() <= today.getTime()) {
        alert("Please choose a date in the future.");
        return false;
      }
      
      return true;
    }
  </script>
    
<form method="POST" action="" onsubmit="return validateDate()">
 <label>Pet Name:</label>
 <input type="text" name="pname" id="pname" required onkeyup="checkname();">
 <span id="name_status"></span>
 <label>Start Date:</label>
 <input type="date" name="sdate" id="sdate" required >
 <span id="email_status"></span>
 <label>End Date:</label>
 <input type="date" name="edate" id="edate" required>
<input type="submit" value="BOOK" name="submit" class = "btnprimary">
</form>          </div>
        </div>
        <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/manadmin.png" alt="">
                  </div>
        </div>
      </div>
    </div>
  </section>
<?php
  if(isset($_POST['submit']))
  {
    $name=$_POST["pname"];
    $sdate=$_POST["sdate"];
    $edate=$_POST["edate"];
    $uid=$_GET['id'];
    $sql="INSERT INTO hostelbooking ( `Starting_date`, `Ending_date`, `User_id`,`Pet_name`) values('$sdate','$edate','$uid','$name')";
    $res=mysqli_query($conn,$sql);
    if($res==TRUE)
    {
    header("Location: http://localhost/project/user/user-portal.php?email=" . $email);
  }
}
?>

  <?php include 'footeruser.php';?>