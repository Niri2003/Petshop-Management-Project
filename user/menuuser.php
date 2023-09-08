<html>
<head>
  <title>HOME</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="http://localhost/project/css/mystyle.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="http://localhost/project/css/mybootstrap.css" rel="stylesheet" />
</head>
<?php
              $email=$_GET['email'];?>
   
<div class="sub_page">
  <div class="hero_area ">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="http://localhost/project/user/user-portal.php?email=<?php echo $email; ?>">
            <img src="http://localhost/project/images/logo1.png" alt="">
          </a>
          <div class="" id="">
            <div class="User_option">
            </div>

            <div class="custom_menu-btn">
              <button onclick="openNav()">
                <span class="s-1">

                </span>
                <span class="s-2">

                </span>
                <span class="s-3">

                </span>
              </button>
            </div>
                       <div id="myNav" class="overlay">
              <div class="overlay-content">
                <a href="http://localhost/project/user/user-portal.php?email=<?php echo $email; ?>" style="text-decoration:none">Home</a>

              </div>
              <div class="overlay-content">
                <a href="http://localhost/project/front.php" style="text-decoration:none">Logout</a>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
  </div>
</div>
</html>