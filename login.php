<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>

  <link rel="stylesheet" type="text/css" href="reg.css">

</head>
<body>
  <div class="container">
    <div class="image-container">
      <img src="earth.png" alt="Rotating Earth Image" class="rotating-image">
    </div>
    <div class="form-container">
      <form method="post" action="login_check.php">
        <h2>Login to Travel Management System</h2>
        <div class="input-group">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username">
        </div>
        <div class="input-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password">
        </div>
        <?php
          session_start();
          if (isset($_SESSION['login_error'])) {
            echo "<div class='error-message'>" . $_SESSION['login_error'] . "</div>";
            unset($_SESSION['login_error']);
          }
        ?>
        <div class="form-actions">
          <button type="submit" name="login">Sign In</button>
          <br><br>
          <div class="input-group">
            <a href="signup.php">Sign up</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
