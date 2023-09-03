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

$sql = "SELECT * FROM user WHERE user_type = 'customer'";
$result = mysqli_query($data, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin View and Edit User Info</title>
    <link rel="stylesheet" href="admindbstyle.css">
</head>
<body>
    <?php include "adminsidebar.php" ?>

    <div class="content">
        <center>
            <h1>User Info</h1>

        
        </center>

        <table class="styled-table">
            <thead>
                <tr>
                    <th class="table_th">ID</th>
                    <th class="table_th">Username</th>
                    <th class="table_th">Email</th>
                    <th class="table_th">Full Name</th>
                    <th class="table_th">Phone Number</th>
                    <th class="table_th">Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $result->fetch_assoc()): ?>
                    <tr>
                        <td class="table_td"><?php echo $user['id']; ?></td>
                        <td class="table_td"><?php echo $user['username']; ?></td>
                        <td class="table_td"><?php echo $user['email']; ?></td>
                        <td class="table_td"><?php echo $user['full_name']; ?></td>
                        <td class="table_td"><?php echo $user['phone_number']; ?></td>
                        <td class="table_td"><a href="admin_edit_user.php?id=<?php echo $user['id']; ?>">Edit</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
