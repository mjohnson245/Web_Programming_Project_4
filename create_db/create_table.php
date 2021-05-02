<?php

require "../db_controller.php";

$conn = new mysqli($db_server, $db_username, $db_password, $db_name);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$errors = [];

$profile = "CREATE TABLE userinfo (
userid INT NOT NULL AUTO_INCREMENT,
username VARCHAR(16)  NOT NULL,
password VARCHAR(30) NOT NULL,
PRIMARY KEY (userid)
)";

$car = "CREATE TABLE car (
carid INT NOT NULL AUTO_INCREMENT=100000,
car_type VARCHAR(30) NOT NULL,
car_brand VARCHAR(30) NOT NULL,
car_color VARCHAR(30) NOT NULL,
price VARCHAR(30) NOT NULL,
PRIMARY KEY (carid)
)";

$card = "CREATE TABLE card (
cardid INT NOT NULL AUTO_INCREMENT=5000000,
userid INT NOT NULL,
name VARCHAR(30) NOT NULL,
cardnumber INT(16) NOT NULL,
month INT(2) NOT NULL,
year INT(4) NOT NULL,
cvv INT(3) NOT NULL,
PRIMARY KEY (cardid),
FOREIGN KEY (userid) REFERENCES userinfo(userid)
)";

$cart = "CREATE TABLE cart (
userid INT NOT NULL,
carid INT NOT NULL,
FOREIGN KEY (userid) REFERENCES userinfo(userid),
FOREIGN KEY (carid) REFERENCES car(carid)
)";

$sql = [$profile, $car, $card, $cart];

foreach($tables as $k => $sql){
    $query = @$conn->query($sql);

    if(!$query) {
       $errors[] = "Table $k : Creation failed ($conn->error)";
	} else {
       $errors[] = "Table $k : Creation done";
	}
}


foreach($errors as $msg) {
   echo "$msg <br>";
}

$conn->close();

?>