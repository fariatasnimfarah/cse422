<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['user_type'] == 'admin') {
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "cse470";

$data = mysqli_connect($host, $user, $password, $db);

if (isset($_POST['add_car'])) {
    $model = $_POST['model'];
    $pickup_date = $_POST['pickup_date'];
    $time = $_POST['time'];
    $pickup_location = $_POST['pickup_location'];
    $customer_name = $_SESSION['username'];
    $base_cost = 50;
    $duration = (int)$_POST['duration'];
    $cost_multiplier = 1.5; // Adjust this based on your pricing structure and car models
    $total_cost = $base_cost * $cost_multiplier * $duration;

    $sql = "INSERT INTO car (model, pickup_date, time, pickup_location, customer_name, cost, duration) 
            VALUES ('$model', '$pickup_date', '$time', '$pickup_location', '$customer_name', '$total_cost', '$duration')";

    $result = mysqli_query($data, $sql);

    if ($result) {
        header("location:customer_view_car.php");
    } else {
        echo "Booking Failed: " . mysqli_error($data);
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Book Car Rental</title>
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
    <?php include "navbar.php"; ?>
</header>
<div class="content">
    <center>
        <h1>Book Car Rental</h1>
        <br>
        <div class="div_deg">
            <form action="customer_add_car.php" method="POST" id="carForm">
                <div>
                    <label>Car Model</label>
                    <select id="model" name="model" required>
                        <option value="">-- Select Model --</option>
                        <option value="model 1">Model 1</option>
                        <option value="model 2">Model 2</option>
                        <option value="model 3">Model 3</option>
                    </select>
                </div>
                <div>
                    <label>Pickup Location</label>
                    <select id="pickup_location" name="pickup_location" required>
                        <option value="">-- Select Pickup Location --</option>
                        <option value="pickup_location 1">Pickup Location 1</option>
                        <option value="pickup_location 2">Pickup Location 2</option>
                        <option value="pickup_location 3">Pickup Location 3</option>
                    </select>
                </div>
                <div>
                    <label>Duration</label>
                    <select id="duration" name="duration" required>
                        <option value="">-- Select Duration --</option>
                        <option value="1">1 Hour</option>
                        <option value="2">2 Hours</option>
                        <option value="3">3 Hours</option>
                    </select>
                </div>
                <div>
                    <label>Time</label>
                    <input type="time" name="time">
                </div>
                <div>
                    <label>Pickup Date</label>
                    <input type="date" name="pickup_date">
                </div>
                <div>
                    <label>Cost</label>
                    <input type="number" name="cost" id="cost" readonly>
                </div>
                <div>
                    <input type="submit" class="btn btn-primary" name="add_car" value="Book Car">
                </div>
            </form>
        </div>
    </center>
</div>
<script>
function updateCost() {
    var duration = document.getElementById("duration").value;

    // Fixed cost per hour
    var costPerHour = 100;
    var totalCost = costPerHour * duration;

    document.getElementById("cost").value = totalCost;
}

// Initialize cost when the page loads
updateCost();

// Attach updateCost() to the duration change event
document.getElementById("duration").addEventListener("change", updateCost);
</script>
</body>
</html>





