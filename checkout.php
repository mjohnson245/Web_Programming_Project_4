<?php
	session_save_path("./");
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Car Rental Checkout</title>
	<link rel="stylesheet" type="text/css" href="rentalstyle.css">
</head>
<body id="checkout-body" style="color: black;">
	<h1 style="color: white;">Checkout</h1>
	<?php include 'cardpayment.php';?>
	<form method="post" name="complete" action="success.php">
		<input type="submit" name="success" value="Complete Purchase">
	</form>
</body>
</html>