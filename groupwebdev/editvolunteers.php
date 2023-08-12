<?php

include 'connect.php';

//start session
session_start();

//check if user is logged in
$id = $_GET['updateid'];

//sql query to get info from database
$sql = "SELECT userId,programm,daysavailable,shift FROM volunteers WHERE userId=$id";

//execute query
$result = mysqli_query($connect,$sql);
$row=mysqli_fetch_assoc($result);
$programm= $row['programm'];
$daysavailable = $row['daysavailable'];
$shift = $row['shift'];



if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //get data from form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    //encrypt password
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $gender = $_POST['gender'];

    

    //sql query to insert data into table
    $sql = "UPDATE volunteers SET programm='$programm', daysavailable='$daysavailable',shift='$shift' WHERE userId=$id";
    
    //execute query
    $result = mysqli_query($connect,$sql);

    //check if query was successful
    if($result){
        echo "Updated successfully";
       header('location:displayall.php');
    } else{
        die(mysqli_error($connect));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
            <li class="nav-item">
              <a class="nav-link" style="color: white;" aria-current="page" href="display.php">Home</a>
            </li>
            
            <li class="nav-item dropdown ml-auto">
              <a class="nav-link dropdown-toggle active" href="#" 
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

    <!--Table Header-->

    <div class="">
      <h2 style="text-align: center; text-decoration:underline;">Update Account</h2>
    </div>

    <div class="row ">
    <div class="mx-auto col-15 col-md-8 col-lg-6 border border-dark p-10 mb-10">
    <div class="background"> 
        <form onsubmit="return validateForm()" class="registration" method="post"> <!--onsubmit="return validateForm()"-->
    
        <h2>Sign Up for Community Service</h2>

        <div class="form-group">

        <div class="form-group">
        <label>Select Program you'd like to enroll for</label>
        <select class="form-control" name="programm" id="programm" class="seelect">
            <option>--Select Program--</option>
            <option value="Elderly">Elderly's Home visit</option>
            <option value="Hospital">Hospital Visit</option>
            <option value="Children">Children's Home visit</option>
            <option value="Street Cleanup">Street Cleanup</option>
            <option value="Animal Shelter">Animal Shelter Care Visit</option>
            <option value="Coach">Coach Little Leagues</option>
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
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
    </div>

<div id="resultage"></div>

                
    
        </form>
    </div>
    </div>
    </div>
   

    <style>
        .navbar-custom {
        background-color:#2b6770 ;
        font-family: 'Roboto', sans-serif;
        font-weight: bold;
        }
        .nav-link:hover{
        color:#52ab98 !important;
        }
        .dropdown-item:hover{
        color:#52ab98 !important;
        }
    </style>
    


</body>
</html>