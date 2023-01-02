<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
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
            include("../admin/sidenav.php");
            include("../include/connection.php");

            ?>
        </div>

        <div class="col-md-10" style=" margin-top: 50px; position:fixed; left:240px; height:90%; overflow-y:auto;">
             <div class="container-fluid">      
                    <div class="row">
                        
                        <div class="col-md-6">
                            <?php
                            if (isset($_GET['id']))
                             {
                                 $id = $_GET['id'];

                                 $query = "DELETE FROM admin WHERE id='$id'";

                                 mysqli_query($connect,$query);
                             }

                            if (isset($_POST['Add']))
                            {
                                $uname = $_POST['uname'];
                                $pass = $_POST['pass'];
                                $image = $_FILES['img']['name'];

                                $error = array();

                                if (empty($uname)) 
                                {
                                    $error['u'] = "Enter Admin Username";
                                }
                                elseif (empty($pass)) 
                                {
                                    $error['u'] = "Enter Admin Password";
                                }
                                elseif (empty($image)) 
                                {
                                    $error['u'] = "Enter Admin Picture";
                                }
                                if (count($error) == 0) 
                                {
                                    $q = "INSERT INTO admin (name,password,profile) VALUES ('$uname','$pass','$image')";

                                    $result = mysqli_query($connect,$q);
                                    $_POST['Add']="";
                                    $uname="";
                                    $_POST['uname']="";

                                    
                                    if ($result) 
                                    {
                                        move_uploaded_file($_FILES['img']['tmp_name'], "../admin/img/$image");
                                    }
                                    else
                                    {

                                    }
                                }
                            }

                            if (isset($error['u'])) 
                            {
                                $er = $error['u'];

                                $show = "<h5 class='text-center alert alert-danger'>$er</h5>";
                            }
                            else
                            {
                                $show = ""; 
                            }


                            ?>

                            <h5 class="text-center" style="color: #5d8989;">ADD A NEW ADMIN</h5>
                            <form method="post" enctype="multipart/form-data"> 
                                <div>
                                    <?php
                                    echo $show;
                                    ?>
                                </div>
                                <div class="form-group">
                                   <label>Username</label>
                                   <input type="text" name="uname" class="form-control" autocomplete="off">
                                </div>  
                                <div class="jumbotron m-3"></div>
                                <div class="form-group">
                                   <label>Password</label>
                                   <input type="password" name="pass" class="form-control">
                                 </div>
                                <div class="jumbotron m-3"></div>
                                <div class="form-group">
                                   <label>Add Admin Picture</label>
                                   <input type="file" name="img" class="form-control">
                                </div>
                                <div class="jumbotron m-3"></div><br>
                                <input type="submit" name="Add" value="Add New Admin" class="btn btn-success">
                            </form>
                        </div>

                        <div class="col-md-6">
                            <h5 class="text-center" style="color: #5d8989;">ALL ADMINS</h5><br>


                            <?php
                            $ad = $_SESSION['admin'];
                            $query = "SELECT * FROM admin WHERE id !='$ad'";
                            $res = mysqli_query($connect,$query);
                            $output ="
                                 <table class='table content table table-bordered shadow' style='border-radius: 10px; background-color: white; '>
                                 <tr>
                                    <th class='text-center'>ID</th>
                                    <th class='text-center'>Username</th>
                                    <th class='text-center' style='width: 10%;'>Action</th>
                                 <tr>   
                            ";
                            if (mysqli_num_rows($res) < 1) 
                            {
                               $output .= "<tr><td colspan='3' class='text-center'>NO NEW ADMIN</h5></td><tr>";
                            }
                            while ($row = mysqli_fetch_array($res)) 
                            {
                                $id = $row['id'];
                                $username = $row['name'];


                                $output .="
                                     <tr>
                                        <td class='text-center'>$id</td>
                                        <td class='text-center'>$username</td>
                                        <td>
                                            <a href='Admin.php?id=$id'><button id='$id' class='btn btn-danger remove'>Remove</button></a>
                                        </td>
                                     </tr>
                                ";

                            }

                            $output .=" 
                                </tr>
                            </table>
                            ";

                             echo $output;
                             ?>

                </div>
            </div>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>