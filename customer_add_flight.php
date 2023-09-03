<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit; // Added exit to prevent further execution
} elseif ($_SESSION['user_type'] == 'admin') {
    header("location: admin_dashboard.php"); // Redirect admin to a different page
    exit;
}

$host = "localhost";
$user = "root";
$password = "";
$db = "cse470";
$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['add_flight'])) { 
    
    $destination = mysqli_real_escape_string($data, $_POST['destination']);
    $airline = mysqli_real_escape_string($data, $_POST['airline']);
    $airport = mysqli_real_escape_string($data, $_POST['airport']);
    $time = mysqli_real_escape_string($data, $_POST['time']);
    $date = mysqli_real_escape_string($data, $_POST['date']);
    $numPersons = intval($_POST['person']);
    $customerName = $_SESSION['username'];

    
    $baseCost = 100; 
    $extraPersonCost = 50; 
    $cost = $baseCost * $numPersons + $extraPersonCost * ($numPersons - 1);

    $sql = "INSERT INTO flight (destination, airline, airport, time, date, person, cost, customer_name) 
    VALUES ('$destination', '$airline', '$airport', '$time', '$date', $numPersons, $cost, '$customerName')";

    
    $result = mysqli_query($data, $sql);

    if ($result) {
        header("location: customer_view_flight.php");
        exit;
    } else {
        echo "Upload Failed: " . mysqli_error($data);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Book Flight</title>

    <style type="text/css">

        label{
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg{
            background-color: skyblue;
            width: 395px;
            padding-top: 70px;
            padding-bottom: 70px;
        }

    </style>

</head>
<body>

<header>
<?php

include "navbar.php"
    
?>
    </header>

	<div class="content">
        <center>
		<h1>Book Flight</h1>

        <br>

		<div class="div_deg">

            <form action="customer_add_flight.php" method="POST">
            <div>
            <div>
    <label for="destination">Destination</label>
    <select id="destination" name="destination" required>
        <option value="">-- Select Destination --</option>
        <option value="Destination 1">Destination 1</option>
        <option value="Destination 2">Destination 2</option>
        <option value="Destination 3">Destination 3</option>
        <option value="Destination 4">Destination 4</option>
        <option value="Destination 5">Destination 5</option>
    </select>
</div>

                <div>
                <label>airline</label>
                    
                <select id="airline" name="airline" required>
				<option value="">-- Select Airline --</option>
				<option value="Airline 1">Airline 1</option>
				<option value="Airline 2">Airline 2</option>
				<option value="Airline 3">Airline 3</option>
			    </select>
                </div>

                <div>

                <label>airport</label>
                <select id="airport" name="airport" required>
				<option value="">-- Select Airport --</option>
				<option value="Air 1">Air 1</option>
				<option value="Air 2">Air 2</option>
				<option value="Air 3">Air 3</option>
			    </select>
                </div>

                <div>
                <div>
                <label>time</label>
                <input type="time" name="time" >
                </div>


                <div>
                <label>date</label>
                <input type="date" name="date" >
                </div>

                <div>
                    <label>person</label>
                    <input type="number" name="person" id="person" min="1" max="10" value="1" onchange="updateCost()">
                </div>

                <div>
                    <label>cost</label>
                    
                    <input type="text" name="cost" id="cost" readonly>
                </div>

                <div>
                    <input type="submit" class="btn btn-primary" name="add_flight" value="Book flight">
                </div>
            </form>
        </div>
    </center>
</div>

<script>
function updateCost() {
    
    var numPersons = document.getElementById("person").value;

   
    var baseCost = 100;
    var totalCost = baseCost * numPersons;

  
    document.getElementById("cost").value = totalCost;
}
</script>

</body>
</html>