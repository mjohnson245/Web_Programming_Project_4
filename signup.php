<?php
	session_save_path("./");
	session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign up</title>
	<meta charset="utf-8">
</head>
<body>



	<main>
		<h1>Sign up</h1>
			<?php 		

				$usernameErr = $passwordErr = "";
			    $Username = $Password = "";
				if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
					if($_POST['Username'] == "") {
						$usernameErr = "Username is required";
					}
					if($_POST['Password'] == "") {
						$passwordErr = "Password is required";
					}
				}
				
			?>

		<form method="post" name="Signup">
			<strong><label class="left" for="Username">Username:</label></strong>
			<input type="text" name="Username" size="16" placeholder="Username">
			<span class="error"><?php echo $usernameErr;?></span>
			<br/>
			<strong><label class="left" for="Password">Password:</label></strong>
			<input type="password" name="Password" size="16" placeholder="Password">
			<span class="error"><?php echo $passwordErr;?></span>
			<br/><br/>
			<input type="submit" name="signup" value="Sign up">
		</form>

		<?php 
				include 'db_controller.php';
				$conn = new mysqli($db_server, $db_username, $db_password, $db_name);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
			
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$_SESSION['Username'] = $_POST['Username'];
					$_SESSION['Password'] = $_POST['Password'];
					if(!$_POST['Username'] == "" && !$_POST['Password'] == "") {
							$login_info = "INSERT INTO userinfo (username, password) VALUES ('".$_POST['Username']."', '".$_POST['Password']."')";
							if (mysqli_query($conn, $login_info)) {
								//echo "New record created successfully";
							} else {
								echo "Error: " . $sql . "" . mysqli_error($conn);
							}
							$conn->close();
							header('Location: login.php');
							exit();			
						
					}
				}
		?>
	
		
	</main>
	
</body>
</html>