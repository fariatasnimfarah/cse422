<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Signup</title>
  <link rel="stylesheet" type="text/css" href="reg.css">
</head>
<body>
    <div class="container">
        <div class="image-container">
          <img src="earth.png" alt="Rotating Earth Image" class="rotating-image">
        </div>
        <div class="form-container">
            <form method="post" action="signup_check.php">
                <h2>Sign Up to Travel Management System</h2>
                <?php
                if (isset($_SESSION['signupMessage'])) {
                    echo '<p>' . $_SESSION['signupMessage'] . '</p>';
                    unset($_SESSION['signupMessage']);
                }
                ?>
                <div class="input-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="full_name">Full Name:</label>
                    <input type="text" id="full_name" name="full_name" required>
                </div>
                <div class="input-group">
                    <label for="phone_number">Phone Number:</label>
                    <input type="tel" id="phone_number" name="phone_number" required>
                    <?php
                    if (isset($_SESSION['phoneMessage'])) {
                        echo '<p>' . $_SESSION['phoneMessage'] . '</p>';
                        unset($_SESSION['phoneMessage']);
                    }
                    ?>
                </div>
                <div>
                    <button type="submit">Sign Up</button>
                    <br><br>
                    <p>Already have an account? <a href="login.php">Sign in here</a>.</p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
