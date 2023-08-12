<?php

session_start();
include 'connect.php';


$id = $_GET['updateid'];
$sql = "SELECT userId FROM users WHERE userId=$id";
$result = mysqli_query($connect,$sql);
$row=mysqli_fetch_assoc($result);
$userid = $row['userId'];



if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //get data from form
    $userid = $_POST['userid'];
    $programm = $_POST['programm'];
    $daysavailable = $_POST['daysavailable'];
    $shift = $_POST['shift'];    

    //sql query to insert data into table
    $sql = "INSERT INTO volunteers (userId,programm,daysavailable,shift) VALUES ('$userid','$programm','$daysavailable','$shift')";

    //execute query
    $result = mysqli_query($connect,$sql);

    //check if query was successful
    if($result){
        header('location:displayall.php?viewemail='.$email);
    } else{
        die(mysqli_error($connect));
    }
}
?>

<!--html code-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-custom navbar-expand-lg navbar-dark ">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav w-100">
            
            
            <li class="nav-item dropdown ml-auto">
              <a style="color:green;" class="nav-link dropdown-toggle active" href="#" 
                 id="navbarDropdownMenuLink" role="button" 
                 data-toggle="dropdown" aria-expanded="false">
                 
                    <?php 
        $id = $_SESSION['id'];
        $email = $_SESSION['email'];
        echo "$email";
        ?>     
    
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li>
                  <a class="dropdown-item" href="logout.php">Logout</a>
                </li>
              </ul>
            </li>

          </ul>
        </div>
      </div>
    </nav>

    <div class="row ">
    <div class="mx-auto col-15 col-md-8 col-lg-6 border border-dark p-10 mb-10">
    <form onsubmit="return validateForm()" class="registration" method="post"> <!--onsubmit="return validateForm()"-->
    
                <h2>Sign Up for Community Service</h2>

                <div class="form-group">
                <label for="uname">User Id: </label>
                <input class="form-control" type="text" name="userid" id="userid" value=<?php echo $userid?> readonly>
                </div>
                <div id="result_1"></div>

                <div class="form-group">
                <label>Select Program you'd like to enroll for</label>
                <select class="form-control" name="programm" id="programm" class="seelect">
                    <option>--Select Program--</option>
                    <option value="Elderly's Home Visit">Elderly's Home visit</option>
                    <option value="Hospital Visit">Hospital Visit</option>
                    <option value="Children's Home Visit">Children's Home visit</option>
                    <option value="Street Cleanup">Street Cleanup</option>
                    <option value="Animal Shelter Care Visit">Animal Shelter Care Visit</option>
                    <option value="Coach Leagues">Coach Little Leagues</option>
                </select>
                </div>

                <div class="form-group">
                <label>Select Days You'll be Available</label>
                <select class="form-control" name="daysavailable" id="daysavailable" class="seelect">
                    <option>--Select Day--</option>
                    <option value="Sunday">Sunday</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                </select>
                </div>
                
                <div class="form-group">
                <label>Select Shift</label>
                <select class="form-control" name="shift" id="shift" class="seelect">
                    <option>--Select Shift--</option>
                    <option value="Morning">Morning Shift(8am-12pm)</option>
                    <option value="Afternoon">Afternoon Shift(2pm-6pm)</option>
                </select>
                </div>
                

                <div class="form-group">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                    </div>
                </div>
                
                <div id="resultage"></div>

                
    
            </form>
    </div>
    </div>
    <style>

.navbar-custom {
    background-color: lightsteelblue !important;
    font-family: 'Roboto', sans-serif;
    font-weight: bold;
}
.nav-link:hover{
    color:white !important;
}
.dropdown-item:hover{
    color:#52ab98 !important;
}
</style>
    
  </body>
</html>
</body>
</html>