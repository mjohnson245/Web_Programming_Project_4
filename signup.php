<?php
	session_save_path("./");
	session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign up</title>
	<link rel="stylesheet" type="text/css" href="rentalstyle.css">
	<meta charset="utf-8">
</head>
<body>



	<main>
		<h1>Sign up</h1>
			<?php 		

				$usernameErr = $passwordErr = "";
			    $Username = $Password = "";
				$success = "";
				if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
					if($_POST['username'] == "") {
						$usernameErr = "Username is required";
					}
					if($_POST['password'] == "") {
						$passwordErr = "Password is required";
					}
				}
				
			?>

		<form method="post" name="Signup">
			<?php echo $success;?>
			<label for="username">Username:</label>
			<input type="text" name="username" size="16" placeholder="Username">
			<span class="error"><?php echo $usernameErr;?></span>
			<br/>
			<label for="password">Password:</label>
			<input type="password" name="password" size="16" placeholder="Password">
			<span class="error"><?php echo $passwordErr;?></span>
			<br/><br/>
			<input type="submit" name="signup" value="Sign up">

		</form>
		<div class="error">
		<?php 
				include 'db_controller.php';
				$conn = new mysqli($db_server, $db_username, $db_password, $db_name);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
			
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					
					if(!$_POST['username'] == "" && !$_POST['password'] == "") {
						$result = mysqli_query($conn, "SELECT * FROM userinfo WHERE username='".$_POST['username']."'");
						$num_rows = mysqli_num_rows($result);
						if($num_rows>0){
							echo "Account already exists";
						}
						else{
							$_SESSION['Username'] = $_POST['username'];
							$_SESSION['Password'] = $_POST['password'];
							$login_info = "INSERT INTO userinfo (username, password) VALUES ('".$_POST['username']."', '".$_POST['password']."')";
							if (mysqli_query($conn, $login_info)) {
								echo '<span id="success">'."Account created successfully".'</span>';
							} else {
								//echo "Error: " . $login_info . "" . mysqli_error($conn);
							}
							$conn->close();
							//header('Location: login.php');
							//exit();
						}		
					}	
				}	
				
		
		?>
		</div>
		<br><br>
		<a href="login.php" class="login">Go to Login</a>	
		<br>		
		<a href="menu.php" class="signup">Back to Homepage</a>
		
	</main>
	
</body>
</html>