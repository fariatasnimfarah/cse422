<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
} elseif ($_SESSION['user_type'] == 'customer') {
    header("location: login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "cse470";

$data = mysqli_connect($host, $user, $password, $db);

$id = $_GET['id'];
$sql = "SELECT * FROM user WHERE id = $id";
$result = mysqli_query($data, $sql);
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $full_name = $_POST['full_name'];
    $phone_number = $_POST['phone_number'];

    $updateQuery = "UPDATE user SET email='$email', full_name='$full_name', phone_number='$phone_number' WHERE id=$id";
    mysqli_query($data, $updateQuery);

    $_SESSION['message'] = "Customer profile updated successfully.";
    header("location: admin_view_user.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Customer Profile</title>
    <link rel="stylesheet" href="admindbstyle.css">
</head>
<body>
    <?php include "adminsidebar.php" ?>

    <div class="content">
        <center>
            <h1>Edit Customer Profile</h1>
       
        </center>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
            <label for="full_name">Full Name:</label>
            <input type="text" name="full_name" value="<?php echo $user['full_name']; ?>" required>
            <label for="phone_number">Phone Number:</label>
            <input type="tel" name="phone_number" value="<?php echo $user['phone_number']; ?>" required>
            <button type="submit">Update Profile</button>
        </form>
    </div>
</body>
</html>
