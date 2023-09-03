<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit;
}

$host = "localhost";
$user = "root";
$password = "";
$db = "cse470";

$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT * FROM user WHERE username = '{$_SESSION['username']}'";
$result = mysqli_query($data, $sql);

$info = $result->fetch_assoc();

if (!$info) {
    // Handle error if user information is not found
}
?>

<!DOCTYPE html>
<html>
<header>
		<?php include "navbar.php" ?>
	</header>
	<head>
    <meta charset="utf-8">
    <title>Your Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style type="text/css">
        body {
        
            background-color: #f4f4f4;
        }

        .container {
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
			text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #e5f3ff;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #fff;
        }

        a.button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        a.button:hover {
            background-color: #0056b3;
        }

        .icon {
            margin-right: 5px;
        }
	

        .booking-options {
            text-align: center;
            margin-top: 40px;
        }

        .booking-option {
            margin: 0 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Profile Information</h1>

    <?php if(isset($_SESSION['message'])): ?>
        <p><?php echo $_SESSION['message']; ?></p>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>

    <table>
        <tr>
            <th>Email</th>
            <th>Phone</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Update Profile</th>
        </tr>
        <tr>
            <td><?php echo $info['email']; ?></td>
            <td><?php echo $info['phone_number']; ?></td>
            <td><?php echo $info['full_name']; ?></td>
            <td><?php echo $info['username']; ?></td>
            <td>
                <a class="button" href="update_customer.php">Update Profile</a>
            </td>
        </tr>
    </table>

    <div class="booking-options">
        <h2>View Travel Information</h2>
		<br><br>
     
            <a class="button" href="customer_view_flight.php">
                <i class="fas fa-plane icon"></i> View Flight Bookings
            </a>
      
            <a class="button" href="customer_view_car.php">
                <i class="fas fa-car icon"></i> View Rental Car Bookings
            </a>
       
            <a class="button" href="customer_view_hotel.php">
                <i class="fas fa-hotel icon"></i> View Hotel Bookings
            </a>
       
            <a class="button" href="customer_view_tg.php">
                <i class="fas fa-map-marker-alt icon"></i> View Tour Guide Bookings
            </a>
       
    </div>
</div>
</body>
</html>
