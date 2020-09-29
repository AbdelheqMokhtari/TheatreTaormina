<?php
ob_start();// turns on output buffering

$time = date_default_timezone_set("Africa/Algiers");

session_start();
$con = mysqli_connect("localhost","root","","user");//connection variables 
if(mysqli_connect_errno()){
    echo "Failed to connect : " . mysqli_connect_errno();
}



?>