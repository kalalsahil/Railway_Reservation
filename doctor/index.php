<?php
    session_start();
    
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User's Dashboard</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<body style="background-color: #d1e0e0;">
	<?php
		include("../include/header.php");
		include("../include/connection.php");
	?>
	<style type="text/css">
	.center 
	{
		margin: auto 140px;
		width: 60%;
		padding: 5px;
	}
	.myForm input {
    text-align: center;
    display: inline;
    width: 300px;
    padding: 1px;
    border: 2px solid rgb(0, 0, 0);
    margin: 3px auto;
    font-size: 26px;
    font-family: 'Baloo Bhaijaan 2', cursive;
    border-radius: 23px;
	}
	</style>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="position:fixed; margin-left: -15px; height: 100%;">
					
					<?php
					include("../doctor/sidenav.php");
					?>

				</div>
				<div class="col-md-10" style="margin-top: 30px; position:fixed; left:200px; height:90%; overflow-y:auto;">
					<!--<div class="container-fluid">-->
						<div class="center"><h3 class="text-center my-2" style="color: #5d8989;"> Search Train</h3><br></div>
						<div class="row" style="margin-left: 20px;">
						
				<div class="myForm">
					<form action="" id="form1" method = "POST">
    					<input type="text" class= “myInput” name="FROM" placeholder="DEPARTURE"  id="live_search">
    					<input type="phone" class= “myInput” name="TO" placeholder="DESTINATION">
    					<input type="date" class= “myInput” name="date" placeholder="DATE">
					
				</div>
				<button type="submit" form="form1" value="Submit" class="btn btn-primary">Submit</button>
				</form>
				<table>
					<thead>
						<tr>
							<th>Train Number</th>
							<th>Train Name</th>
							<th>Source Station</th>
							<th>Destination Station</th>
							<th> Book </th>
						</tr>
					</thead>
					<tbody>
						<?php
							if(isset($_POST['FROM'])&&isset($_POST['TO'])&&isset($_POST['date']))
							{
								$FROM = $_POST['FROM'];
								$TO = $_POST['TO'];
								$date = $_POST['date'];
								
								$_SESSION['FROM']=$FROM;
    							$_SESSION['TO']=$TO;
    							$_SESSION['date']=$date;

								$d = date('l', strtotime($date));
								$query = "SELECT MAX(t.Train_No) Train_No, d.Train_Name, d.Source_Station_Name,d.Destination_Station_Name
								FROM
								(
								  SELECT s.Train_No
									FROM table_schedule s JOIN table_schedule e
									  ON s.Train_No = e.Train_No
								   WHERE s.Station_Name = '$FROM' 
									 AND e.Station_Name = '$TO' 
									 AND s.SN < e.SN
								) q JOIN train_info d
									ON q.Train_No = d.Train_No JOIN train_info t
									ON q.Train_No = t.Train_No WHERE t.days='$d'
								 GROUP BY q.Train_No";
								$query_run = mysqli_query($connect, $query);
								
								if(mysqli_num_rows($query_run)>0)
								{
									foreach($query_run as $row)
									{
										// echo $row['Train_Name'];
										?>
										<tr>
											<td><?=$row['Train_No'];?></td>
											<td><?=$row['Train_Name'];?></td>
											<td><?=$row['Source_Station_Name'];?></td>
											<td><?=$row['Destination_Station_Name'];?></td>
											<td>
												
												<a href = "booking.php" name = 'book'><button class="btn btn-success">BOOK</button></a>
												
											</td>
										</tr>
										<?php
									}
								}
								else
								{
									echo "No trains found";
								}
							}
						?>		
					</tbody>					
				</table>			
							
						
					</div>					
				</div>
			</div>
		</div>
	</div>
</body>
</html>