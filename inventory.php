<?php
	session_save_path("./");
	session_start();
	error_reporting(E_ALL ^ E_WARNING);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Inventory</title>
	<link rel="stylesheet" type="text/css" href="rentalstyle.css">
</head>
<body>
	<h1>Begin Your Car Rental Selection<form method="post" name="Logout" class="logout">
		<input type="submit" name="logout" value="Logout">
	</form></h1>

	
	<?php 
		if (isset($_POST['logout'])) { 
			setcookie(session_name(), '', 100);
			session_unset();
			session_destroy();
			$_SESSION = array();
			header('Location: menu.php');
		}			
	?>
	<form method="post" name="CarSelection">
		<fieldset id="type-fieldset" >
			<legend>Please Choose A Car Type</legend>
			<input type="radio" id="SUVid" value="SUV" name= "cartype">
			<label for="SUVid">SUV</label>

			<input type="radio" id="Truckid" value="Truck" name= "cartype">
			<label for="Truckid">Truck</label>

			<input type="radio" id="Sedanid" value="Sedan" name= "cartype">
			<label for="Sedanid">Sedan</label>

			<input type="radio" id="Luxuryid" value="Luxury" name= "cartype">
			<label for="Luxuryid">Luxury Vehicle</label>
		</fieldset>

		<fieldset id="brand-fieldset">
			<legend>Please Choose a Brand</legend>
			<label for="brands">Car Brands</label>
			<select name="brand">
				<option value="audi" >Audi</option>
				<option value="bmw" >BMW</option>
				<option value="cadillac" >Cadillac</option>
				<option value="chevrolet" >Chevrolet</option>
				<option value="ferrari">Ferrai</option>
				<option value="ford" >Ford</option>
				<option value="honda">Honda</option>
				<option value="hyundai" >Hyundai</option>
				<option value="jeep" >Jeep</option>
				<option value="nissan" >Nissan</option>
				<option value="porsche" >Porsche</option>
				<option value="ram" >RAM</option>
				<option value="subaru">Subaru</option>
				<option value="toyota" >Toyota</option>
				<option value="volkswagen">Volkswagen</option>
				<option value="volvo" >Volvo</option>	
			</select>
		</fieldset>

		<fieldset id="color-fieldset">
			<legend>Please Select A Color</legend>
			<select name="color">
				<option value="red" >Red</option>
				<option value="blue">Blue</option>
				<option value="black">Black</option>
				<option value="white">White</option>
				<option value="brown">Brown</option>
				<option value="gray">Gray</option>
				<option value="silver">Silver</option>
			</select>
		</fieldset>
		<h2>Subtotal: </h2>
		<input type="submit" name="inventory" value="Add to Cart">
	</form>
	<span class="error">
	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
			$_SESSION['Brand'] = $_POST['brand'];
			$_SESSION['Color'] = $_POST['color'];
			if (isset($_POST['cartype'])){
				$_SESSION['Cartype'] = $_POST['cartype'];
				header('Location: viewcart.php');
				exit();
			}
			else{
				echo "Please select a car type";
			}
		}
	?> 
	<span>
</body>
</html>