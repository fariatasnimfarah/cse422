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

if (isset($_POST['add_hotel'])) {
    $hotel_name = mysqli_real_escape_string($data, $_POST['hotel_name']);
    $number_of_people = mysqli_real_escape_string($data, $_POST['number_of_people']);
    $number_of_days = mysqli_real_escape_string($data, $_POST['number_of_days']); // Add this line
    $cost = mysqli_real_escape_string($data, $_POST['cost']);
    $check_in_date = mysqli_real_escape_string($data, $_POST['check_in_date']);
    $room_type = mysqli_real_escape_string($data, $_POST['room_type']);
    $customer_name = $_SESSION['username'];

    $sql = "INSERT INTO hotel (hotel_name, number_of_people, number_of_days, room_type, cost, check_in_date, customer_name) 
            VALUES ('$hotel_name', '$number_of_people', '$number_of_days', '$room_type', '$cost', '$check_in_date', '$customer_name')";
    
    $result = mysqli_query($data, $sql);

    if ($result) {
        header("location:customer_view_hotel.php");
    } else {
        echo "Upload Failed: " . mysqli_error($data); // Display the error message for debugging
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Book Hotel</title>
</head>
<body>
<header>
    <?php include "navbar.php"; ?>
</header>
<div class="content">
    <center>
        <h1>Book Hotel</h1>
        <div class="div_deg">
            <form action="customer_add_hotel.php" method="POST">
                <div>
                    <label>Hotel Name</label>
                    <select name="hotel_name" required>
                        <option value="Hotel Sunshine">Hotel Sunshine</option>
                        <option value="Grand View Hotel">Grand View Hotel</option>
                        <option value="Oceanfront Resort">Oceanfront Resort</option>
                        <option value="Mountain Retreat">Mountain Retreat</option>
                        <option value="Serene Inn">Serene Inn</option>
                    </select>
                </div>
                <div>
                    <label>Number of People</label>
                    <input type="number" name="number_of_people" id="number_of_people" min="1" max="10" value="1" onchange="updateCost()">
                </div>
                <div>
                    <label>Number of Days</label>
                    <input type="number" name="number_of_days" id="number_of_days" min="1" max="30" value="1" onchange="updateCost()">
                </div>
                <div>
                    <label>Room Type</label>
                    <select name="room_type" required>
                        <option value="Mountain View">Mountain View</option>
                        <option value="Sea View">Sea View</option>
                        <option value="Quiet Place For Introvert">Quiet Place For Introvert</option>
                        <option value="Any Type">Any Type</option>
                    </select>
                </div>
                <div>
                    <label>Check-in Date</label>
                    <input type="date" name="check_in_date">
                </div>
                <div>
                    <label>Cost</label>
                    <input type="text" name="cost" id="cost" readonly>
                </div>
                <div>
                    <input type="submit" class="btn btn-primary" name="add_hotel" value="Add Hotel">
                </div>
            </form>
        </div>
    </center>
</div>
<script type="text/javascript">
    function updateCost() {
        var numberOfPeople = document.getElementById("number_of_people").value;
        var numberOfDays = document.getElementById("number_of_days").value;

        // Define your cost calculation logic here
        var baseCost = 100; // Base cost per person per day
        var extraPersonCost = 50; // Additional cost per extra person
        var cost = baseCost * numberOfPeople * numberOfDays + extraPersonCost * (numberOfPeople - 1);

        document.getElementById("cost").value = cost.toFixed(2);
    }
</script>

<style type="text/css">
    label {
        display: inline-block;
        text-align: right;
        width: 150px;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .div_deg {
        background-color: skyblue;
        width: 395px;
        padding-top: 70px;
        padding-bottom: 70px;
    }
</style>
</body>
</html>
