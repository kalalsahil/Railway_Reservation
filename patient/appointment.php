<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Book Appointment</title>
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
					<h5 class="text-center" style="color: #5d8989;">BOOK AN APPOINTMENT</h5><br>

					<?php
						$id = $_SESSION['patient'];
						$sel = mysqli_query($connect,"SELECT * FROM patient WHERE id='$id'");
						$row = mysqli_fetch_array($sel);

						$firstname = $row['firstname'];
						$surname = $row['surname'];
						$gender = $row['gender'];
						$contact = $row['contact'];

						if (isset($_POST['book'])) 
						{
							$date = $_POST['date'];
							$time = $_POST['time'];
							$sym = $_POST['sym'];

							if (empty($sym))
							{

							}
							else
							{
								$query = "INSERT INTO appointment(firstname,surname,gender,contact,appointment_date,appointment_time,symptoms,status,date_booked) VALUES('$firstname','$surname','$gender','$contact','$date','$time','$sym','Pending',NOW())";
								$res = mysqli_query($connect,$query);
								if ($res) 
								{
									echo "<script>alert('You Have Booked An Appointment.')</script>";
								}
							}
						}
					?>

					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<form method="POST">
									<label>Appointment Date</label>
									<input type="date" name="date" class="form-control"><br>

									<label>Appointment Time</label>
									<input type="time" name="time" class="form-control"><br>

									<label>Symptoms</label>
									<input type="text" name="sym" class="form-control" autocomplete="off" placeholder="What are the Symptoms?"><br>

									<input type="submit" name="book" class="btn btn-success" value="Book Appointment">
								</form>
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