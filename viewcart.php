<?php
	session_save_path("./");
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Your Cart</title>
	<link rel="stylesheet" type="text/css" href="rentalstyle.css">
</head>
<body>
	<h1>Your Cart Below</h1>
	<div class="flex-container">
		<div id="cars">Cars
			<?php
				require "../db_controller.php";

				$conn = new mysqli($db_server, $db_username, $db_password, $db_name);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				
				//Update sql table
				echo "Car type: ".$_SESSION["Cartype"]."<br>";
				$sql = "UPDATE userinfo SET car_type='".$_SESSION["Cartype"]."'";
				echo "Brand: ".$_SESSION["Brand"]."<br>";
				$sql = "UPDATE userinfo SET car_brand='".$_SESSION["Brand"]."'";
				echo "Color: ".$_SESSION["Color"]."<br>";
				$sql = "UPDATE userinfo SET car_color='".$_SESSION["Color"]."'";
				
				//Normal price of car type
				$suvPrice = 25000;
				$truckPrice = 30000;
				$sedanPrice =  20000;
				$luxuryPrice = 35000;
				$subTotal = 0;
				
				//Adjust price based on brand
				if($_SESSION["Brand"] == "Audi" || $_SESSION["Brand"] == "BMW" || $_SESSION["Brand"] == "Cadillac" ||
				$_SESSION["Brand"] == "RAM" || $_SESSION["Brand"] == "Volvo") {
					$subTotal = $subTotal + 5000;
				} else if($_SESSION["Brand"] == "Porsche") {
					$subTotal = $subTotal + 30000;
				} else if ($_SESSION["Brand"] == "Ferrari") {
					$subTotal = $subTotal + 190000;
				} else {
					continue;
				}
				
				//Finding subtotal based on brand and car type
				if($_SESSION["Cartype"] == "SUV") {
					$subTotal = $subTotal + $suvPrice;
					$_SESSION["sub"] = $subTotal;
					echo "Price: ".$_SESSION["suvPrice"];
				} else if($_SESSION["Cartype"] == "Truck") {
					$subTotal = $subTotal + $truckPrice;
					$_SESSION["sub"] = $subTotal;
					echo "Price: ".$_SESSION["truckPrice"];
				} else if($_SESSION["Cartype"] == "Sedan") {
					$subTotal = $subTotal + $sedanPrice;
					$_SESSION["sub"] = $subTotal;
					echo "Price: ".$_SESSION["sedanPrice"];
				} else {
					$subTotal = $subTotal + $luxuryPrice;
					$_SESSION["sub"] = $subTotal;
					echo "Price: ".$_SESSION["luxuryPrice"];
				}
			?>
		</div>
		<div id="summary">Summary
			<?php
				//Finding tax and total based on subtotal
				echo "Subtotal: ".$_SESSION["sub"]."<br>";
				
				$subTotal = $_SESSION["sub"];
				$tax = $subtotal * 0.8;
				$_SESSION["Tax"] = $tax;
				echo "Tax: ".$_SESSION["Tax"]."<br>";
				
				echo "<hr>"."<br>";
				
				$total = $subTotal + $tax;
				$_SESSION["Total"] = $total;
				echo "Total: ".$_SESSION["Total"];
				$sql = "UPDATE userinfo SET total_price='".$_SESSION["Total"]."'";	
			?>
		</div>
	</div>
	 <form method="post" action="checkout.php">
		<input type="submit" name="checkout" value="Proceed to Checkout">
	</form>
</body>
</html>