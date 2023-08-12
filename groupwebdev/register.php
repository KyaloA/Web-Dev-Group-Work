<?php
include 'connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //get data from form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    //encrypt password
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $gender =$_POST['gender'];
    $userrole = $_POST['userrole'];

    

    //sql query to insert data into table
    $sql = "INSERT INTO users (username,email,phone,password,gender,userrole) VALUES ('$username','$email','$phone','$password','$gender','$userrole')";
    //$sql = "INSERT INTO users (email,password) VALUES ('$email','$password')";

    //execute query
    $result = mysqli_query($connect,$sql);

    //check if query was successful
    if($result){
        header('location:login.php');
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
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
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
   
  <nav class="navbar navbar-custom navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav w-100">
            <li class="nav-item">
              <a class="nav-link" style="color: white;" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color: white;" href="about.php">About Us</a>
            </li>
            <li class="nav-item ml-auto">
              <a class="nav-link active" style="color: white;" href="register.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color: white;" href="login.php">Login</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>

    <div class="row ">
    <div class="mx-auto col-15 col-md-8 col-lg-6 border border-dark p-10 mb-10">
    <form onsubmit="return validateForm()" class="registration" method="post"> <!--onsubmit="return validateForm()"-->
    
                <h2>Sign Up for Registration</h2>

                <div class="form-group">
                <label for="uname">User Name: </label>
                <input class="form-control" type="text" name="username" id="uname" placeholder="Please enter your name">
                </div>
                <div id="result_1"></div>

                <div class="form-group">
                <label for="emad">Email Address: </label>
                <input class="form-control" type="email" name="email" id="emad" placeholder="Please enter your email address">
                <div id=""></div>
                </div>

                <div class="form-group">
                <label>Phone Number: </label>
                <input class="form-control" type="text" name="phone" id="pnum" placeholder="Please enter your phone number">
                <div id="result_2"></div>
                </div>

                <div class="form-group">
                <label>Password: </label>
                <input class="form-control" type="password" name="password" id="pwd" placeholder="Enter Password">
                <div id="result_3"></div>
                </div>

                <div class="form-group">
                <label>Confirm Password: </label>
                <input class="form-control" type="password" name="pwdc" id="pwdc" placeholder="Confirm Password">
                <div id="result_4"></div>
                </div>

                <div class="form-group">
                <label>Gender: </label>
                <select class="form-control" name="gender" id="gender" class="seelect">
                    <option>--Select Gender--</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                </div>

                <div class="form-group">
                <label>User Role: </label>
                <select class="form-control" name="userrole" id="userrole" class="seelect">
                    <option>--Select Role--</option>
                    <option value="Resident Adult">Resident Adult</option>
                    <option value="Student">Student</option>
                    <option value="Non-Resident">Non-Resident</option>
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
    background-color:#2b6770  !important;
    font-family: 'Roboto', sans-serif;
    font-weight: bold;
}
.nav-link:hover{
    color:white !important;
}
.dropdown-item:hover{
    color:#52ab98 !important;
}
.active{
    color:#52ab98 !important;
}
</style>

<script src="assets/Js/validation.js"></script>
    
  </body>
</html>
</body>
</html>