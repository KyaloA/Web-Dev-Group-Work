<?php
session_start();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
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


    
    

    <div class="">
    <h2 style="text-align: center;">User Details</h2>
    </div>


    <div class="container">
    <table class="table table-bordered table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">User Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Gender</th>
      <th scope="col">User Type</th>
      <th scope="col">Update</th>
      <th scope="col">Community Service</th>
    </tr>
  </thead>
  <tbody>
  <?php

use function PHPSTORM_META\type;
    include 'connect.php';
    
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connect,$sql);


    

    if($result) {
        $row = mysqli_fetch_assoc($result);
            $id = $row['userId'];
            $username = $row['username'];
            $email = $row['email'];
            $phone = $row['phone'];
            $gender =$row['gender'];
            $userrole = $row['userrole'];


            echo "<tr>
            <th scope='row'>$id</th>
            <td>$username</td>
            <td>$email</td>
            <td>$phone</td>
            <td>$gender</td>
            <td>$userrole</td>
            <td><button class='btn btn-success'><a class='text-light' href='editprofile.php?updateid=$id'>Update</a></button></td>
            <td><button class='btn btn-success'><a class='text-light' href='volunteer.php?updateid=$id'>Volunteer</a></button></td>  
          </tr>";

          
        }

        

?>
  </tbody>
</table>
    </div>

    <div class="">
    <h2 style="text-align: center;">Community Service Details</h2>
    </div>


    <div class="container">
    <table class="table table-bordered table-hover">
  <thead class="thead-dark">
    <tr>
    <th scope="col">UserId</th>
      <th scope="col">Programm</th>
      <th scope="col">Available days</th>
      <th scope="col">Shift</th>
    </tr>
  </thead>
  <tbody>
  <?php


    include 'connect.php';
    
    $email = $_SESSION['id'];
    $sql = "SELECT * FROM volunteers WHERE userId = '$id'";
    $result = mysqli_query($connect,$sql);


    

    if($result) {
        while($row = mysqli_fetch_assoc($result)){;
            $id = $row['userId'];
            $programm = $row['programm'];
            $daysavailable = $row['daysavailable'];
            $shift = $row['shift'];

            echo "<tr>
            <th scope='row'>$id</th>
            <td>$programm</td>
            <td>$daysavailable</td>
            <td>$shift</td>  
            
          </tr>";

        }
        }

        

?>
  </tbody>
</table>
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

