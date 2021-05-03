<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Your Cart</title>
	<link rel="stylesheet" type="text/css" href="rentalstyle.css">
</head>
<body>
	<div class="row">
	  <div class="col-75">
		<div class="container">
		  <form action="/action_page.php">
			  <div class="col-50">
				<h3>Payment</h3>
				
				<label for="cname">Name on Card</label>
				<input type="text" id="cname" name="cardname">
				<label for="ccnum">Card Number</label>
				<input type="text" id="ccnum" name="cardnumber">
				<label for="expmonth">Exp Month</label>
				<input type="text" id="expmonth" name="expmonth">
				<div class="row">
				  <div class="col-50">
					<label for="expyear">Exp Year</label>
					<input type="text" id="expyear" name="expyear">
				  </div>
				  <div class="col-50">
					<label for="cvv">Security Code</label>
					<input type="text" id="cvv" name="cvv">
				  </div>
				</div>
			  </div>
			</div>
		  </form>
		</div>
	  </div>
	  <div class="col-25">
		<div class="container">
		  <h4>Cart
			<span class="price" style="color:black">
			  <i class="fa fa-shopping-cart"></i>
			  <b>4</b>
			</span>
		  </h4>
		  <p><a href="#">Car</a></p>
			<?php
				echo "$".$_SESSION["sub"];
			?>
		  <hr>
		  <p style="color:black">Total:</p>
			<?php
				echo "$".$_SESSION["Total"];
			?>
		</div>
	  </div>
	</div>
</body>
</html>
