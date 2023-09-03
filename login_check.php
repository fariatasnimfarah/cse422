<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "cse470";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username='" . $name . "' AND password='" . $pass . "' ";
    $result = mysqli_query($data, $sql);
    $row = mysqli_fetch_array($result);

    if ($row) {
        $_SESSION['username'] = $name;

        if ($row["user_type"] == "customer") {
            $_SESSION['user_type'] = "customer";
            header("Location: home.php");
            exit();
        } elseif ($row["user_type"] == "admin") {
            $_SESSION['user_type'] = "admin";
            header("Location: adminhome.php");
            exit();
        }
    } else {
        $message = "Username or password do not match";
        $_SESSION['login_error'] = $message;
        header("Location: login.php");
        exit();
    }
}
?>
