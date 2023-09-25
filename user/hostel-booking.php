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
    $id=$_GET['id'];
    ?>
    
    <body>
      <?php
      if (isset($_SESSION['free'])) {
        echo '<span style="color: green;">' . $_SESSION['free'] . '</span>';
        unset($_SESSION['free']);
      }
      if (isset($_SESSION['booked'])) {
        echo '<span style="color: red;">' . $_SESSION['booked'] . '</span>';
        unset($_SESSION['booked']);
      }
?>
<script>
    function validateDate() {
        var sDate = new Date(document.getElementById('sdate').value);
        var eDate = new Date(document.getElementById('edate').value);
        var today = new Date();
        
        sDate.setHours(0, 0, 0, 0);
        eDate.setHours(0, 0, 0, 0);
        today.setHours(0, 0, 0, 0);

        if (sDate.getTime() <= today.getTime()) {
            alert("Please choose a start date in the future.");
            return false;
        }

        if (eDate.getTime() < sDate.getTime()) {
            alert("End date should be the same as or greater than the start date.");
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
    $checkData = "SELECT * FROM hostelbooking WHERE Starting_date = '$sdate'";
$result = mysqli_query($conn, $checkData);

if ($result->num_rows >= 3) {
    $_SESSION['booked'] = "Sorry, this slot is booked";
    header("Location: http://localhost/project/user/hostel-booking.php?email=".$email."&id=".$id);
} else {
    $sql = "INSERT INTO hostelbooking (`Starting_date`, `Ending_date`, `User_id`, `Pet_name`) VALUES ('$sdate','$edate','$id','$name')";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $_SESSION['free'] = "Slot is successfully booked";
    } else {
        $_SESSION['free'] = "Booking failed. Please try again.";
    }

    header("Location: http://localhost/project/user/hostel-booking.php?email=".$email."&id=".$id);
}
}
?>

  <?php include 'footeruser.php';?>