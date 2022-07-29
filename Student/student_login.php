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
	if (isset($_POST['std_login'])) {
		$student_id = $_POST['student_id'];
		$std_password =  $_POST['std_password'];
		$student_id = mysqli_real_escape_string($db->link,$student_id);
		$std_password = mysqli_real_escape_string($db->link,$std_password);
		//$passwords =md5($std_password);

       $query = "SELECT * FROM student_info WHERE id = '$student_id' AND std_pass = '$std_password' ";
       $login = $db->select($query);

		if ($login != false) {
					$value = mysqli_fetch_array($login);
					$row=mysqli_num_rows($login);
					if ($row>0) {
						Session::set("login", true);
						Session::set("username", $value['std_name']);
						Session::set("userId", $value['id']);
						Session::set("user_img", $value['std_img']);
						Session::set("user_cls", $value['class']);
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
	<title>Student Login</title>
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
					<form action="student_login.php" method="post">
						<div class="input-group form-group">
							<div class="input-group-prepend">
							</div>
							<input type="text" class="form-control" name="student_id" placeholder="Student Id">

						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
							</div>
							<input type="password" class="form-control" name="std_password" placeholder="password">
						</div>
						<div class="form-group">
							<input type="submit" name="std_login" value="Login" class="btn float-right login_btn">
						</div>
					</form>
				</div>
				<div class="card-footer">
					<div class="d-flex justify-content-center links">
						Don't have an account?<a href="student_registration.php">Sign Up</a>
					</div>
					<div class="d-flex justify-content-center">
						<a href="#">Forgot your password?</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>