<!DOCTYPE html>
<html>
<?php include 'menuuser.php';?>
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
              $id=$rows['User_id'];
            }
          }
        }
?>
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
                If you prefer to have a conversation over the phone to address specific concerns, receive personalized assistance, or obtain more detailed information about products or services, submit a request.
              </p>
            </div>
            <form method="POST" action=""> 
              <p>Phone number:</p>
              <input type="text" name="phonenumber" required> 
              <p>Message:</p>
              <input type="text" class="message-box" name="message" required>
              <input type="submit" name="submit" value="SUBMIT" class="btn">
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
if (isset($_POST['submit'])) {
  // Your form handling code here

  $phone = $_POST["phonenumber"];
  $message = $_POST["message"];

  // Define your SQL query here for inserting data into your database
  $sql = "INSERT INTO callback (`name`, `phonenumber`, `cbemail`, `message`) VALUES ('$name', '$phone', '$email', '$message')";

  // Check the database connection
  if ($conn->connect_error) {
    echo("Unsuccessfully Connected");
  } else {
    if ($conn->query($sql) === TRUE) {
      // Redirect to a success page after form submission
      header("Location: http://localhost/project/user/user-portal.php?email=".$email);
      exit(); // Ensure script execution stops after redirection
    } else {
      echo "Failure: " . $conn->error;
    }
  }
}
?>

<?php include 'footer.php';?>
</html>
