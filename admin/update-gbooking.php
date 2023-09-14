<html>
<title>Update Hostel Booking</title>
<?php include 'menuadmin.php';?>
<?php include 'config.php';?>
<section class="contact_section layout_padding-top">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5 offset-md-1">
          <div class="form_container">
            <div class="heading_container">
              <img src="images/heading-img.png" alt="">
              <h2>
                Update Grooming Booking
              </h2>              
            </div>
    

</head>
<body>
    
<form method="POST" action="" onsubmit="return validateDate()">

 <label>Grooming Date:</label>
 <input type="date" name="gdate" id="gdate" required >
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
<input type="submit" value="UPDATE" name="submit" class = "btnprimary">
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
    

    $gdate=$_POST["gdate"];
    $time=$_POST["time"];
    $gid=$_GET['id'];
    
  		
				$sql="UPDATE groomingbooking SET Grooming_Date='$gdate',Slot_time='$time' WHERE Grooming_Bid='$gid'";
				$res=mysqli_query($conn,$sql);
				if ($res==TRUE) {
					$_SESSION['update']="Booking updated succesfully";
					header("Location: http://localhost/project/admin/Managegrooming.php?email=".$email);
				}
				else{
					$_SESSION['update']="Updation unsuccesfull";
					header("Location: http://localhost/project/admin/Managegrooming.php?email=".$email);
				}
    }

?>
<script>
    function validateDate() {
      var selectedDate = new Date(document.getElementById('gdate').value);
      var today = new Date();
      selectedDate.setHours(0, 0, 0, 0);

      if (selectedDate.getTime() <= today.getTime()) {
        alert("Please choose a date in the future.");
        return false;
      }
      
      return true;
    }
  </script>
<?php include 'footeradmin.php';?>

