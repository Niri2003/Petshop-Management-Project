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
                Update Hostel Booking
              </h2>              
            </div>
    

</head>
<body>
    
<form method="POST" action="" onsubmit="return validateDate()">

 <label>Start Date:</label>
 <input type="date" name="sdate" id="sdate" required >
 <span id="email_status"></span>
 <label>End Date:</label>
 <input type="date" name="edate" id="edate" required>
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
    
    $name=$_POST["pname"];
    $sdate=$_POST["sdate"];
    $edate=$_POST["edate"];
    $hid=$_GET['id'];
    $id=$_GET['aid'];
  		echo $id;
				$sql="UPDATE hostelbooking SET Starting_date='$sdate',Ending_date='$edate' WHERE Hostel_Bid='$hid'";
				$res=mysqli_query($conn,$sql);
				if ($res==TRUE) {
					$_SESSION['update']="Booking updated succesfully";
					header("Location: http://localhost/project/admin/Managehostel.php?id=".$id);
				}
				else{
					$_SESSION['update']="Updation unsuccesfull";
					header("Location: http://localhost/project/admin/Managehostel.php?id=".$id);
				}
    }

?>
<?php include 'footeradmin.php';?>

