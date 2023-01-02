<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Patient Details</title>
</head>
<body style="background-color: #d1e0e0;">

	<?php
		include("../include/header.php");
		include("../include/connection.php");
	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="position:fixed; margin-left: -15px; height: 100%;">
					
					<?php
						include("sidenav.php");
					?>

				</div>
				<div class="col-md-10" style="position:fixed; left:230px; height:90%; overflow-y:scroll;">
					<h5 class="text-center" style="color: #5d8989; margin-top: 50px;">VIEW PATIENT DETAILS</h5><br>

					<?php
						if (isset($_GET['id']))
						{
							$id = $_GET['id'];
							$query = "SELECT * FROM patient WHERE id='$id'";
							$res = mysqli_query($connect,$query);
							$row = mysqli_fetch_array($res);
						}
					?>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								
								<?php
								echo "<img src='../patient/img/".$row['profile']."' class='col-md-6' height='250px;' style='margin-left: 150px;'>"
								?>
								<table class="table table-bordered shadow" style="border-radius: 10px; background-color: white; margin-top: 30px;">
									<tr>
										<th class="text-center" colspan="2" style="font-size: 0.6cm;">Details</th>
									</tr>
									<tr>
										<td class="text-center">Firstname</td>
										<td class="text-center"> <?php echo $row['firstname']; ?> </td>
									</tr>
									<tr>
										<td class="text-center">Surname</td>
										<td class="text-center"> <?php echo $row['surname']; ?> </td>
									</tr>
									<tr>
										<td class="text-center">Username</td>
										<td class="text-center"> <?php echo $row['username']; ?> </td>
									</tr>
									<tr>
										<td class="text-center">Email</td>
										<td class="text-center"> <?php echo $row['email']; ?> </td>
									</tr>
									<tr>
										<td class="text-center">Contact Number</td>
										<td class="text-center"> <?php echo $row['contact']; ?> </td>
									</tr>
									<tr>
										<td class="text-center">Gender</td>
										<td class="text-center"> <?php echo $row['gender']; ?> </td>
									</tr>
									<tr>
										<td class="text-center">Age</td>
										<td class="text-center"> <?php echo $row['age']; ?> </td>
									</tr>
									<tr>
										<td class="text-center">Date Registered</td>
										<td class="text-center"> <?php echo $row['date_reg']; ?> </td>
									</tr>
									<tr>
										<td class="text-center">Past Medical History</td>
										<td class="text-center"> <?php echo $row['prev_med']; ?> </td>
									</tr>
							</div>
							<div class="col-md-3"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>