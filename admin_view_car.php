
<?php

error_reporting(0);
session_start();

    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
    elseif($_SESSION['user_type']=='customer'){
        header("location:login.php");
    }
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "cse470";

    $data= mysqli_connect($host,$user,$password,$db);

    $sql = "SELECT * FROM car ";   
    $result = mysqli_query($data,$sql);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin View Car Info</title>



<link rel="stylesheet" href="admindbstyle.css">


</head>
<body>

	<?php

    include "adminsidebar.php"

    ?>
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
