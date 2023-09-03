<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $name = $_POST['username'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    $full_name = $_POST['full_name'];
    $phone_number = $_POST['phone_number'];

    // Add your validation checks here
    if (strlen($name) < 4) {
        $_SESSION['signupMessage'] = "Username must be at least 4 characters long";
    }

    if (strlen($pass) < 4) {
        $_SESSION['signupMessage'] = "Password must be at least 4 characters long";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['signupMessage'] = "Invalid email address";
    }
    
    if (!ctype_digit($phone_number) || strlen($phone_number) < 11) {
        $_SESSION['signupMessage'] = "Phone number must contain only numeric digits and be at least 11 digits long";
    }

    if (isset($_SESSION['signupMessage'])) {
        header("Location: signup.php");
        exit();
    }

   
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "cse470";

    $data = mysqli_connect($host, $user, $password, $db);

    if ($data === false) {
        $_SESSION['signupMessage'] = "Connection error: " . mysqli_connect_error();
        header("Location: signup.php");
        exit();
    }

    $sql = "INSERT INTO user (username, password, email, full_name, phone_number, user_type) VALUES ('$name', '$pass', '$email', '$full_name', '$phone_number', 'customer')";

    $result = mysqli_query($data, $sql);

    if ($result === false) {
        $_SESSION['signupMessage'] = "Signup error: " . mysqli_error($data);
        header("Location: signup.php");
        exit();
    } else {
        $_SESSION['username'] = $name;
        $_SESSION['user_type'] = "customer";
        header("Location: home.php");
        exit();
    }
}
?>
