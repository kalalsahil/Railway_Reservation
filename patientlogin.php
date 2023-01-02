<?php
	session_start();
	include("include/connection.php");

	if (isset($_POST['login']))
	{
		$id = $_POST['uname'];
		$pass = $_POST['pass'];
		$error = array();
		if (empty($id))
		{
			$error['patient'] = "Enter UserID";
		}
		elseif (empty($pass))
		{
			$error['patient'] = "Enter Password";
		}

		if(count($error)==0)
		{
		$query = "SELECT * FROM patient WHERE id='$id' AND password='$pass'";

		$result = mysqli_query($connect,$query);
		$row = mysqli_fetch_array($result);
		if(mysqli_num_rows($result) == 1)
		{
			

			$_SESSION['user_patient'] = $row['username'];
			$_SESSION['patient'] = $id;
			
			header("Location:patient/index.php");
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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Patient Login</title>
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
					<img src="img/patientlogin.jpg" style="margin-top: 20px; margin-left: 90px;">
					
					<h5 class="text-center my-3"> PATIENT'S LOGIN</h5>
					<form method="POST">
						<div>
						<?php
				 			if(isset($error['patient']))	
				 			{
								$sh = $error['patient'];
								$show = "<h4 class='alert alert-danger text-center'>$sh</h4>";
				 			}
				 			else
				 			{
								$show="";
				 			}
				 			echo $show;
						?>
						</div>
						<div class="form-group">
							<label>UserID</label>
							<input type="number" name="uname" class="form-control" autocomplete="off" placeholder="Enter UserID"><br>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
						</div>
						<input type="submit" name="login" class="btn btn-success my-3" value="Login">
						<p style="font-size: 0.35cm; font-style: italic;"> I don't have an account <b><a href="account.php" style="color: red;"> Click Here. </a></b></p>
					</form>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
	</div>

</body>
</html>