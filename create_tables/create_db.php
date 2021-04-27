<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "");
 
// Check connection
if($link === false){
    die("Could not connect. " . mysqli_connect_error());
}
 
// Attempt create database query execution
$sql = "CREATE Database car_rental";
if(mysqli_query($link, $sql)){
    echo "Database car_rental created successfully";
} else{
    echo "Error creating database $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>