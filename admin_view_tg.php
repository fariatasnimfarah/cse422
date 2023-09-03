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

    $sql = "SELECT * FROM tour_guide ";   
    $result = mysqli_query($data,$sql);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin View Tour Info</title>


    <link rel="stylesheet" href="admindbstyle.css">

</head>
<body>

	<?php

    include "adminsidebar.php"

    ?>




	<div class="content">

        <center>

		<h1>Tour Guide Info </h1>

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
                <th class = "table_th">Tour Guide ID</th>
                <th class = "table_th">name</th>
                <th class = "table_th">duration</th>
                <th class = "table_th">date</th>
                <th class = "table_th">time</th>
                <th class = "table_th">cost</th>

          
            </tr>

            <?php
            while($info =$result->fetch_assoc())

            {


            ?>

            <tr>
                <td class = "table_td"> 
                    <?php echo"{$info['customer_name']}"; ?>
                </td>

            
                <td class = "table_td"> 
                    <?php echo"{$info['id']}"; ?>
                </td>

                <td class = "table_td"> 
                    <?php echo"{$info['name']}"; ?>
                </td>
                
                <td class = "table_td"> 
                    <?php echo"{$info['duration']}"; ?>
                </td>

                <td class = "table_td"> 
                    <?php echo"{$info['date']}"; ?>
                </td>

                <td class = "table_td"> 
                    <?php echo"{$info['time']}"; ?>
                </td>

                <td class = "table_td"> 
                    <?php echo"{$info['cost']}"; ?>
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