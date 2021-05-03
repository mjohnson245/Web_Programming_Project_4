<?php

require "../db_controller.php";

$conn = new mysqli($db_server, $db_username, $db_password, $db_name);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$errors = [];

$profile = "CREATE TABLE IF NOT EXISTS userinfo (
userid INT NOT NULL AUTO_INCREMENT,
username VARCHAR(16)  NOT NULL,
password VARCHAR(30) NOT NULL,
PRIMARY KEY (userid)
)";

$car = "CREATE TABLE IF NOT EXISTS car (
carid INT NOT NULL AUTO_INCREMENT,
userid INT NOT NULL,
car_type VARCHAR(30) NOT NULL,
car_brand VARCHAR(30) NOT NULL,
car_color VARCHAR(30) NOT NULL,
price INT NOT NULL,
PRIMARY KEY (carid),
FOREIGN KEY (userid) REFERENCES userinfo(userid)
)";

$card = "CREATE TABLE IF NOT EXISTS card (
cardid INT NOT NULL AUTO_INCREMENT,
userid INT NOT NULL,
name VARCHAR(30) NOT NULL,
cardnumber INT(16) NOT NULL,
month INT(2) NOT NULL,
year INT(4) NOT NULL,
cvv INT(3) NOT NULL,
PRIMARY KEY (cardid),
FOREIGN KEY (userid) REFERENCES userinfo(userid)
)";

$address = "CREATE TABLE IF NOT EXISTS address (
   addressid INT NOT NULL AUTO_INCREMENT,
   street_address VARCHAR(150) NOT NULL,
   PRIMARY KEY (addressid)
)";

$parkinginfo = "CREATE TABLE IF NOT EXISTS parkinginfo (
   parkingid INT NOT NULL AUTO_INCREMENT,
   addressid INT NOT NULL,
   city VARCHAR(30) NOT NULL,
   date VARCHAR(30) NOT NULL,
   time VARCHAR(30) NOT NULL,
   PRIMARY KEY (parkingid),
   FOREIGN KEY (addressid) REFERENCES address(addressid)
   )";

$addressData1 = "insert into address (street_address) values ('777 Brockton Avenue');";
$addressData2 = "insert into address (street_address) values ('30 Memorial Drive');";
$addressData3 = "insert into address (street_address) values ('250 Hartford Avenue');";
$addressData4 = "insert into address (street_address) values ('137 Teaticket Hwy');";
$addressData5 = "insert into address (street_address) values ('42 Fairhaven Commons Way');";
$addressData6 = "insert into address (street_address) values ('374 William S Canning Blvd');";
$addressData7 = "insert into address (street_address) values ('214 Haynes Street');";


$sql = [$profile, $car, $card, $address, $parkinginfo, $addressData1, $addressData2,
 $addressData3, $addressData4, $addressData5, $addressData6, $addressData7];

foreach($sql as $k => $sql){
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