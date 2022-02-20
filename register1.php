<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    
<?php
    require('data.php');
    
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['name'])) {
        // removes backslashes
        $name = stripslashes($_REQUEST['name']);
        //escapes special characters in a string
        $name = mysqli_real_escape_string($con, $name);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
            $status =
            $last_login_at = date("Y-m-d H:i:s");
            $create_datetime = date("Y-m-d H:i:s");
            $updated_at = date("Y-m-d H:i:s");

        $query    =  "INSERT into `users` (name, password, email, last_login_at, create_datetime, updated_at)
                     VALUES ('$name', '" . md5($password) . "', '$email', '$last_login_at', '$create_datetime' '$updated_at')";
        $result   = mysqli_query($con, $query);        
            if ($result) {
           echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
           echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='register1.php'>register</a> again</p>
                  </div>";
        }
    } 
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="Name" placeholder="Name" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>

</body>
</html>