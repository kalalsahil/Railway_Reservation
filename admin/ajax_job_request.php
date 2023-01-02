<?php

include("../include/connection.php");

$query = "SELECT * FROM resv WHERE status = 'PENDING' ORDER BY doj ASC";
$res = mysqli_query($connect,$query);


$output = "";

$output .="
	<table class='table table-bordered' style='border-radius: 10px; background-color: white; '>
		<tr>
			<th class='text-center'>Train Number</th>
			<th class='text-center'>Source Point</th>
			<th class='text-center'>Dropping Point</th>
			<th class='text-center'>Journey Date</th>
			<th class='text-center'>Seat Class</th>
			<th class='text-center'>Number of Tickets</th>
			<th class='text-center'>Total Fare</th>
			<th class='text-center'>Action</th>
		</tr>
";

if (mysqli_num_rows($res) < 1)
{
	$output .= "
		<tr>
		<td colspan='9' class='text-center'>No Job Requests Yet.</td>
		</tr>
	";
}

while ($row = mysqli_fetch_array($res)) 
{
	$output .="
		<tr>
		<td>".$row['trainno']."</td>
		<td>".$row['sp']."</td>
		<td>".$row['dp']."</td>
		<td>".$row['doj']."</td>
		<td>".$row['class']."</td>
		<td>".$row['nos']."</td>
		<td>".$row['tfare']."</td>
		<td>
			<div class='col-md-12'>
				<div class='row'>
					<div class='col-md-6'>
						<button id='".$row['id']."' class='btn btn-success approve'> Approve </button>
					</div>
					<div class='col-md-6'>
						<button id='".$row['id']."' class='btn btn-danger reject'> Reject </button>
					</div>
				</div
			</div>
		</td>
	";
}

$output .= "
		</tr>
	</table>
";

echo $output;
?>