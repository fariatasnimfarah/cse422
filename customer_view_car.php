<?php
error_reporting(0);
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

$sql = "SELECT * FROM car WHERE customer_name = '{$_SESSION['username']}'";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Customer View Car Info</title>



</head>
<header>
    <?php include "navbar.php"; ?>
</header>
<body>
<div class="content">
    <center>
        <h1>Car Rental Info</h1>
        <?php
        if ($_SESSION['message']) {
            echo $_SESSION['message'];
        }
        unset($_SESSION['message']);
        ?>
        <br><br>
        <table border="1px">
            <tr>
                
                <th class="table_th">Car ID</th>
                <th class="table_th">Customer Name</th>
                <th class="table_th">Car Model</th>
                <th class="table_th">Pickup Date</th>
                <th class="table_th">Pickup Location</th>
                <th class="table_th">Duration(Hours) </th>
                <th class="table_th">Time</th>
                <th class="table_th">Cost</th>
            </tr>
            <?php
            while ($info = $result->fetch_assoc()) {
                ?>
                <tr>
                    
                    <td class="table_td">
                        <?php echo "{$info['car_id']}"; ?>
                    </td>
                    <td class="table_td">
                        <?php echo "{$info['customer_name']}"; ?>
                    </td>
                    <td class="table_td">
                        <?php echo "{$info['model']}"; ?>
                    </td>
                    <td class="table_td">
                        <?php echo "{$info['pickup_date']}"; ?>
                    </td>
                    <td class="table_td">
                        <?php echo "{$info['pickup_location']}"; ?>
                    </td>
                    <td class="table_td">
                        <?php echo "{$info['duration']}"; ?>
                    </td>
                    
                    <td class="table_td">
                        <?php echo "{$info['time']}"; ?>
                    </td>
                    <td class="table_td">
                        <?php echo "{$info['cost']}"; ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </center>
</div>
</body>
</html>


<style type="text/css">

  

.content {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);
}

h1 {
    font-size: 28px;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #e0e0e0;
}

th, td {
    padding: 15px;
    text-align: left;
}

th {
    background-color: #f4f4f4;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f0f0f0;
}
</style>