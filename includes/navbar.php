<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="container">
      <div class="navbar-header">
      <a href="index.php" class="navbar-brand">
      <img src="images/logo1.png" alt="" width="100" height="90" style="margin-top: -35px;">

</a>
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>
      <style>
        @import url('https://fonts.googleapis.com/css2?family=Fredoka&display=swap');
        @import url('https://fonts.cdnfonts.com/css/raider-crusader');

    /* Inline CSS for font and color changes */
    body {
      font-family: 'Fredoka'; /* Change to your desired font */
      color: #333; /* Change to your desired text color */
      
    }
    
   .navbar-brand {
       color: #000e17;
      font-family: 'Raider Crusader Italic';
           
    }
    .navbar-brand:hover {
    color: #000e17; /* Change to your desired hover color */
    text-decoration: none; /* Optional: Remove underline */
}


    .navbar-nav>li>a {
      color: #000e17 ; /* Change to your desired menu text color */
    }

    .navbar-nav>li>a:hover,
    .navbar-nav>li>a:focus {
      color: lightskyblue; /* Menu text color on hover/focus */
        background-color: #000e17; /* Dark blue background color */
        text-shadow: 0 0 5px rgba(173, 216, 230, 0.8); /* Light blue border around text */
    }

    .navbar-toggle {
      border-color: #428bca; /* Change to your desired toggle button color */
    }

    .navbar-toggle:hover,
    .navbar-toggle:focus {
      background-color: #428bca; /* Change to your desired toggle button background color on hover/focus */
    }
    .h1{
      font-family:'Fredoka' ;
    }
    .navbar-custom-menu .dropdown-menu>li>a {
      color: #333; /* Change to your desired dropdown menu text color */
      background-color: #000e17;
    }

    .navbar-custom-menu .dropdown-menu>li>a:hover,
    .navbar-custom-menu .dropdown-menu>li>a:focus {
      background-color: #eee; /* Change to your desired dropdown menu item background color on hover/focus */
    }

    .navbar-custom-menu .user-menu>li>a {
      color: #333; /* Change to your desired user menu text color */
    }

    .navbar-custom-menu .user-menu>li>a:hover,
    .navbar-custom-menu .user-menu>li>a:focus {
      background-color: #eee; /* Change to your desired user menu item background color on hover/focus */
    }
  </style>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="index.php">HOME</a></li>
          
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">CATEGORY <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <?php
             
                $conn = $pdo->open();
                try{
                  $stmt = $conn->prepare("SELECT * FROM category");
                  $stmt->execute();
                  foreach($stmt as $row){
                    echo "
                      <li><a href='category.php?category=".$row['cat_slug']."'>".$row['name']."</a></li>
                    ";                  
                  }
                }
                catch(PDOException $e){
                  echo "There is some problem in connection: " . $e->getMessage();
                }

                $pdo->close();

              ?>
            </ul>
          </li>

          <li><a href="about.php">ABOUT US</a></li>
          <li><a href="contact.php">CONTACT US</a></li>
          
        </ul>
        <form method="POST" class="navbar-form navbar-left" action="search.php">
          <div class="input-group">
              <input type="text" class="form-control" id="navbar-search-input" name="keyword" placeholder="Search for Product" required>
              <span class="input-group-btn" id="searchBtn" style="display:none;">
                  <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-search"></i> </button>
              </span>
          </div>
        </form>
      </div>
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-shopping-cart"></i>
              <span class="label label-success cart_count"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <span class="cart_count"></span> item(s) in cart</li>
              <li>
                <ul class="menu" id="cart_menu">
                </ul>
              </li>
              <li class="footer"><a href="cart_view.php">Go to Cart</a></li>
            </ul>
          </li>
          <?php
            if(isset($_SESSION['user'])){
              $image = (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg';
              echo '
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="'.$image.'" class="user-image" alt="User Image">
                    <span class="hidden-xs">'.$user['firstname'].' '.$user['lastname'].'</span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <img src="'.$image.'" class="img-circle" alt="User Image">

                      <p>
                        '.$user['firstname'].' '.$user['lastname'].'
                        <small>Member since '.date('M. Y', strtotime($user['created_on'])).'</small>
                      </p>
                    </li>
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div class="pull-right">
                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                      </div>
                    </li>
                  </ul>
                </li>
              ';
            }
            else{
              echo "
                <li><a href='login.php'>LOGIN</a></li>
                <li><a href='signup.php'>SIGNUP</a></li>
              ";
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <style>
	  form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
			
        }
</style>
</header>