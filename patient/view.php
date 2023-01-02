<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Invoice</title>
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
				<div class="col-md-10" style="margin-top: 50px; position:fixed; left:230px; height:90%; overflow-y:auto;">
					<h5 class="text-center" style="color: #5d8989;">VIEW INVOICE</h5><br>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">

								<?php
									if (isset($_GET['id'])) 
									{
										$id = $_GET['id'];
										$query = "SELECT * FROM income WHERE id='$id'";
										$res = mysqli_query($connect,$query);
										$row = mysqli_fetch_array($res);
									}
								?>

								<table class='table table-bordered shadow' style='border-radius: 10px; background-color: white;'>
									<tr>
										<th class="text-center" colspan="2" style="font-size: 0.5cm;">Invoice Details</th>
									</tr>

									<tr>
										<td class="text-center" width="50%">Doctor</td>
										<td class="text-center"><?php echo $row['doctor']; ?></td>
									</tr>

									<tr>
										<td class="text-center" width="50%">Patient</td>
										<td class="text-center"><?php echo $row['patient']; ?></td>
									</tr>

									<tr>
										<td class="text-center" width="50%">Amount To Be Paid</td>
										<td class="text-center"><?php echo $row['amount_paid']; ?></td>
									</tr>

									<tr>
										<td class="text-center" width="50%">Description</td>
										<td class="text-center"><?php echo $row['description']; ?></td>
									</tr>
								</table>
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