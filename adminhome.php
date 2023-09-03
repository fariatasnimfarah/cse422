<?php

session_start();

    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
    elseif($_SESSION['user_type']=='customer'){
        header("location:login.php");
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
  
</head>
<body>
  
<?php include 'adminsidebar.php'; ?>
    <div class="content">
        <h1>Welcome to the Admin Dashboard</h1>
    </div>
</body>
</html>


