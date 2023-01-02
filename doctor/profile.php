<?php
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User's Profile Page</title>
</head>
<body style="background-color: #d1e0e0;">

	<?php

		include("../include/connection.php");
		$doc= $_SESSION['doctor'];
		if (isset($_POST['change_uname'])) 
		{

			$uname = $_POST['uname'];
			if (empty($uname)) 
			{
												
			}
		    else
			{
				$query = "UPDATE user SET username='$uname' WHERE id='$doc'";
				$res = mysqli_query($connect,$query);
				if ($res) 
				{
					$_SESSION['user_id'] = $uname;
				}
			}
		}
		include("../include/header.php");									
	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="position:fixed; margin-left: -15px; height: 100%;" >
					
					<?php
						include("sidenav.php");
					?>

				</div>
				<div class="col-md-10" style="position:fixed; left:230px; height:90%; overflow-y:scroll">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6" style="margin-top: 50px;">
								
								<?php
									
									if (isset($_POST['upload'])) 
									{
										$img = $_FILES['img']['name'];

										if (empty($img)) 
										{
											
										}
										else
										{
											$query = "UPDATE user SET profile='$img' WHERE id='$doc'";
											$res = mysqli_query($connect,$query);

											if($res)
											{
												move_uploaded_file($_FILES['img']['tmp_name'], "../doctor/img/$img");
											}
										}
									}
									$query = "SELECT * FROM user WHERE id='$doc'";

									$res = mysqli_query($connect,$query);

									$row = mysqli_fetch_array($res);
								?>

								<h4 style="color: #5d8989; margin-left: 40px;"><?php echo "".$row['username']."'s"; ?> Profile</h4> <br>
								<form method="POST" enctype="multipart/form-data">
									
									<?php
										echo "<img src='img/".$row['profile']."' class='col-md-6' style='height: 250px; margin-left: 40px;'>";
									?>

									<div class="form-group">
									<label style="margin-left: 42px; margin-top: 30px;">Update Profile Picture</label>
									<input type="file" name="img" class="form-control" style="width: 60%; margin-left: 40px;"><br>
									<input type="submit" name="upload" class="btn btn-success" style="margin-left: 40px;" value="Update">
									</div>
								</form>
								<div class="my-3">
									<table class="table content table-bordered shadow" style="border-radius: 10px; background-color: white; margin-left: 40px; width: 70%;">
										<tr>
											<th class="text-center" colspan="2" style="font-size: 20px;">DETAILS</th>
										</tr>
										<tr>
											<td class="text-center" style="width: 50%;"><b>Firstname</b></td>
											<td class="text-center" style="width: 50%;"><?php echo $row['firstname']; ?></td>
										</tr>
										<tr>
											<td class="text-center" style="width: 50%;"><b>Surname</b></td>
											<td class="text-center" style="width: 50%;"><?php echo $row['surname']; ?></td>
										</tr>
										<tr>
											<td class="text-center" style="width: 50%;"><b>Username</b></td>
											<td class="text-center" style="width: 50%;"><?php echo $row['username']; ?></td>
										</tr>
										<tr>
											<td class="text-center" style="width: 50%;"><b>Email</b></td>
											<td class="text-center" style="width: 50%;"><?php echo $row['email']; ?></td>
										</tr>
										<tr>
											<td class="text-center" style="width: 50%;"><b>Contact Number</b></td>
											<td class="text-center" style="width: 50%;"><?php echo $row['contact']; ?></td>
										</tr>
									</table>
								</div>
							</div>
							<div class="col-md-6" style="margin-top: 50px;">
								<h5 class="text-center" style="color: #5d8989;">CHANGE USERNAME</h5><br>

									

								<form method="POST">
									<label>Change Username</label>
									<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username"><br>
									<input type="submit" name="change_uname" class="btn btn-success" value="Change Username">
								</form>
								<br><br><br><br>
								<h5 class="text-center" style="color: #5d8989;">CHANGE PASSWORD</h5><br>
								
								<?php
									$error = array();
									if ($_POST['change_pass']) 
									{
										$old = $_POST['old_pass'];
										$new = $_POST['new_pass']; 
										$con = $_POST['con_pass'];

										$ol = "SELECT * FROM user WHERE id='$doc'";
										$ols = mysqli_query($connect,$ol);
										$row = mysqli_fetch_array($ols); 

										if (empty($old)) 
										{
											$error['p'] = "Enter Old Password";
										}
										elseif (empty($new)) 
										{
											$error['p'] = "Enter New Password";
										}
										elseif (empty($con)) 
										{
											$error['p'] = "Confirm New Password";
										}
										elseif ($old != $row['password']) 
										{
											$error['p'] = "Invalid Old Password";
										}
										elseif ($new != $con) 
										{
											$error['p'] = "Both The Passwords Do Not Match";
										}
										else
										{
											$query = "UPDATE user SET password='$new' WHERE id='$doc'";
											mysqli_query($connect,$query);
										}
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
								?>
									
								<form method="POST">
									<?php 
									echo $show;
									?>
									<div class="form-group">
										<label>Old Password</label>
										<input type="password" name="old_pass" class="form-control" autocomplete="off" placeholder="Enter Old Password"><br>
									</div>
									<div class="form-group">
										<label>New Password</label>
										<input type="password" name="new_pass" class="form-control" autocomplete="off" placeholder="Enter New Password"><br>
									</div>
									<div class="form-group">
										<label>Confirm New Password</label>
										<input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Confirm New Password">
									</div><br>
									<input type="submit" name="change_pass" class="btn btn-info" value="Change Password">
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