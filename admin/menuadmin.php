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
<div class="sub_page">
  <div class="hero_area ">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="#">
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
                  <a href="?logout=true">Logout</a>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
  </div>
</div>
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script>
    function openNav() {
      document.getElementById("myNav").classList.toggle("menu_width")
      document.querySelector(".custom_menu-btn").classList.toggle("menu_btn-style")
    }
  </script>
</html>