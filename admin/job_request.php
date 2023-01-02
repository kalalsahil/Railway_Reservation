<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Booking Requests</title>
</head>
<body style="background-color: #d1e0e0;">

	<?php
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
					<h5 class="text-center my" style="color: #5d8989;"> BOOKING REQUESTS </h5><br>
					<div id="show"></div>
				</div>
			</div>
		</div>
		
	</div>
	<script type="text/javascript">
		$(document).ready(function()
		{
			show();
			function show()
			{
				$.ajax({
					url:"ajax_job_request.php",
					method:"POST",
					success:function(data)
					{
						$("#show").html(data);
					}
				});
			}
			$(document).on('click','.approve',function()
			{
				var id = $(this).attr("id");
				$.ajax({
					url:"ajax_approve.php",
					method:"POST",
					data:{id:id},
					success:function(data)
					{
						show();
					}
				});
			});
			$(document).on('click','.reject',function()
			{
				var id = $(this).attr("id");
				$.ajax({
					url:"ajax_reject.php",
					method:"POST",
					data:{id:id},
					success:function(data)
					{
						show();
					}
				});
			});
		})
	</script>

</body>
</html>