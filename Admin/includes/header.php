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
  <link rel="shortcut icon" href="img/favicon.png">

  <title>HGHS Admin</title>
  <link rel="shortcut icon" href="../asset/image/fabicon.ico" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
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
      <?php 
          $admin_id = Session::get('admin_id');
          $admin_name = Session::get('admin_name');
          $admin_img = Session::get('admin_img');
      ?>
      <a href="index.php" class="logo"><img src="img/logo-big.png" alt=""></a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">
      </div>

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <span class="profile-ava">
                <img alt="" src="../Admin/img/Admin_imgs/<?php echo $admin_img; ?>">
              </span>
              <span class="username"><?php echo $admin_name; ?></span>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="my_profile.php"><i class="icon_profile"></i>Profile Settings</a>
              </li>
              <li>
                <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
              </li>
              <li>
                 <a href="?action=logout"><i class="icon_key_alt"></i>Logout</a>
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
      <div id="sidebar" class="nav-collapse sidebar-bg ">
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
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>Teacher Login</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="teacher_login.php">Add new Teacher</a></li>
              <li><a class="" href="teacher_details.php">All Teacher</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>Admission Login</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="Addmission_login.php">Add new Admission</a></li>
              <li><a class="" href="Addmission_details.php">All Admission</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>Event</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="add_event.php">Add new Event</a></li>
              <li><a class="" href="all_event.php">All Event</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>Routine</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="add_routine.php">Add new Routine</a></li>
              <li><a class="" href="all_routine.php">All Routine</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>Notice</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="add-notice.php">Add new Notice</a></li>
              <li><a class="" href="view-notice.php">All Notice</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>Subject</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="add_subject.php">Add Subject</a></li>
              <li><a class="" href="view_subject.php">All Subject</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <?php

               $query = "SELECT * FROM contact WHERE status = 0 ";
                      $query_result = $db->select($query);
                      if ($query_result) {
                       $row = mysqli_num_rows($query_result);

                        }else{
                          $row=0;
                        }


               ?>
              <span>Contact Mess: <span style="border: 2px solid red;border-radius: 45%;background: red;font-size: 11px;font-weight: bold;"><?php echo $row; ?></span> </span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="Contact_Message.php">Contact Message</a></li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
      <!--sidebar end-->
    