<?php
error_reporting(0);
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit; // Ensure the script stops execution after redirection
} elseif ($_SESSION['user_type'] == 'admin') {
    header("location:login.php");
    exit; // Ensure the script stops execution after redirection
}

$host = "localhost";
$user = "root";
$password = "";
$db = "cse470";

$data = mysqli_connect($host, $user, $password, $db);

// Retrieve hotel information for the logged-in customer
$sql = "SELECT * FROM hotel WHERE customer_name = '{$_SESSION['username']}'";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Customer View Hotel Info</title>

</head>
<body>
    <header>
        <?php include "navbar.php"; ?>
    </header>
    <div class="content">
        <center>
            <h1>Hotel Info</h1>

            <?php
            if ($_SESSION['message']) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>

            <br><br>
            <table border="1px">
                <tr>
                    <th class="table_th">Booking ID</th>
                    <th class="table_th">Customer Name</th>
                    <th class="table_th">Hotel Name</th>
                    
                    <th class="table_th">Number of People</th>
                    <th class="table_th">Number of Days</th>
                    <th class="table_th">Cost</th>
                    <th class="table_th">Check-in Date</th>
                    <th class="table_th">Room Type</th>
                </tr>

                <?php
                while ($info = $result->fetch_assoc()) {
                    ?>
                    <tr>
                    <td class="table_td">
                            <?php echo htmlspecialchars($info['id']); ?>
                        </td>
                        <td class="table_td">
                            <?php echo htmlspecialchars($info['customer_name']); ?>
                        </td>
                        <td class="table_td">
                            <?php echo htmlspecialchars($info['hotel_name']); ?>
                        </td>

                        <td class="table_td">
                            <?php echo htmlspecialchars($info['number_of_people']); ?>
                        </td>
                        <td class="table_td">
                            <?php echo htmlspecialchars($info['number_of_days']); ?>
                        </td>
                        <td class="table_td">
                            <?php echo htmlspecialchars($info['cost']); ?>
                        </td>
                        <td class="table_td">
                            <?php echo htmlspecialchars($info['check_in_date']); ?>
                        </td>
                        <td class="table_td">
                            <?php echo htmlspecialchars($info['room_type']); ?>
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