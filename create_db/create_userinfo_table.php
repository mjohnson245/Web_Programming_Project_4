<?php

require "../db_controller.php";

$conn = new mysqli($db_server, $db_username, $db_password, $db_name);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE userinfo (
username VARCHAR(16)  NOT NULL,
password VARCHAR(30) NOT NULL,
PRIMARY KEY (username)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table user_info created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

?>
