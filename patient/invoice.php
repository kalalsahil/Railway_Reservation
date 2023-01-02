<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Invoice</title>
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
						include("sidenav.php")
					?>

				</div>
				<div class="col-md-10" style="margin-top: 50px; position:fixed; left:230px; height:90%; overflow-y:auto;">
					<h5 class="text-center" style="color: #5d8989;">MY INVOICE</h5><br>
					
					<?php 
						$pat = $_SESSION['patient'];
						$query = "SELECT * FROM patient WHERE id='$pat'";
						$res = mysqli_query($connect,$query);
						$row = mysqli_fetch_array($res);
						$fname = $row['firstname'];
						$querys = mysqli_query($connect,"SELECT * FROM income WHERE patient='$fname'");
						$output = "";

						$output .="
							<table class='table table-bordered shadow' style='border-radius: 10px; background-color: white; '>
								<tr>
									<th class='text-center'>ID</th>
									<th class='text-center'>Doctor</th>
									<th class='text-center'>Patient</th>
									<th class='text-center'>Date Discharged</th>
									<th class='text-center'>Amount To Be Paid</th>
									<th class='text-center'>Description</th>
									<th class='text-center'>Action</th>
								</tr>";
						if (mysqli_num_rows($querys) < 1) 
						{
							$output .="
								<tr>
									<td colspan='7' class='text-center'>No New Invoices</td>
								</tr>";
						}
						while ($row = mysqli_fetch_array($querys))
						{
							$output .="
								<tr>
									<td class='text-center'>".$row['id']."</td>
									<td class='text-center'>".$row['doctor']."</td>
									<td class='text-center'>".$row['patient']."</td>
									<td class='text-center'>".$row['date_discharge']."</td>
									<td class='text-center'>".$row['amount_paid']."</td>
									<td class='text-center'>".$row['description']."</td>
									<td class='text-center'>
										<a href='view.php?id=".$row['id']."'>
										<button class='btn btn-info' style='display: block; margin: auto;'>View</button>
										</a>
									</td>
								</tr>";
						}
						$output .= "
							</tr>
						</table>";
						echo $output;
 					?>

				</div>
			</div>
		</div>
	</div>
</body>
</html>