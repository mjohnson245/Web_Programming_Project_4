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
	<form method="post" action="viewcart.php" name="CarSelection">
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
				<option value="Audi" >Audi</option>
				<option value="BMW" >BMW</option>
				<option value="Cadillac" >Cadillac</option>
				<option value="Chevrolet" >Chevrolet</option>
				<option value="Ferrari">Ferrai</option>
				<option value="Ford" >Ford</option>
				<option value="Honda">Honda</option>
				<option value="Hyundai" >Hyundai</option>
				<option value="Jeep" >Jeep</option>
				<option value="Nissan" >Nissan</option>
				<option value="Porsche" >Porsche</option>
				<option value="RAM" >RAM</option>
				<option value="Subaru">Subaru</option>
				<option value="Toyota" >Toyota</option>
				<option value="Volkswagen">Volkswagen</option>
				<option value="Volvo" >Volvo</option>	
			</select>
		</fieldset>

		<fieldset id="color-fieldset">
			<legend>Please Select A Color</legend>
			<select name="color">
				<option value="Red" >Red</option>
				<option value="Blue">Blue</option>
				<option value="Black">Black</option>
				<option value="White">White</option>
				<option value="Brown">Brown</option>
				<option value="Gray">Gray</option>
				<option value="Silver">Silver</option>
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