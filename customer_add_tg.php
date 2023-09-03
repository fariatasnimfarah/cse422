
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


if (isset($_POST['add_tg'])) {
    $name = $_POST['name'];
    $duration = $_POST['duration'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $cost = $_POST['cost'];
    $customer_name = $_SESSION['username'];

    // Insert the values into the tour_guide table
    $sql = "INSERT INTO tour_guide (name, duration, date, time, cost, customer_name) VALUES ('$name', '$duration', '$date', '$time', '$cost', '$customer_name')";
    $result = mysqli_query($data, $sql);

    
    if ($result) {
        header("location:customer_view_tg.php");
    } else {
        echo "Upload Failed";
    }
}
?>

<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <title>Book Tour Guide </title>

 


</head>

<header>

    

<body>

<?php

include "navbar.php"
    
?>
    </header>


    <div class="content">
        <center>
            <h1>Book Tour Guide</h1>

            <div class="div_deg">

                <form action="customer_add_tg.php" method="POST">


                    <div>
                        <label>Name</label>
                        <select id="name" name="name" required>
				<option value="">-- Select Guide --</option>
				<option value="G1">G1</option>
				<option value="G2">G2</option>
				<option value="G3">G3</option>
			</select>
                    </div>
                    <div>
                        <label>Duration</label>
                        <select id="duration" name="duration" onchange="updateCost()" required>
				<option value="">-- Select Duration --</option>
				<option value="1 hour">1 hour</option>
				<option value="2 hours">2 hours</option>
				<option value="3 hours">3 hours</option>
			</select>
                    </div>



                    <div>
                        <label>Time</label>
                        <input type="time" name="time">
                    </div>

                    <div>
        <label>Cost</label>
        <!-- display the calculated cost based on the selected duration -->
        <input type="text" name="cost" id="cost" readonly>
    </div>
    <div>
        <label>Date</label>
        <input type="date" name="date">
    </div>
    <div>
        <input type="submit" class="btn btn-primary" name="add_tg" value="Book Tour Guide">
    </div>
</form>

<script>
function updateCost() {
    // get the selected duration value
    var duration = document.getElementById("duration").value;

    // calculate the cost based on the selected duration
    var baseCost = 100;
    switch (duration) {
        case "1 hour":
            var totalCost = baseCost * 1;
            break;
        case "2 hours":
            var totalCost = baseCost * 2;
            break;
        case "3 hours":
            var totalCost = baseCost * 3;
            break;
        default:
            var totalCost = 0;
            break;
    }

   
    document.getElementById("cost").value = "$" + totalCost.toFixed(2);
}
</script>

            </div>
        </center>

    </div>
    

</body>

</html>
<style type="text/css">
label {
  display: inline-block;
  text-align: right;
  width: 100px;
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
