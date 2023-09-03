
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

    $sql = "SELECT * FROM hotel ";   
    $result = mysqli_query($data,$sql);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin View Hotel Info</title>



<link rel="stylesheet" href="admindbstyle.css">


</head>
<body>

	<?php

    include "adminsidebar.php"

    ?>
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
