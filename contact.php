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
                Request a call back
              </h2>
              <p>
               If you prefer to have a conversation over the phone to address specific concerns, receive personalized assistance, or obtain more detailed information about products or services submit a request.
              </p>
            </div>
            <form method="POST" action=""> 
    <p>Full name:</p>
    <input type = "text" name="fullname" required>
    <p>Phone number:</p>
    <input type = "text" name="phonenumber" required> 
    <p>Email:</p>
    <input type = "email" name="email" required>
    <p>Message:</p>
    <input type = "text" class ="message-box" name="message" required>
    <button class="btn" >SUBMIT</button>
    </form>
          </div>
        </div>
        <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/dog-png-14.png" alt="">
                  </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->

<?php
$name=$_POST["fullname"];
$phone=$_POST["phonenumber"];
$email=$_POST["email"];
$message=$_POST["message"];
$res = mysqli_query($conn, $sql);
if(isset($_POST['submit'])){
  if($con->connect_error){
    echo("unsuccesfully Connected");
  }
else{
    $q="INSERT INTO callback (`name`, `phonenumber`, `email`, `message`) values('$name','$phone','$email','$message')";
    if($con->query($q)==TRUE){
        header("Location: http://localhost/project/login1.php");
    }else{
        echo "Failure";
    }  
}
}


?>
<?php include 'footer.php';?>
</html>