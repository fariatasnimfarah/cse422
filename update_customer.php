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

if (isset($_POST['update'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    // Update user info in the database
    $query = "UPDATE user SET full_name='$full_name', email='$email', phone_number='$phone_number' WHERE username='{$_SESSION['username']}'";
    $result2 = mysqli_query($data, $query);

    if($result2){
        $_SESSION['message'] = "Profile updated successfully!";
        header("location:customer_profile.php");
    } else {
        $_SESSION['message'] = "Failed to update profile.";
        header("location:update_customer.php");
    }
}
?>

<!DOCTYPE html>
<html>
    <header>
    <?php

include "navbar.php"
    
?>
</header>
<head>
	<meta charset="utf-8">
	<title>Update Profile</title>

    <style type="text/css">
        body {
           
            background-color: #e5f3ff;
        }

        .content {
            
            margin: 0 auto;
            padding: 20px;
            background-color:#e5f3ff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"] {
            width: 50%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            display: block;
            width: 52%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .message {
            text-align: center;
            margin-top: 10px;
            color: #007bff;
        }
    </style>
</head>

<body>
	<div class="content">
        <center>
            <h1>Update Profile</h1>

            <?php if(isset($_SESSION['message'])): ?>
                <p><?php echo $_SESSION['message']; ?></p>
                <?php unset($_SESSION['message']); ?>
            <?php endif; ?>

            <br><br>

            <div class="div_deg">
                <form action="#" method="POST">
                    <div>
                        <label>Name</label>
                        <input type="text" name="full_name" value="<?php echo $info['full_name']; ?>" >
                    </div>

                    <div>
                        <label>Email</label>
                        <input type="email" name="email" value="<?php echo $info['email']; ?>" >
                    </div>

                    <div>
                        <label>Phone Number</label>
                        <input type="tel" name="phone_number" value="<?php echo $info['phone_number']; ?>" >
                    </div>

                    <div>
                        <input type="submit" class="btn btn-success" name="update" value="Update" >
                    </div>
                </form>
            </div>
        </center>
	</div>
</body>
</html>