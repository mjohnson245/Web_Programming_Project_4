<!-- <?php
session_save_path("./");
session_start();
error_reporting(E_ALL ^ E_WARNING);
?> -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Inventory</title>
    <link rel="stylesheet" type="text/css" href="rentalstyle.css">
</head>

<body id="inventory-body">
    <h1>Begin Your Car Rental Selection<form method="post" name="Logout" class="logout">
            <input type="submit" name="logout" value="Logout">
        </form>
    </h1>
    <form method="post" action="parking.php" name="parking">
        <fieldset id="parking-city-fieldset">
            <legend>Please Choose a City To Park</legend>
            <label for="parking-city">Cities</label>
            <select name="parking-city">
                <option value="Atlanta">Atlanta</option>
                <option value="Chicago">Chicago</option>
                <option value="Boston">Boston</option>
            </select>
        </fieldset>
        <fieldset if="parking-date-fieldset">
            <legend>Please select a date</legend>
            <label for="parking-date">Start date:</label>

            <input type="parking-date" id="parking-date" name="parking-date" 
            value="2021-05-03" min="2021-05-03" max="2024-12-31">
        </fieldset>
        <fieldset id="parking-time-fieldset">
            <legend>Please Choose available time slot</legend>
            <label for="parking-time">Cities</label>
            <select name="parking-time">
                <option value="5AM-6AM">5AM-6AM</option>
                <option value="6AM-7AM">6AM-7AM</option>
                <option value="7AM-8AM">7AM-8AM</option>
                <option value="8AM-9AM">8AM-9AM</option>
                <option value="9AM-10AM">9AM-10AM</option>
                <option value="10AM-11AM">10AM-11AM</option>
                <option value="11AM-12PM">11AM-12PM</option>
                <option value="12PM-1PM">12PM-1PM</option>
                <option value="1PM-2PM">1PM-2PM</option>
                <option value="2PM-3PM">2PM-3PM</option>
                <option value="3PM-4PM">3PM-4PM</option>
                <option value="4PM-5PM">4PM-5PM</option>
                <option value="5PM-6PM">5PM-6PM</option>
                <option value="6PM-7PM">6PM-7PM</option>
                <option value="7PM-8PM">7PM-8PM</option>
                <option value="8PM-9PM">8PM-9PM</option>
                <option value="9PM-10PM">9PM-10PM</option>
                <option value="10PM-11PM">10PM-11PM</option>
                <option value="11PM-12AM">11PM-12AM</option>
            </select>
        </fieldset>

        <fieldset id="parking-address-fieldset">
            <legend>Please Choose a City To Park</legend>
            <label for="parking-address">Cities</label>
            <select name="parking-address">
                <option value="1">777 Brockton Avenue</option>
                <option value="2">30 Memorial Drive</option>
                <option value="3">250 Hartford Avenue</option>
                <option value="4">137 Teaticket Hwy</option>
                <option value="5">42 Fairhaven Commons Way</option>
                <option value="6">374 William S Canning Blvd</option>
                <option value="7">214 Haynes Street</option>
            </select>
        </fieldset>
        <input type="submit" name="Book it!" value="book">

        <?php
        include 'db_controller.php';
		$conn = new mysqli($db_server, $db_username, $db_password, $db_name);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
        if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
            $parking_info = "INSERT INTO parkinginfo (addressid, city, date, time) 
            VALUES ('".$_POST['parking-address']."', 
            '".$_POST['parking-city']."', 
            '".$_POST['parking-date']."', 
            '".$_POST['parking-time']."')";
            if (mysqli_query($conn, $parking_info)) {
                echo '<span id="success">'."Reservation created successfully".'</span>';
            } else {
                echo "Error: " . $parking_info . "" . mysqli_error($conn);
            }
            $conn->close();

		}
        ?>
    </form>
</body>

</html>