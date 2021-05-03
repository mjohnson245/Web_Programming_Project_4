 <?php
	session_save_path("./");
	session_start();
?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Order Completed</title>
	<link rel="stylesheet" type="text/css" href="rentalstyle.css">
</head>
<body id="success-body">
	<h1>Success!</h1>
	<p>Your order information below:</p>	
	<?php
		echo "Car type: ".$_SESSION["Cartype"]."<br>";
		echo "Brand: ".$_SESSION["Brand"]."<br>";
		echo "Color: ".$_SESSION["Color"];
		include 'db_controller.php';
		$conn = new mysqli($db_server, $db_username, $db_password, $db_name);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$order_info = "UPDATE userinfo SET car_type='".$_SESSION['Cartype']."', car_brand='".$_SESSION['Brand']."', car_color = '".$_SESSION['Color']."'
						WHERE username='".$_SESSION['Username']."'";
				mysqli_query($conn, $order_info);
			

		$conn->close();
	?>
	<br><br>
	<a href="menu.php" class="signup">Back to Homepage</a>
	<p>or</p>
	<a href="./parking.php" class="signup">Find parking</a>
</body>
</html>