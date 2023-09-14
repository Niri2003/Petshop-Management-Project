<html>
<title>Grooming Booking</title>
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
                Grooming Booking
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
<form method="POST" action="" onsubmit="return validateDate()">
 <label>Pet Name:</label>
 <input type="text" name="pname" id="pname" required onkeyup="checkname();">
 <span id="name_status"></span>
 <label>Date:</label>
 <input type="date" name="sdate" id="sdate" required >
 <span id="email_status"></span>
 <label for="time">Time Slot:</label>
<select name="time" id="time" required onkeyup="checkSlot();">
  <option value="--select--">--select--</option> 
  <option value="9am-10am">9 am to 10 am</option>
  <option value="10am-11am">10 am to 11 am</option>
  <option value="11am-12pm">11 am to 12 pm</option>
  <option value="12pm-1pm">12 pm to 1 pm</option>
  <option value="1pm-2pm">1 pm to 2 pm</option>
  <option value="2pm-3pm">2 pm to 3 pm</option>
  <option value="3pm-4pm">3 pm to 4 pm</option>
  <option value="4pm-5pm">4 pm to 5 pm</option>
  </select>
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
    $time=$_POST["time"];
    $sql="INSERT INTO groomingbooking ( `Grooming_Date`, `Slot_time`, `User_id`,`Pet_name`) values('$sdate','$time','$id','$name')";
    
    $checkData = "SELECT * FROM groomingbooking WHERE Grooming_Date = '$sdate' AND Slot_time = '$time'";
    $result = mysqli_query($conn,$checkData);
    if($time=='--select--'){
      $_SESSION['booked']="Choose a valid option";
      header("Location: http://localhost/project/user/grooming-booking.php?email=".$email."&id=".$id);
    }
    elseif($result->num_rows >= 3){
      $_SESSION['booked']="Sorry, this slot is booked";
      header("Location: http://localhost/project/user/grooming-booking.php?email=".$email."&id=".$id);

           } 
    else {
        $res=mysqli_query($conn,$sql);
        $_SESSION['free']="Slot is succesfully booked";    
        header("Location: http://localhost/project/user/grooming-booking.php?email=".$email."&id=".$id);

    }
}
?>
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
  
  <?php include 'footeruser.php';?>