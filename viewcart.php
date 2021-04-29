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
		<div id="cars">Car shown here.</div>
		<div id="summary">
			<p>Subtotal: </p>
			<p>Tax: </p>
			<hr>
			<h2>Total: </h2>
		</div>
	</div>
	 <form method="post" action="checkout.php">
		<input type="submit" name="checkout" value="Proceed to Checkout">
	</form>
</body>
</html>