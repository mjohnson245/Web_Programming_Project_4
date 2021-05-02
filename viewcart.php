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
				echo "Car type: ".$_SESSION["Cartype"]."<br>";
				echo "Brand: ".$_SESSION["Brand"]."<br>";
				echo "Color: ".$_SESSION["Color"]."<br>";
				
				$suvPrice = 25000;
				$truckPrice = 30000;
				$sedanPrice =  20000;
				$luxuryPrice = 35000;
				$subTotal = 0;
				if($_SESSION["Brand"] == "Audi" || $_SESSION["Brand"] == "BMW" || $_SESSION["Brand"] == "BMW" || 
				$_SESSION["Brand"] == "Cadillac" || $_SESSION["Brand"] == "RAM" || $_SESSION["Brand"] == "Volvo") {
					$subTotal = $subTotal + 500;
				} else if($_SESSION["Brand"] == "Porsche") {
					$subTotal = $subTotal + 30000;
				} else if ($_SESSION["Brand"] == "Ferrari") {
					$subTotal = $subTotal + 190000;
				} else {
					continue;
				}
				
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
				echo "Subtotal: ".$_SESSION["sub"]."<br>";
				
				$subTotal = $_SESSION["sub"];
				$tax = $subtotal * 0.8;
				$_SESSION["Tax"] = $tax;
				echo "Tax: ".$_SESSION["Tax"]."<br>";
				
				echo "<hr>"."<br>";
				
				$total = $subTotal + $tax;
				$_SESSION["Total"] = $total;
				echo "Total: ".$_SESSION["Total"];
			?>
		</div>
	</div>
	 <form method="post" action="checkout.php">
		<input type="submit" name="checkout" value="Proceed to Checkout">
	</form>
</body>
</html>