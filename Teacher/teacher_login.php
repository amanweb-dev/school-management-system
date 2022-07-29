<?php 
include "lib/session.php";
Session::check_login();

 ?>
<?php include "config/config.php" ?>
<?php include "lib/database.php" ?>
<?php include "helpers/formate.php" ?>



<?php 
$db = new Database();
$fm = new formate();
 ?>


<?php 
	if (isset($_POST['tchr_login'])) {
		$tchr_id = $_POST['tchr_id'];
		$tchr_pass =  $_POST['tchr_pass'];
		$tchr_id = mysqli_real_escape_string($db->link,$tchr_id);
		$tchr_pass = mysqli_real_escape_string($db->link,$tchr_pass);
		//$passwords =md5($std_password);

       $query = "SELECT * FROM teacher_info WHERE id = $tchr_id AND t_pass = '$tchr_pass' ";
       $login = $db->select($query);

		if ($login != false) {
					$value = mysqli_fetch_array($login);
					$row=mysqli_num_rows($login);
					if ($row>0) {
						Session::set("login", true);
						Session::set("username", $value['t_name']);
						Session::set("userId", $value['id']);
						Session::set("user_img", $value['t_img']);
						header("Location:index.php");
					}else{
						echo "<span style='color:red;text-align:center;font-size:20px;'>No record found</span>";
					}
				}else{
					echo "<span style='color:red;text-align:center;font-size:20px;'>username or password not matched</span>";
				}
	}



 ?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Teacher Login</title>
	<link rel="shortcut icon" href="assets/image/fabicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/tec_stu_acc.css">
	<link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
</head>
<script type="text/javascript" src="assets/js/jquery-1.12.4.js"></script>
<body>
	<div class="container-area">
		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-header">
					<h3>Sign In</h3>
					<div class="d-flex justify-content-end social_icon">
						<span><i class="fa fa-facebook-square"></i></span>
						<span><i class="fa fa-google-plus-square"></i></span>
						<span><i class="fa fa-twitter-square"></i></span>
					</div>
				</div>
				<div class="card-body">
					<form action="teacher_login.php" method="post">
						<div class="input-group form-group">
							<div class="input-group-prepend">
							</div>
							<input type="text" class="form-control" name="tchr_id" placeholder="Teacher ID">

						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
							</div>
							<input type="password" class="form-control" name="tchr_pass" placeholder="password">
						</div>
						<div class="form-group">
							<input type="submit" name="tchr_login" value="Login" class="btn btn1 float-right login_btn">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>