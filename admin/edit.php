<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Doctor's Data</title>
</head>
<body style="background-color: #d1e0e0;">
	<?php
		include("../include/connection.php");
		if (isset($_POST['update'])) 
		{
			$a = $_GET['id'];
			$salary = $_POST['salary'];

			$q = "UPDATE doctors SET salary = '$salary' WHERE id='$a'";

			mysqli_query($connect,$q);
		}
		include("../include/header.php");
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
					<h5 class="text-center" style="color: #5d8989;">EDIT DOCTOR'S DATA</h5><br>
					<?php
						if (isset($_GET['id'])) 
						{
							$id = $_GET['id'];

							$query = "SELECT * FROM doctors where id='$id'";
							$res = mysqli_query($connect,$query);

							$row = mysqli_fetch_array($res);
						}
					?>
					<div class="row">
						<div class="col-md-6" style="margin-left: 40px;">
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
										<td class="text-center">Date Registered</td>
										<td class="text-center"> <?php echo $row['data_reg']; ?> </td>
									</tr>
									<tr>
										<td class="text-center">Salary</td>
										<td class="text-center"> <?php echo $row['salary']; ?> </td>
									</tr>
								</table>
						</div>
						<div class="col-md-2"></div>
						<div class="col-md-3">
							<h5 class="text-center" style="margin-top: 35px;">Update Salary</h5><br>
							
							<form method="POST">
								<label>Enter Doctor's Salary</label>
								<input type="number" name="salary" class="form-control" autocomplete="off" placeholder="Enter Doctor's Salary" value="<?php echo $row['salary']?>"><br>
								<input type="submit" name="update" class="btn btn-info" value="Update Salary">
								
							</form>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>