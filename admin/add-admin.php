<html>
<title>Add Admin</title>
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
                Add Admin
              </h2>              
            </div>
    <?php
    if (isset($_SESSION['add'])) 
    {
              echo $_SESSION['add'];
              unset( $_SESSION['add']);
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
  </script>

<script type="text/javascript">
  <?php
    $email=$_GET['email'];


?>

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
    
<form method="POST" action="" onsubmit="return checkall();">
 <label>First name:</label>
 <input type="text" name="name" id="name" required onkeyup="checkname();">
 <span id="name_status"></span>
 <label>Email:</label>
 <input type="email" name="user_email" id="user_email" required onkeyup="checkemail();">
 <span id="email_status"></span>
 <br>
 <label>Phone:</label>
 <input type="text" name="phone" id="phone" maxlength="10" required onkeyup="checkphone();">
 <span id="email_status"></span>
 <label>Password:</label>
 <input type="password" name="userpass" id="userpass" maxlength="8" required>
<input type="submit" value="ADD ADMIN" name="submit" class = "btnprimary">
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
    $name=$_POST["name"];
    $aemail=$_POST["user_email"];
    $phone=$_POST["phone"];
    $password=$_POST["userpass"];
    
    $sel="SELECT * FROM admintable";
        $res=mysqli_query($conn, $sel);
        if ($res==TRUE) {
        $count=mysqli_num_rows($res);
        if ($count<5)
        {
            $sql="INSERT INTO admintable (`Admin_name`, `Admin_email`, `Admin_phno`, `Admin_pass`) values('$name','$aemail','$phone','$password')";
            $res=mysqli_query($conn,$sql) or die(mysqli_error());
            if ($res==TRUE) 
            {
              $_SESSION['add']="Admin added succesfully";
              header("Location: http://localhost/project/admin/Manageadmin.php?email=".$email);
            }
            else
            {
             $_SESSION['add']="Operation unsuccesfull";
             header("Location: http://localhost/project/admin/add-admin.php?email=".$email);
            }
          }
        }
        else
        {
         $_SESSION['max']="Maximum no of admins reached";
         header("Location: http://localhost/project/admin/Manageadmin.php?email=".$email);
        }

    }s
  
?>
  <?php include 'footeradmin.php';?>