<!DOCTYPE html>
<html>
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
                Give a Feedback
              </h2>
              <p>
              Please share your thoughts and opinions about our services.
              </p>
            </div>
            <?php
      if (isset($_SESSION['add'])) {
        echo '<span style="color: green;">' . $_SESSION['add'] . '</span>';
        unset($_SESSION['add']);
      }?>
            <form method="POST" action="" > 
              <p>Message:</p>
              <input type="text" class="message-box" name="message" required>
              <input type="submit" value="SUBMIT" name="submit" class="btnprimary">
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


 <?php
 if(isset($_POST['submit'])){
    $email = $_GET['email'];
    $id = $_GET['id'];
    $message = $_POST["message"];
    $sql = "INSERT INTO feedback (`Feedback_msg`, `User_id`) VALUES ('$message', '$id')";
    $res = mysqli_query($conn, $sql);
    if($res == TRUE) {
      $_SESSION['add']="Feedback added succesfully";
        header("Location: http://localhost/project/user/feedback.php?email=" . $email);
        exit(); // Add exit to prevent further execution
    }
 }
?>

<?php include 'footer.php';?>
</html>
