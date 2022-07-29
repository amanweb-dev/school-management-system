<?php 
include "lib/session.php";
Session::check_login();

 ?>
<?php include "config/config.php" ?>
<?php include "lib/database.php" ?>


<?php 
$db = new Database();
 ?>


<?php 
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password =  $_POST['password'];
		$username = mysqli_real_escape_string($db->link,$username);
		$password = mysqli_real_escape_string($db->link,$password);
            
            $chk_nm =  "admin";
            $chk_ps =  "123456";

		
		if ($username == $chk_nm && $password == $chk_ps) {
				Session::set("login", true);
				$query = "select * from admin";
				$login = $db->select($query);
				$value = mysqli_fetch_array($login);
				Session::set("admin_id", $value['admin_id']);
				Session::set("admin_name", $value['admin_name']);
				Session::set("admin_img", $value['admin_img']);
				header("Location:index.php");
			
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
	<title>Admin Login</title>
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
					<form action="admin_login.php" method="post">
						<div class="input-group form-group">
							<div class="input-group-prepend">
							</div>
							<input type="text" class="form-control" name="username">

						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
							</div>
							<input type="password" class="form-control" name="password">
						</div>
						<div class="form-group">
							<a href="../Account/index.html"><input type="submit" name="login" value="Login" class="btn btn1 float-right login_btn"></a>
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