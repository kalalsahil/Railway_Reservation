<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User's Dashboard</title>
    <style>
        div{
            margin: auto;
        }
    </style>

</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<body style="background-color: #d1e0e0;">
	<?php
		include("../include/header.php");
		include("../include/connection.php"); 
	?>
    <div>
        <form method="POST">
            <div class="form-group">
                <label for="">Name</label>
                <input type='text' name="name" placeholder='Enter Name'></input><br>
            </div>
            <div class="form-group">
                <label for="">Phone Number</label>
                <input type='integer' name="contact" placeholder='Mobile number'></input><br>
            </div>  
            <div class="form-group">
                <label for="">Number of Seats</label>
                <input type='integer' name="nos" placeholder='number'></input><br>
            </div>
            
            <div class="form-group">
                <select name="class" id="class">
                    <label>Seat Class</label>
                    <option value="1A">1A</option>
                    <option value="2A">2A</option>
                    <option value="3A">3A</option>
                    <option value="SL">SL</option>
                </select>
            </div>
        
    
            </form>
            From : <?php echo $_SESSION['FROM']; ?> <br>   
            To: <?php echo $_SESSION['TO']; ?> <br>
            Date: <?php echo $_SESSION['date']; ?> <br>
      
            <a href="payment.php"><button class="btn btn-primary" color="Danger" name='confirm'>Confirm Ticket</button>
        
    </div>
    <?php
        if (isset($_POST['confirm']))
        {
            $name = $_POST['name'];
            $number = $_POST['contact'];
		    $nos = $_POST['nos'];
            $class = $_POST['class'];
        }
        $FROM = $_SESSION['FROM'];
        $TO = $_SESSION['TO'];
        $date = $_SESSION['date'];
        
        $query = "INSERT INTO reservation (sp,dp,doj) values ('$FROM','$TO','$date')";

		$result = mysqli_query($connect,$query);

        
        
    ?>
    