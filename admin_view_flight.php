
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

    $sql = "SELECT * FROM flight ";   
    $result = mysqli_query($data,$sql);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin View Flight Info</title>



<link rel="stylesheet" href="admindbstyle.css">


</head>
<body>

	<?php

    include "adminsidebar.php"

    ?>




	<div class="content">

        <center>

		<h1> Flight Info </h1>

        <?php
            if($_SESSION['message']){
                echo $_SESSION['message'];
            }

        unset($_SESSION['message']);

        ?>

    <br><br>
        <table border="1px">
            <tr>
                <th class = "table_th">Customer Name</th>
                <th class = "table_th">Flight ID</th>
                
                <th class = "table_th">Airline</th>
                <th class = "table_th">Airport</th>
                <th class = "table_th">Destination</th>
                <th class="table_th">Person</th>
                <th class = "table_th">Cost</th>
                <th class = "table_th">Date</th>
                <th class = "table_th">Time</th>

                
            </tr>

            <?php
            while($info =$result->fetch_assoc())

            {


            ?>

<tr>
            <td class="table_td"> 
                <?php echo "{$info['customer_name']}"; ?>
            </td>

            <td class="table_td"> 
                <?php echo "{$info['id']}"; ?>
            </td>

            <td class="table_td"> 
                <?php echo "{$info['airline']}"; ?>
            </td>

            <td class="table_td"> 
                <?php echo "{$info['airport']}"; ?>

        
            </td>
            <td class="table_td"> 
                <?php echo "{$info['destination']}"; ?>

            <td class="table_td"> 
                <?php echo "{$info['person']}"; ?>

            <td class="table_td"> 
                <?php echo "{$info['cost']}"; ?>
            </td>

            <td class="table_td"> 
                <?php echo "{$info['date']}"; ?>
            </td>

            <td class="table_td"> 
                <?php echo "{$info['time']}"; ?>


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