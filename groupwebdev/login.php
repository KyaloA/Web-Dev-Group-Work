<?php

include 'connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    //sql query to insert data into table
    $sql = "SELECT * FROM users WHERE email = '$email'";

    //execute query
    $result = mysqli_query($connect,$sql);

    //check if query was successful
    if($result){
        //check if there is a record in the db
        $rownumber = mysqli_num_rows($result);
        if($rownumber > 0){
            //fetch the record from the db using associative array
            $row = mysqli_fetch_assoc($result);

            //verify password
            $passwordhash = $row['password'];
            $id = $row['id'];
            $email = $row['email'];
            if(password_verify($password,$passwordhash)){
                //redirect to dashboard

                //create a session
                session_start();
                //store the user id and email in the session variables
                $_SESSION['id'] = $id;
                $_SESSION['email'] = $email;
                //redirect to dashboard
                header('location:display.php?viewemail='.$email);
            } 
        }else{
            echo "Invalid Email or Password";            
        }
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
              <a class="nav-link" style="color: white;" href="register.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="login.php">Login</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>

    <div class="row ">
    <div class="mx-auto col-15 col-md-8 col-lg-6 border border-dark p-10 mb-10">
    <form onsubmit="return validateForm()" class="registration" method="post"> <!--onsubmit="return validateForm()"-->
    
                <h2>Login</h2>

                <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>

                <div class="form-group">
                <label for="emad">Email Address: </label>
                <input class="form-control" type="email" name="email" id="emad" placeholder="Please enter your email address">
                <div id=""></div>
                </div>

                <div class="form-group">
                <label>Password: </label>
                <input class="form-control" type="password" name="password" id="pwd" placeholder="Enter Password">
                <div id="result_3"></div>
                </div>            

                <div class="form-group">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Log In</button>
                    </div>
                </div>
                
                <div id="resultage"></div>

                
    
            </form>
    </div>
    </div>

<style>

.navbar-custom {
    background-color:#2b6770 !important;
    font-family: 'Roboto', sans-serif;
    font-weight: bold;
}
.nav-link:hover{
    color:#52ab98!important;
}
.dropdown-item:hover{
    color:#52ab98 !important;
}
.active{
    color:#52ab98 !important;
}
</style>
    
    
  </body>
</html>
</body>
</html>