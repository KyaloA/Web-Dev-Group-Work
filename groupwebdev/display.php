<?php
session_start();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Home</title>
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
              <a class="nav-link" style="color: white;" aria-current="page" href="#">Home</a>
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
                  <a class="dropdown-item" href="displayall.php">View Profile</a>
                </li>
                <li>
                  <a class="dropdown-item" href="logout.php">Logout</a>
                </li>
              </ul>
            </li>

          </ul>
        </div>
      </div>
    </nav>

<div class="container">

<h1 style="text-align: center; color:darkblue; text-decoration:underline;">Community Service</h1>
<p>We provide members of the community with opportunities to give back to the commuity. To volunteer, go to profile and click on the volunteer button.</p>
</div>
<h4 style="text-align: center; color:darkblue; text-decoration:underline;">Options Available</h4>

<div class="container">
    <div class="gallery">
  <a href="volunteer.php">
    <img src="assets/elderly.jpg" alt="elderly" width="600" height="250">
  </a>
  <div class="desc">Elderly's Home Visit</div>
</div>

<div class="gallery">
  <a href="volunteer.php">
    <img src="assets/hospital.jpeg" alt="Forest" width="600" height="250">
  </a>
  <div class="desc">Hospital Visit</div>
</div>

<div class="gallery">
  <a href='volunteer.php'>
    <img src="assets/children.jpg" alt="Northern Lights" width="600" height="250">
  </a>
  <div class="desc">Children's Home Visit</div>
</div>


</div>

<div class="container">
<div class="gallery">
  <a href="volunteer.php">
    <img src="assets/animal.jpg" alt="Mountains" width="600" height="250">
  </a>
  <div class="desc">Animal Shelter Visit</div>
</div>

<div class="gallery">
  <a href="volunteer.php">
    <img src="assets/cleanup.jpg" alt="Mountains" width="600" height="250">
  </a>
  <div class="desc">Street Cleanup</div>
</div>

<div class="gallery">
  <a href="volunteer.php">
    <img src="assets/coach.webp" alt="Mountains" width="600" height="250">
  </a>
  <div class="desc">Coaching</div>
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

/*for the body*/

div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 350px;
}

div.gallery:hover {
  border: 1px solid #008000;
}

div.gallery img {
  width: 100%;
  
}

div.desc {
  padding: 15px;
  text-align: center;
}
</style>
</body>
</html>

