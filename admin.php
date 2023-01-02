<?php
session_start();
include("include/connection.php");


if(isset($_POST['login'])){
	$username = $_POST['uname'];
	$password = $_POST['pass'];

	$error = array();
	if(empty($username)){
		$error['admin'] = "Enter UserID";
	}else if(empty($password)){
		$error['admin'] = "Enter Password";
	}
	if(count($error)==0){
		$query = "SELECT * FROM admin WHERE id='$username' AND Password= '$password'";

		$result = mysqli_query($connect,$query);
		$row = mysqli_fetch_array($result);
		if(mysqli_num_rows($result) == 1)
		{
			echo "<script>alert('You have login as an admin')</script>";

			$_SESSION['user_name'] = $row['name'];
			$_SESSION['admin'] = $username;
			
			header("Location:admin/index.php");
			exit();
		}
		else
		{
			echo "<script>alert('Invalid UserID or Password')</script>";
		}
    }
 }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login Page</title>
</head>
<body style="background-color: #d1e0e0;">
	<?php
	 include("include/header.php");
	?>

	<div style="margin-top: 100px;"></div>	

	<div class="container-fluid mt-4" style="width:800px;">
		<div class="row">
		<div class="col-md-2"></div>	
	    <div class="col-md-8 shadow" style="border-radius: 10px; background-color: white;">

		    <img src="img/adminlogin.jpg" class="img-fluid" style="color: #527a7a; border-radius: 10px;">
		    <br>
			
			<form method="post" class="my-2">
			<div>
				<?php
				 if(isset($error['admin'])){
					$sh = $error['admin'];
					$show = "<h4 class='alert alert-danger text-center'>$sh</h4>";
				 }else{
					$show="";
				 }
				 echo $show;
				?>
			</div>
			    <div class="form-group">
				<label>UserID</label>
				<input type="number" name="uname" class="form-control"
				autocomplete="off" placeholder="Enter UserID">
			    </div><br>
			    <div class="form-group">
				<label>Password</label>
				<input type="password" name="pass" class="form-control" placeholder="Enter password">
			    </div><br>
				

			    <input type="submit" name="login" class="btn btn-success" value="Login">
			</form>
			
		    
		    <div class="col-md-2"></div>
		</div>
	    </div>
	</div>
</body>
</html>