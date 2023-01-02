<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Travel Summary</title>
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
					<div class="col-md-3"></div>
					<div class="col-md-6">
					<h5 class="text-center" style="color: #5d8989;">TRAVEL SUMMARY</h5><br>

					<?php
						$query = "SELECT * FROM user INNER JOIN resv where user.id = resv.id";
						$res = mysqli_query($connect,$query);

						$output = "";

						$output .= "
							<table class='table table-bordered shadow' style='border-radius: 10px; background-color: white; '>
								<tr>
									<th class='text-center'>Train Number</th>
									<th class='text-center'>Source Point</th>
									<th class='text-center'>Destination Point</th>
									<th class='text-center'>Journey Date</th>
									<th class='text-center'>Number of Tickets</th>
									<th class='text-center'>class</th>
									<th class='text-center'>Total Fare</th>
									<th class='text-center'>Action</th>
								</tr>";
						if (mysqli_num_rows($res) < 1) 
						{
							$output .="
								<tr>
									<td colspan='5' class='text-center'>No Train requested</td>
								</tr>";
						}
						while ($row = mysqli_fetch_array($res))
						{
							$output .="
								<tr>
									<td class='text-center'>".$row['trainno']."</td>
									<td class='text-center'>".$row['sp']."</td>
									<td class='text-center'>".$row['dp']."</td>
									<td class='text-center'>".$row['doj']."</td>
									<td class='text-center'>".$row['nos']."</td>
									<td class='text-center'>".$row['class']."</td>
									<td class='text-center'>".$row['tfare']."</td>
									<td class='text-center'>
										<a href='discharge.php?id=".$row['id']."'>
										<button class='btn btn-info' style='display: block; margin: auto;'>Check</button>
										</a>
									</td>";
						}
						$output .= "
								</tr>
							</table>";
						echo $output;
					?>
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