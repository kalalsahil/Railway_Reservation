<?php
	session_start();
	include("include/connection.php");
	$show="";
	if (isset($_POST['login']))
	{
		$uname = $_POST['uname'];
		$password = $_POST['pass'];

		$error = array();

		$q = "SELECT * FROM user WHERE id='$uname' AND password='$password'";
		$qq = mysqli_query($connect,$q);

		if(mysqli_num_rows($qq) == 1)
		{

		$row = mysqli_fetch_array($qq);


		if (empty($uname))
		{
			$error['login'] = "Enter UserID";
		}
		elseif (empty($password)) 
		{
			$error['login'] = "Enter Password";
		}

		if($row['status'] == "Pending")
		{
			$error['login'] = "Please Wait For The Admin To Confirm Your Application";
		}
		elseif($row['status'] == "Rejected")
		{
			$error['login'] = "Your Application Was Rejected By The Admin";
		}

		if(count($error) == 0)
			{
				echo "<script>alert('Done')</script>";
 				$_SESSION['user_id'] = $row['username'];
 				$_SESSION['doctor'] = $uname;
				header("Location:doctor/index.php");
			}
			
		
		else
		{
			$r = $error['login'];

			$show = "<h5 class='text-center alert alert-danger'>$r</h5>";
		}
	}
		else
			{
				echo "<script>alert('Invalid Account')</script>";
			}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Doctor Login Page</title>
</head>
<body style="background-color: #d1e0e0;">

	<?php
	include("include/header.php");
	?>

	<div style="margin-top: 100px;"></div>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4 shadow" style="border-radius: 10px; background-color: white;">
					<img src="img/login.png" class="col-md-6 img-fluid" style="margin-left: 120px;">
					<h5 class="text-center my-2">USER'S LOGIN</h5>
						<div>
							<?php echo $show; ?>
						</div>
					<form method="post">
						<div class="form-group">
							<label>UserID</label>
							<br>
							<input type="number" name="uname" class="form-control" autocomplete="off" placeholder="Enter UserID">
							
						</div>
						<br>
						<div class="form-group">
							<label>Password</label>
							<br>
							<input type="password" name="pass" class="form-control" autocomplete="off">
						</div>
						<br>

						<input type="submit" name="login" class="btn btn-success" value="Login" style="margin-bottom: 10px;">

						<p style="font-size: 0.35cm; font-style: italic;"> I don't have an account <b><a href="apply.php" style="color: red;"> Apply Now!! </a></b></p>
						
					</form>
				</div>

				<div class="col-md-4"></div>
				
			</div>
			
		</div>
		
	</div>

</body>
</html>