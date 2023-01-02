<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Profile</title>
</head>
<body style="background-color: #d1e0e0;">

	<?php
	$username="";
	$profiles="";
	include("../include/header.php");

	include("../include/connection.php");

	$ad = $_SESSION['admin'];
	
	$query = "SELECT * FROM admin WHERE id=$ad";
	
	$res = mysqli_query($connect,$query);

	while ($row = mysqli_fetch_array($res)) 
	{
	 	$username = $row['name'];
	 	$profiles = $row['profile'];

	} 
	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="position:fixed; margin-left: -15px; height: 100%;">
					<?php
					include("../admin/sidenav.php");
					?>
				</div>
				<div class="col-md-10" style="position:fixed; left:230px; height:90%; overflow-y:auto;">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6" style="margin-top: 40px;">
								<h4 style="color: #5d8989; margin-left: 40px;"><?php echo "".$username."'s"; ?> Profile</h4> <br>

								<?php
									if (isset($_POST['update']))
									{
										$profiles = $_FILES['profile']['name'];

										if (empty($profiles)) 
										{
											
										}
										else
										{
											$query = "UPDATE admin SET profile='$profiles' WHERE id='$ad'";
											$result = mysqli_query($connect,$query);

											if ($result)
											{
												move_uploaded_file($_FILES['profile']['tmp_name'], "../admin/img/$profiles");
											}
										}
									}
								?>

								<form method="post" enctype="multipart/form-data">
									<?php
									echo "<img src='img/$profiles' class='col-md-6' style='height: 250px; margin-left: 40px;'>";
									?>	

									<br><br>
									<div class="form-group">
										<label style="margin-left: 42px;">Update Profile Picture</label>
										<input type="file" name="profile" class="form-control" style="margin-left: 40px; width: 60%;">
									</div>
									<br>
									<input type="submit" name="update" value="Update" class="btn btn-success" style="margin-left: 40px;">
								</form>
							</div>
							<div class="col-md-6">
								<?php
									if (isset($_POST['change'])) 
									{
										$uname = $_POST['uname'];
										$error = array();
										if (empty($uname)) 
										{
											
										}
										else
										{
											$query = "UPDATE admin SET name='$uname' WHERE id='$ad'";

											$res = mysqli_query($connect,$query);

											if($res)
											{
												$_SESSION['user_name'] = $uname;

												echo "<script>alert('Username Changed')</script>";
											}
										}
									}
								?>
								<br>
								<form method="post">
									<h5 class="text-center my-4" style="color: #5d8989;">CHANGE USERNAME</h5>
									<input type="text" name="uname" class="form-control" autocomplete="off"><br>
									<input type="submit" name="change" class="btn btn-success" value="Change">
								</form> 



								<br>

								<?php
									
									$show = "";

									$error = array();

									if (isset($_POST['update_pass'])) 
									{

										$old_pass = $_POST['old_pass'];
									$new_pass = $_POST['new_pass'];
									$con_pass = $_POST['con_pass'];


										$old = mysqli_query($connect,"SELECT * FROM admin WHERE id='$ad'");

										$row = mysqli_fetch_array($old);
										$pass = $row['password'];	

										if (empty($old_pass)) 
										{
											$error['p'] = "Enter Old Password";
										}
										elseif (empty($new_pass)) 
										{
											$error['p'] = "Enter New Password";
										}
										elseif (empty($con_pass)) 
										{
											$error['p'] = "Confirm New Password";
										}
										elseif ($old_pass != $pass) 
										{
											$error['p'] = "Invalid Old Password";
										}
										elseif ($new_pass != $con_pass) 
										{
											$error['p'] = "Both The Passwords Do Not Match";
										}

										if (isset($error['p'])) 
										{
											$e = $error['p'];

											$show = "<h5 class='text-center alert alert-danger'>$e</h5>";
										}
										else
										{
											$show = "";
										}
									
										if(count($error) == 0)
										{
											$query = "UPDATE admin SET password='$new_pass' WHERE id='$ad'";

											mysqli_query($connect,$query);
											echo "<script>alert('Password Changed')</script>";
										}
									}
										

									
								?>
								<form method="post">
									<h5 class="text-center my-4" style="color: #5d8989;">CHANGE PASSWORD</h5>
									<?php 
									echo $show;
									?>
									<div class="form-group">
										<label>Old Password</label>
										<input type="password" name="old_pass" class="form-control">
									</div>
									<div class="form-group">
										<label>New Password</label>
										<input type="password" name="new_pass" class="form-control">	
									</div>
									<div class="form-group">
										<label>Confirm New Password</label>
										<input type="password" name="con_pass" class="form-control">	
									</div>
									<br>
									<input type="submit" name="update_pass" class="btn btn-info" value="Update Password">
									
								</form>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>

</body>
</html>