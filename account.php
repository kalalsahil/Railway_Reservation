<?php
	include("include/connection.php");
	$show = "";
	if(isset($_POST['create']))
	{
		$fname = $_POST['fname'];
		$sname = $_POST['sname'];
		$uname = $_POST['uname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$password = $_POST['pass'];
		$con_pass = $_POST['con_pass'];
		

		$error = array();

		if (empty($fname)) 
		{
			$error['ac'] = "Enter Firstname";
		}
		elseif (empty($sname)) 
		{
			$error['ac'] = "Enter Surname";
		}
		elseif (empty($uname)) 
		{
			$error['ac'] = "Enter Username";
		}
		elseif (empty($email)) 
		{
			$error['ac'] = "Enter Email ID";
		}
		elseif (empty($phone)) 
		{
			$error['ac'] = "Enter Contact Number";
		}
		
		elseif (empty($password)) 
		{
			$error['ac'] = "Set A Password";
		}
		elseif (empty($con_pass)) 
		{
			$error['ac'] = "Confirm Your Password";
		}
		elseif($password != $con_pass)
		{
			$error['ac'] = "Both The Passwords Do Not Match";
		}

		if (count($error) == 0)
		{
			$query = "INSERT INTO user (firstname,surname,username,email,contact,password,date_reg) VALUES ('$fname','$sname','$uname','$email','$phone','$password',NOW())";

			$result = mysqli_query($connect,$query);

			$q = "SELECT * FROM user WHERE email='$email'";
			$res = mysqli_query($connect,$q);
			$row = mysqli_fetch_array($res);

			if ($res)
			{
				echo ("<script>alert('Your UserID is ".$row['id']."')</script>");
				
			}
			else
			{
				echo ("<script>alert('Account Creation Failed'</script>)");
			}
		}
		if (isset($error['ac']))
		{
			$s = $error['ac'];

			$show = "<h5 class='text-center alert alert-danger'>$s</h5>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create Account</title>
</head>
<body style="background-color: #d1e0e0;">

	<?php
		include("include/header.php");
	?>

	<div class="container-fluid" style="margin-top: 50px; position:fixed; height:90%; overflow-y:auto; width: 100%; margin:auto;">
		<div class="col-md-12">
			<div class="row">
				<div style="width:50%; margin-left:27%; margin-top: 5px;">
					<h4 class="text-center my-4" style="color: #5d8989;">Create an Account</h4>
					<div>
						<?php
						echo $show;
						?>
					</div>
					<form method="POST">
						<div class="form-group">
							<label>Firstname</label>
							<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname">
						</div><br>
						<div class="form-group">
							<label>Surname</label>
							<input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname">
						</div><br>
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
						</div><br>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email ID">
						</div><br>
						<div class="form-group">
							<label>Contact Number</label>
							<input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Contact Number">
						</div><br>
						
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
						</div><br>
						<div class="form-group">
							<label>Confirm Password</label>
							<input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Confirm your Password">
						</div><br>
						<input type="submit" name="create" value="Create Account" class="btn btn-success">
						<p style="font-size: 0.35cm; font-style: italic;" class="my-2"> I already have an account <b><a href="patientlogin.php" style="color: red;"> Click Here. </a></b></p>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>