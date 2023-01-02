<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Patient Dashboard</title>
</head>
<body style="background-color: #d1e0e0;">

	<?php
		include("../include/header.php");
		include("../include/connection.php");
	?>

	<style type="text/css">
	.center 
	{
		margin: auto;
		width: 60%;
		padding: 5px;
	}
	</style>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="position:fixed; margin-left: -15px; height: 100%;">

					<?php
						include("sidenav.php");
					?>

				</div>
				<div class="col-md-10" style="margin-top: 30px; position:fixed; left:230px; height:90%; overflow-y:auto;">
					<div class="center"><h3 class="my-2 text-center" style="color: #5d8989;">PATIENT DASHBOARD</h3><br></div>
					<div class="row" style="margin-left: 205px;">
					<div class="col-md-3 my-2 bg-info mx-2" style="height: 120px;">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<h5 class="my text-center" style="margin-top: 45px; font-size: 0.5cm;">MY PROFILE</h5>
										</div>
										<div class="col-md-4">
											<a href="profile.php"><i class="fa fa-user-circle fa-3x" style="color: white; margin-top: 30px;"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3 my-2 bg-warning mx-2" style="height: 120px;">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<h5 class="my" style="margin-left: 10px; margin-top: 30px; font-size: 0.5cm;">BOOK AN</h5>
											<h5 class="my" style="margin-left: 10px; font-size: 0.5cm;">APPOINTMENT</h5>
										</div>
										<div class="col-md-4">
											<a href="appointment.php"><i class="fa fa-calendar fa-3x" style="color: white; margin-top: 30px;"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3 my-2 bg-success mx-2" style="height: 120px;">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<h5 class="my text-center" style="margin-top: 45px; font-size: 0.5cm;">MY INVOICE</h5>
										</div>
										<div class="col-md-4">
											<a href="invoice.php"><i class="fas fa-file-invoice-dollar fa-3x" style="color: white; margin-top: 30px;"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>

</body>
</html>