<?php
    //connection to db server
    $server = 'localhost';
    $user = 'root';
    $password ='';
    $db = 'groupwebdev';

    $connect = mysqli_connect($server,$user,$password,$db);

    if(!$connect){
        die(mysqli_error($connect));
    } 
?>