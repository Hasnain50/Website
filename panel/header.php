<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blue Pumpkin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
</head>
  <body>
    <header class="header">   
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header--><a href="index.html" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Blue</strong><strong>Pumpkin</strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">B</strong><strong>P</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
          <div class="right-menu list-inline no-margin-bottom">    
            
            <!-- Languages dropdown    -->
            <div class="list-inline-item "><a class="nav-link"><span class="d-none d-sm-inline-block"><?php $_SESSION['admin_name']?></span></a>   </div>
            <!-- Log out-->
            <div class="list-inline-item logout"><a id="logout" href="../logout.php" class="nav-link">Logout <i class="icon-logout"></i></a></div>
          </div>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <!-- <div class="avatar"><img src="img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div> -->
          <div class="title">
            <h1 class="h5"><?php echo $_SESSION['admin_name']?></h1>
            <?php
            include '../connection.php';
            $AdminResult=mysqli_query($conn,"select * from admin where Admin_Id=".$_SESSION['admin']);
            $AdminRow=mysqli_fetch_array($AdminResult);
            ?>
            <p><?php echo $AdminRow['Admin_Email']?></p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li><a href="index.html"> <i class="icon-home"></i>Dashboard </a></li>
                <li><a href="Employee.php"> <i class="icon-grid"></i>Employees </a></li>
                <li><a href="Department.php"> <i class="icon-grid"></i>Department </a></li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-padnote"></i>Events </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="Events.php">Meeting</a></li>
                    <li><a href="#">Competitons</a></li>
                  </ul>
                </li>
                <li><a href="../Winners.php"> <i class="icon-grid"></i>Winners </a></li>
                <li><a href="../logout.php"> <i class="icon-logout"></i>Logout </a></li>
        
      </nav>
