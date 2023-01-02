<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Raise A Query</title>
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
				<div class="col-md-10" style="position:fixed; left:230px; height:90%; overflow-y:auto;">
					<div class="col-md-12">
							<div class="row">
								<div class="col-md-3"></div>
								<div class="col-md-6 my-5 bg-info">	
							<?php
								if (isset($_POST['send'])) 
								{
									$title = $_POST['title'];
									$message = $_POST['message'];

									if (empty($title)) 
									{
										
									}
									elseif (empty($message)) 
									{
										
									}
									else
									{
										$user = $_SESSION['user_patient'];
										$id = $_SESSION['patient'];
										$query = "INSERT INTO report(id,title,message,username,date_sent) VALUES('$id','$title','$message','$user',NOW())";
										$res = mysqli_query($connect,$query);
										if ($res)
										{
											echo "<script>alert('You Have Sent Your Report')</script>";
										}
									}
								}
							?>
									<h5 class="text-center my-3"> SEND A QUERY TO THE HOSPITAL MANAGEMENT </h5><br>
									<form method="POST">
										<label>Title</label>
										<input type="text" name="title" autocomplete="off" class="form-control" placeholder="Enter Title of the Report"><br>

										<label>Message</label>
										<input type="text" name="message" class="form-control" autocomplete="off" placeholder="Enter Message"><br>

										<input type="submit" name="send" value="Send Query" class="btn btn-success" style="margin-bottom: 10px;">
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