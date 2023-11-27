<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<br><br>
	<br><br>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Hunger Smash</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda+One">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #999;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
}
.form-control {
	box-shadow: none;
	border-color: #ddd;
}
.form-control:focus {
	border-color: #4aba70; 
}
.login-form {
	width: 350px;
	margin: 0 auto;
	padding: 30px 0;
}
.login-form form {
	color: #434343;
	border-radius: 1px;
	margin-bottom: 5px;
	background: #fff;
	border: 1px solid #f3f3f3;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.login-form h4 {
	text-align: center;
	font-size: 22px;
	margin-bottom: 20px;
}
.login-form .avatar {
	margin: 0 auto 30px;
	text-align: center;
	width: 100px;
	height: 100px;
	border-radius: 50%;
	z-index: 9;
	padding: 15px;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
}
.login-form .avatar i {
	font-size: 62px;
}
.login-form .form-group {
	margin-bottom: 20px;
}
.login-form .form-control, .login-form .btn {
	min-height: 40px;
	border-radius: 2px; 
	transition: all 0.5s;
}
.login-form .close {
	position: absolute;
	top: 15px;
	right: 15px;
}
.login-form .btn, .login-form .btn:active {
	background: #864000 !important;
	border: none;
	line-height: normal;
}
.login-form .btn:hover, .login-form .btn:focus {
	background: #D44000 !important;
}
.login-form .checkbox-inline {
	float: left;
}
.login-form input[type="checkbox"] {
	position: relative;
	top: 2px;
}
.login-form .forgot-link {
	float: right;
}
.login-form .small {
	font-size: 13px;
}
.login-form a {
	color: #864000;
}
</style>
</head>
<body style="background-color:black;">
	<?php
		if($_SESSION['lgin'] != null)
		{
			$conn = mysqli_connect ('localhost','root','','rsm');
			$Duname=$_SESSION['lgin'];
			$select = "select * from users where Uname='$Duname'";
			$run = mysqli_query($conn,$select);
			$creds=mysqli_fetch_array($run);
			$db_utype=$creds['Utype'];
			if($db_utype=='manager')
			{
				echo "<script>window.open('manager.php','_self')</script>";
			}
			else if($db_utype=='Customer')
			{
				echo "<script>window.open('customer.php','_self')</script>";
			}
			else if($db_utype=='Basic Staff')
			{
				echo "<script>window.open('basicstaff.php','_self')</script>";
			}
			else if($db_utype=='Kitchen Staff')
			{
				echo "<script>window.open('kitchenstaff.php','_self')</script>";
			}

		}
	?>
<div class="login-form">    
    <form  method="POST">
		<img src="images\logoo.png" height="225" style="padding-left: 30px;">
    	<h3 class="modal-title" style="text-align:center">Login </h3>
        <div class="form-group">
            <input type="text" name="uname" class="form-control" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="pass" class="form-control" placeholder="Password" required="required">
        </div>
         
        <input type="submit" name="lbtn" class="btn btn-primary btn-block btn-lg" value="Login">              
    </form>		
	<?php
	$conn = mysqli_connect ('localhost','root','','rsm');
	if(isset($_POST['lbtn']))
	{
		$Duname =$_POST['uname'];
		$Dpass =$_POST['pass'];
		
		$select = "select * from users where Uname='$Duname'";
	$run = mysqli_query($conn,$select);
	$creds=mysqli_fetch_array($run);
	$db_uname =$creds['Uname'];
	$db_passw=$creds['Upassword'];
	$db_utype=$creds['Utype'];
	if($Duname==$db_uname && $Dpass==$db_passw)
	{
		$_SESSION['lgin']=$db_uname;
		$_SESSION['type']=$db_utype;
		if($db_utype=='manager')
		{
			echo "<script>window.open('manager.php','_self')</script>";
		}
		else if($db_utype=='Customer')
		{
			echo "<script>window.open('customer.php','_self')</script>";
		}
		else if($db_utype=='Basic Staff')
		{
			echo "<script>window.open('basicstaff.php','_self')</script>";
		}
		else if($db_utype=='Kitchen Staff')
		{
			echo "<script>window.open('kitchenstaff.php','_self')</script>";
		}
	}
	else
	{
		echo '<span style="color: white ;text-align:center;">Username or password incorrect try again</span>';
	}
	}
	


	?>	
    <div class="text-center small">Don't have an account? <a href="signup.php">Sign up</a></div>
</div>
</body>
</html>