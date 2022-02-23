<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style1.css"/>
</head>
<body>
<?php
    require('data.php');
    session_start();
    // When form submitted, check and create user session.
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = stripslashes($_REQUEST['email']);    // removes backslashes
        $name = mysqli_real_escape_string($con, $name);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $password = md5($password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE email='$name'
                     AND password='$password'";
                    //  echo $query;exit;
        $result = mysqli_query($con, $query) or die(mysqli_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['name'] = $name;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect name/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="email" placeholder="name" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <p class="link"><a href="newpass.php">Forgot password</a></p> 
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="register1.php">New Registration</a></p>
  </form>
<?php
    }
?>
</body>
</html>