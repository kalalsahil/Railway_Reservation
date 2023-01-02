<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">       
	<title>Check Patient Appointment</title>     
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
					<h5 class="text-center" style="color: #5d8989;">CHECK PATIENT APPOINTMENT</h5><br>

					<?php
						if (isset($_GET['id'])) 
						{
							$id = $_GET['id'];
							$query = "SELECT * FROM appointment WHERE id='$id'";
							$res = mysqli_query($connect,$query);
							$row = mysqli_fetch_array($res);
						}
					?>

					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<table class='table table-bordered shadow' style='border-radius: 10px; background-color: white;'>
									<tr>
										<th class="text-center" colspan="2" style="font-size: 0.5cm;">APPOINTMENT DETAILS</th>
									</tr>
									<tr>
										<td class="text-center" width="50%">Firstname</td>
										<td class="text-center"> <?php echo $row['firstname']; ?> </td>
									</tr>
									<tr>
										<td class="text-center" width="50%">Surname</td>
										<td class="text-center"> <?php echo $row['surname']; ?> </td>
									</tr>
									<tr>
										<td class="text-center" width="50%">Appointment Date</td>
										<td class="text-center"> <?php echo $row['appointment_date']; ?> </td>
									</tr>
									<tr>
										<td class="text-center" width="50%">Appointment Time</td>
										<td class="text-center"> <?php echo $row['appointment_time']; ?> </td>
									</tr>
									<tr>
										<td class="text-center" width="50%">Symptoms</td>
										<td class="text-center"> <?php echo $row['symptoms']; ?> </td>
									</tr>
								</table>
							</div>
							<div class="col-md-6">
								<h5 class="text-center">INVOICE</h5>

								<?php
									if (isset($_POST['send']))
									{
										$fee = $_POST['fee'];
										$des = $_POST['des'];
										
										if (empty($fee))
										{

										}
										elseif (empty($des))
										{

										}
										else
										{
											$idd = $_SESSION['doctor'];
											$q = "SELECT * FROM doctors WHERE id='$idd'";
											$res = mysqli_query($connect,$q);
											$row1 = mysqli_fetch_array($res);
											$doc = $row1['firstname'];  // aditya
											$patient = $row['firstname']; // Aditya
											$query = "INSERT INTO income(id,doctor,patient,date_discharge,amount_paid,description) VALUES('$id','$doc','$patient',NOW(),'$fee','$des')";
											$result = mysqli_query($connect,$query);
											if ($res)
											{
												echo "<script>alert('You Have Sent The Invoice')</script>";
												mysqli_query($connect,"UPDATE appointment SET status='Discharged' WHERE id='$id'");
												mysqli_query($connect,"UPDATE appointment SET doc_alloted='$doc' WHERE id='$id'");
											}
										}
									}
								?>

								<form method="POST">
									<label>Fees</label>
									<input type="number" name="fee" class="form-control" autocomplete="off" placeholder="Enter Amount To Be Paid By The Patient"><br>

									<label>Description</label>
									<input type="text" name="des" class="form-control" autocomplete="off" placeholder="Enter Description"><br>

									<input type="submit" name="send" class="btn btn-success" value="Send">
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