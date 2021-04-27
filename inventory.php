<!DOCTYPE html>
<html>
<head>
	<title>Inventory</title>
</head>
<body>
	<h1>Begin Your Car Rental Selection</h1>
	<form method="post" name="CarSelection">
		<fieldset id="type-fieldset">
			<legend>Please Choose A Car Type</legend>
			<input type="radio" id="SUVid" value="SUV" name="car">
			<label for="SUVid">SUV</label>

			<input type="radio" id="Truckid" value="Truck" name="car">
			<label for="Truckid">Truck</label>

			<input type="radio" id="Sedanid" value="Sedan" name="car">
			<label for="Sedanid">Sedan</label>

			<input type="radio" id="Luxuryid" value="Luxury" name="car">
			<label for="Luxuryid">Luxury Vehicle</label>
		</fieldset>

		<fieldset id="brand-fieldset">
			<legend>Please Choose a Brand</legend>
			<label for="brands">Car Brands</label>
			<select name="brands">
				<option value="audi">Audi</option>
				<option value="bmw">BMW</option>
				<option value="cadillac">Cadillac</option>
				<option value="chevrolet">Chevrolet</option>
				<option value="ferrari">Ferrai</option>
				<option value="ford">Ford</option>
				<option value="honda">Honda</option>
				<option value="hyundai">Hyundai</option>
				<option value="jeep">Jeep</option>
				<option value="nissan">Nissan</option>
				<option value="porsche">Porsche</option>
				<option value="ram">RAM</option>
				<option value="subaru">Subaru</option>
				<option value="toyota">Toyota</option>
				<option value="volkswagen">Volkswagen</option>
				<option value="volvo">Volvo</option>	
			</select>
		</fieldset>

		<fieldset id="color-fieldset">
			<legend>Please Select A Color</legend>
			<select name="colors">
				<option value="red">Red</option>
				<option value="blue">Blue</option>
				<option value="black">Black</option>
				<option value="white">White</option>
				<option value="brown">Brown</option>
				<option value="gray">Gray</option>
				<option value="silver">Silver</option>
			</select>
		</fieldset>
	</form>
	<?php

	?>
</body>
</html>