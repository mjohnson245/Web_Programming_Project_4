<?php
	session_save_path("./");
	session_start();
	error_reporting(E_ALL ^ E_WARNING);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="rentalstyle.css">
	<meta charset="utf-8">
</head>
<body>



<form method="post" name="Login">
    <h1>Login</h1>
    <label for="loginUser">Username:</label>
    <input name="loginUser" type="text"/>
    <br/>
    <label for="loginPass">Password:</label>
    <input name="loginPass" type="password"/>
    <br/>
    <br/>
    <input name="submit" type="submit" value="Login"/>
    <br/><br/>
    
	</form>
	<span class="error">
	<?php 
		include 'db_controller.php';
		$conn = new mysqli($db_server, $db_username, $db_password, $db_name);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
			
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$result = mysqli_query($conn, "SELECT * FROM userinfo WHERE username='".$_POST['loginUser']."' AND password='".$_POST['loginPass']."'");
			$num_rows = mysqli_num_rows($result);
			if($num_rows>0) {
				$_SESSION['Username'] = $_POST['loginUser'];
				$_SESSION['Password'] = $_POST['loginPass'];
				$conn->close();
				header('Location: inventory.php');
				exit();
			}
			else{
				echo "Incorrect username or password";
			}
		}			
		?>
		</span>
	<br>
	<a href="signup.php" class="signup">Sign up</a>
	<br>
	<a href="menu.php" class="signup">Back to Homepage</a>
</body>
</html>