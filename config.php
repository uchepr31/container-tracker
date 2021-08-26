<?php
session_start();
$host_name = "localhost";
$username = "root";
$password = "";
$dbname = "shipping";

$con = mysqli_connect($host_name, $username, $password, $dbname);

if($con){
    // echo "successful";
}
else{
    die("error in connecting to the database");
}
?>