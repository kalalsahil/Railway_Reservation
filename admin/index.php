<?php
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
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
			<div class="col-md-10" style="margin-top: 20px;  position:fixed; left:230px; height:90%; overflow-y:auto;">
				<div class="center"><h3 class="my-2 text-center" style="color: #5d8989;">ADMIN DASHBOARD</h3><br></div>
				<div class="col-md-12 my-1">
					<div class="row" style="margin-left: 210px;">
					<div class="col-md-3 bg-success mx-2" style="height: 130px;">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-8">
									<?php
									 $ad = mysqli_query($connect,"SELECT * from admin");
									 $num = mysqli_num_rows($ad);
									 ?>
									<h5 class="my-2 text-white" style="font-size: 0.7cm;"><?php echo $num; ?></h5>
									<h5 class="text-white" style="font-size: 0.5cm;">Total</h5>
									<h5 class="text-white" style="font-size: 0.5cm;">Admins</h5>
								</div>
								<div class="col-md-4">
									<a href="Admin.php"><i class="fa fa-address-card fa-3x my-4" style="color: white;"></i></a>
								</div>
							</div>
						</div>
					</div>

						

						
						

						<div class="col-md-3 bg-warning mx-2 my-2" style="height: 130px;">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-8">
										<?php

											$job = mysqli_query($connect,"SELECT * FROM resv WHERE status='Pending'");

											$num1 = mysqli_num_rows($job);

										?>
										<h5 class="my-2 text-white" style="font-size: 0.7cm;"><?php echo $num1; ?></h5>
										<h5 class="text-white" style="font-size: 0.5cm;">Total</h5>
										<h5 class="text-white" style="font-size: 0.5cm;">Booking Requests</h5>
									</div>
									<div class="col-md-4">
									<a href="job_request.php"><i class="fa fa-book-open fa-3x my-4" style="color: white;"></i></a>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-3 bg-success mx-2 my-2" style="height: 130px;">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-8">

										<?php
											$in = mysqli_query($connect,"SELECT sum(tfare) AS profit FROM resv where status='BOOKED'");
											$row = mysqli_fetch_array($in);
											$inc = $row['profit'];
										?>

										<h5 class="my-2 text-white" style="font-size: 0.7cm;"> <?php echo $inc; ?> </h5>
										<h5 class="text-white" style="font-size: 0.5cm;">Total</h5>
										<h5 class="text-white" style="font-size: 0.5cm;">Income</h5>
									</div>
									<div class="col-md-4">
									<a href="#"><i class="fa fa-money-check-alt fa-3x my-4" style="color: white;"></i></a>
									</div>
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