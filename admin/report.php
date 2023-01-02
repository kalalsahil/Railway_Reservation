<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Total Reports</title>
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
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<h5 class="text-center" style="color: #5d8989;">TOTAL QUERIES</h5><br>

								<?php
									$query = "SELECT * FROM report ORDER BY date_sent";
									$res = mysqli_query($connect,$query);

									$output = "";

									$output .= "
										<table class='table table-bordered shadow' style='border-radius: 10px; background-color: white;'>
											<tr>
												<th class='text-center'>ID</th>
												<th class='text-center'>Username</th>
												<th class='text-center'>Title</th>
												<th class='text-center'>Message</th>
												<th class='text-center'>Date Received</th>
											</tr>";
									if (mysqli_num_rows($res) < 1) 
									{
										$output .= "
											<tr>
											<td colspan='5' class='text-center'>No Queries Yet.</td>
											</tr>
										";
									}
									while($row = mysqli_fetch_array($res))
									{
										$output .= "
											<tr>
												<td class='text-center'>".$row['id']."</td>
												<td class='text-center'>".$row['username']."</td>
												<td class='text-center'>".$row['title']."</td>
												<td class='text-center'>".$row['message']."</td>
												<td class='text-center'>".$row['date_sent']."</td>";
									}
									$output .= "
											</tr>
										</table>";
									echo $output;
								?>
						<div class="col-md-2"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>