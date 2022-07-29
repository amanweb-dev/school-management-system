<?php 
include "lib/session.php";
Session::check_session();
 ?>

<?php include "config/config.php" ?>
<?php include "lib/database.php" ?>
<?php include "helpers/formate.php" ?>


<?php 
$db = new Database();
$fm = new formate();
 ?>

<?php 
      if (isset($_GET['action']) && $_GET['action']=='logout') {
         Session::destroy(); 
      }

   ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>HGHS Teacher</title>
  <link rel="shortcut icon" href="../asset/image/fabicon.ico" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  </head>
  <body>
    <!-- container section start -->
    <section id="container" class="">
      <header class="header dark-bg header-bg">
        <div class="toggle-nav">
          <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
        </div>
        <!--logo start-->
        <a href="#" class="logo"><img src="img/logo-big.png" alt=""></a>
        <!--logo end-->

        <?php 
          $userId = Session::get('userId');
          $username = Session::get('username');
          $user_img = Session::get('user_img');
          ?>

        <div class="nav search-row" id="top_menu">
        </div>
        <div class="top-nav notification-row">
          <!-- notificatoin dropdown start-->
          <ul class="nav pull-right top-menu">
            <!-- user login dropdown start-->
            <li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="profile-ava">
                  <img alt="" src="../Admin/img/<?php echo $user_img; ?>  ">
                </span>
                <span class="username"><?php echo $username; ?> </span>
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu extended logout">
                <div class="log-arrow-up"></div>
                <li class="eborder-top">
                  <a href="../Teacher/my_profile.php"><i class="icon_profile"></i> My Profile</a>
                </li>
                <!-- <li>
                  <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
                </li>
                <li>
                  <a href="#"><i class="icon_clock_alt"></i> Timeline</a>
                </li> -->
                <li>
                  <a href="?action=logout"><i class="icon_key_alt"></i> Log Out</a>
                </li>
              </ul>
            </li>
            <!-- user login dropdown end -->
          </ul>
          <!-- notificatoin dropdown end-->
        </div>
      </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
        <div id="sidebar" class="nav-collapse sidebar-bg">
          <!-- sidebar menu start-->
          <ul class="sidebar-menu">
            <li class="active">
              <a class="" href="index.php">
                <i class="icon_house_alt"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="sub-menu">
              <a href="javascript:;" class="">
                <i class="icon_document_alt"></i>
                <span>Profile</span>
                <span class="menu-arrow arrow_carrot-right"></span>
              </a>
              <ul class="sub">
                <li><a class="" href="my_profile.php">My Profile</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;" class="">
                <i class="icon_document_alt"></i>
                <span>Result</span>
                <span class="menu-arrow arrow_carrot-right"></span>
              </a>
              <ul class="sub">
                <li><a class="" href="add_result.php">Add Result</a></li>
                <li><a class="" href="update_result.php">View/Update Result</a></li>
              </ul>
            </li>
           <!--  <li class="sub-menu">
              <a href="javascript:;" class="">
                <i class="icon_document_alt"></i>
                <span>Attendence</span>
                <span class="menu-arrow arrow_carrot-right"></span>
              </a>
              <ul class="sub">
                <li><a class="" href="take_attendence.php">Take Attendence</a></li>
                <li><a class="" href="update_attendence.php">Update Attendence</a></li>
              </ul>
            </li> -->
            <li class="sub-menu">
              <a href="javascript:;" class="">
                <i class="icon_document_alt"></i>
                <span>Class Routine</span>
                <span class="menu-arrow arrow_carrot-right"></span>
              </a>
              <ul class="sub">
                <li><a class="" href="my_class.php">View Details</a></li>
              </ul>
            </li>
            <!-- <li class="sub-menu">
              <a href="javascript:;" class="">
                <i class="icon_document_alt"></i>
                <span>My Class Time</span>
                <span class="menu-arrow arrow_carrot-right"></span>
              </a>
              <ul class="sub">
                <li><a class="" href="my_class_time.php">View Details</a></li>
              </ul>
            </li> -->
            <li class="sub-menu">
              <a href="javascript:;" class="">
                <i class="icon_document_alt"></i>
                <span>Student Pro</span>
                <span class="menu-arrow arrow_carrot-right"></span>
              </a>
              <ul class="sub">
               <li><a class="" href="show_problem.php">Pending Problem</a></li>
               <li><a class="" href="show_solved_problem.php">Solved Problem</a></li>
             </ul>
           </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>     
    <!--sidebar end-->