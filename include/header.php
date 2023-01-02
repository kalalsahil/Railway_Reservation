<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
    <nav style="background-color: skyblue;" class="navbar navbar-expand-lg navbar-info bd-info" >
        
        
        <h5 style="color: black; margin-left: 15px;">Railway Reservation System</h5>

        <div class="mr-auto collapse navbar-collapse justify-content-end">
    
        <ul class="navbar-nav">
	      <?php

	        if (isset($_SESSION['admin']))
            {

              $user = $_SESSION['user_name'];	
	            echo '
	            <li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'
                </a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a>
	            </li>
                ';
	        }
            elseif (isset($_SESSION['doctor'])) 
            {
                $user = $_SESSION['user_id']; 
                echo '
                <li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'
                </a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a>
                </li>
                ';
            }
            
            else
            {
	        echo '
               
                <li class="nav-item"><a href="admin.php" class="nav-link text-white">ADMIN</a>
	            </li>
                <li class="nav-item"><a href="userlogin.php" class="nav-link text-white">LOGIN</a>
	            </li>
                <li class="nav-item"><a href="index.php" class="nav-link text-white">HOME</a>
                </li>';
	        }
	        ?>
        </ul>
    </div>
    </nav>
</body>
</html>